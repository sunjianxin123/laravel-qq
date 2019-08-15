<?php

namespace App\Http\Controllers\Home;

use App\ActivityTemplate;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 活动模板
 */
class ActivityTemplateController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
        if($request->expectsJson()){
           $name=$request->get('content');
            $title=$request->get('title');
            $query=ActivityTemplate::orderByDesc('id');
            if($name){
                $query=$query->where('content','like','%'.$name.'%');
            }
            if($title){
                $query=$query->where('title','like','%'.$title.'%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.activity_template.index');
    }

    public function show(Request $request)
    {
        $activity_template=ActivityTemplate::find(1);

        return view('home.activity_template.show',[
            'item'=>$activity_template
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $activity_template=null;
        if($id){
            $activity_template=ActivityTemplate::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'name'=>'required',
            ]);

            if(!$activity_template){
                $activity_template=new ActivityTemplate();
            }
            $activity_template->fill($data);
            if($activity_template->save()){
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$activity_template){
            $activity_template=[
                'id'=>0,
                'name'=>''
            ];
        }
        return view('home.activity_template.update',compact('activity_template'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $activity_template=ActivityTemplate::whereId($id)->first();
        if($activity_template && $activity_template->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}