<?php

namespace App\Http\Controllers\Home;

use App\Good;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 商品
 */
class GoodController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
        if($request->expectsJson()){
           $name=$request->get('content');
            $title=$request->get('title');
            $query=Good::orderByDesc('id');
            if($name){
                $query=$query->where('content','like','%'.$name.'%');
            }
            if($title){
                $query=$query->where('title','like','%'.$title.'%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.good.index');
    }

    public function show(Request $request)
    {
        $good=Good::find(1);

        return view('home.good.show',[
            'item'=>$good
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $good=null;
        if($id){
            $good=Good::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'name'=>'required',
            ]);

            if(!$good){
                $good=new Good();
            }
            $good->fill($data);
            if($good->save()){
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$good){
            $good=[
                'id'=>0,
                'name'=>''
            ];
        }
        return view('home.good.update',compact('good'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $good=Good::whereId($id)->first();
        if($good && $good->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}