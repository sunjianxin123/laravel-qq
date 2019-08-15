<?php

namespace App\Http\Controllers\Home;

use App\Attribute;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 属性
 */
class AttributeController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
        if($request->expectsJson()){
           $name=$request->get('content');
            $title=$request->get('title');
            $query=Attribute::orderByDesc('id');
            if($name){
                $query=$query->where('content','like','%'.$name.'%');
            }
            if($title){
                $query=$query->where('title','like','%'.$title.'%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.attribute.index');
    }

    public function show(Request $request)
    {
        $attribute=Attribute::find(1);

        return view('home.attribute.show',[
            'item'=>$attribute
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $attribute=null;
        if($id){
            $attribute=Attribute::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'name'=>'required',
            ]);

            if(!$attribute){
                $attribute=new Attribute();
            }
            $attribute->fill($data);
            if($attribute->save()){
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$attribute){
            $attribute=[
                'id'=>0,
                'name'=>''
            ];
        }
        return view('home.attribute.update',compact('attribute'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $attribute=Attribute::whereId($id)->first();
        if($attribute && $attribute->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}