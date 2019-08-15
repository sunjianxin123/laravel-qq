<?php

namespace App\Http\Controllers\Home;

use App\Test;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 活动
 */
class TestController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
        if($request->expectsJson()){
           $name=$request->get('content');
            $title=$request->get('title');
            $query=Test::orderByDesc('id');
            if($name){
                $query=$query->where('content','like','%'.$name.'%');
            }
            if($title){
                $query=$query->where('title','like','%'.$title.'%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.test.index');
    }

    public function show(Request $request)
    {
        $test=Test::find(1);

        return view('home.test.show',[
            'item'=>$test
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $test=null;
        if($id){
            $test=Test::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'name'=>'required',
            ]);

            if(!$test){
                $test=new Test();
            }
            $test->fill($data);
            if($test->save()){
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$test){
            $test=[
                'id'=>0,
                'name'=>''
            ];
        }
        return view('home.test.update',compact('test'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $test=Test::whereId($id)->first();
        if($test && $test->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}