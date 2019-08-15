<?php

namespace App\Http\Controllers\Home;

use App\Cart;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 购物车
 */
class CartController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
        if($request->expectsJson()){
           $name=$request->get('content');
            $title=$request->get('title');
            $query=Cart::orderByDesc('id');
            if($name){
                $query=$query->where('content','like','%'.$name.'%');
            }
            if($title){
                $query=$query->where('title','like','%'.$title.'%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.cart.index');
    }

    public function show(Request $request)
    {
        $cart=Cart::find(1);

        return view('home.cart.show',[
            'item'=>$cart
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $cart=null;
        if($id){
            $cart=Cart::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'name'=>'required',
            ]);

            if(!$cart){
                $cart=new Cart();
            }
            $cart->fill($data);
            if($cart->save()){
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$cart){
            $cart=[
                'id'=>0,
                'name'=>''
            ];
        }
        return view('home.cart.update',compact('cart'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $cart=Cart::whereId($id)->first();
        if($cart && $cart->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}