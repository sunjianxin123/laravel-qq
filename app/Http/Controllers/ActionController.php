<?php

namespace App\Http\Controllers;

use App\AdminAction;
use Illuminate\Http\Request;

class ActionController extends BaseController
{
    public function index(Request $request)
    {
        if($request->expectsJson()){
            $keywords = $request->get('name');
            $data = AdminAction::OrderByDesc('sort')->where('name','like',"%$keywords%")->get();
            if(!$keywords){
                $data = $this->tree($data);
            }
            return $this->success($data);
        }
        return view('admin.action.index');
    }


    public function add(Request $request)
    {
        $data = AdminAction::all()->toArray();
        $data = $this->tree($data);
        if($request->expectsJson()){
            $data = $request->all();
            $data['url'] = route('admin_index').'/'.$data['url'];
            AdminAction::create($data);
            return $this->success('添加成功');
        }
        return view('admin.action.add',compact('data'));
    }

    public function change(Request $request)
    {
        $id = $request->get('id');
        $is_show_left = $request->get('is_show_left');
        $adminAction = AdminAction::find($id);
        if(!$adminAction){
            return $this->error('数据不存在');
        }
        $adminAction->is_show_left = $is_show_left=='T'?'F':'T';
        $res = $adminAction->save();
        if($res){
            $data = ['is_show_left'=>$adminAction->is_show_left];
            return $this->success($data);
        }
        return $this->error('操作失败');
    }

    private function tree($data,$pid=0,$level=0,$str='----'){
        static $arr = [];
        foreach ($data as $k=>$v){
            if($v['parent_id']==$pid){
                $v['name'] = str_repeat($str,$level).$v['name'];
                $arr[] = $v;
                $this->tree($data,$v['id'],$level+1,'----');
            }
        }
        return $arr;
    }
}
