<?php

namespace App\Http\Controllers\Home;

use App\Product;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 产品
 */
class ProductController extends Controller
{
    use Message;
    
    public function index(Request $request)
    {
//        if($request->expectsJson()){
            $title=$request->get('title','小米');
            $query=Product::query();


            return $this->success($query->paginate()->toArray());
//        }
        return view('home.product.index');
    }

    public function show(Request $request)
    {
        $product=Product::find(1);

        return view('home.product.show',[
            'item'=>$product
        ]);
    }
    
    public function update(Request $request)
    {
        $id=(int)$request->get('id');
        $product=null;
        if($id){
            $product=Product::whereId($id)->first();
        }
        if($request->expectsJson()){
            $data=$request->validate([
                'id' => 'required|int',
                'title' => 'required',
                'desc' => 'required',
                'price' => 'required',
            ]);

            if(!$product){
                $product=new Product();
            }
            $product->fill($data);
            //自动同步数据到 elastic-search
            if($product->save()){
                //同步信息到 elastic-search
//                $host = [
//                    '127.0.0.1:9200'
//                ];
//                $client = ClientBuilder::create()->setHosts($host)->build();
//                $params = [
//                    'index' => 'product',
//                    'id'    => $product->id,
//                    'type' => '_doc',
//                    'body'  => [
//                        'title' => $product->title,
//                        'desc' => $product->desc
//                    ]
//                ];
//
//                $response = $client->index($params);
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if(!$product){
            $product=[
                'id'=>0,
            ];
        }
        return view('home.product.update',compact('product'));
    }
    
    public function delete(Request $request)
    {
        $id=(int)$request->get('id');
        $product=Product::whereId($id)->first();
        if($product && $product->delete()){
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }
}