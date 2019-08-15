<?php

namespace App\Http\Controllers;

use App\AdminRole;
use App\AdminUser;
use App\Events\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Zxx\Test\Tools;

class UserController extends BaseController
{
    public function index(Request $request)
    {

        if($request->expectsJson()){
            $user_name = $request->get('user_name');
            $number = $request->get('number',10);
            $data = AdminUser::where('user_name','like',"%$user_name%")->orderByDesc('user_id')->paginate($number)->toArray();
            return $this->success($data);
        }
        return view('admin.user.index');
    }

    //添加用户
    public function add(Request $request)
    {
        //可以使用自动验证，提升Dao层
        if($request->expectsJson()){
            $validataData = Validator::make($request->all(),[
                'user_name'=>'required|min:3|max:8',
                'password'=>'required|confirmed',
                'sex'=>'required',
                'email'=>'required|email',
                'portrait'=>'required',
                'roles'=>'required'
            ])->validate();
            $user_names = AdminUser::pluck('user_name')->toArray();
            if(in_array($validataData['user_name'],$user_names)){
                return response()->json(['code'=>404,'msg'=>'用户名已存在']);
            }
            $validataData['password'] = bcrypt($validataData['password']);
            $adminUser = new AdminUser();
            $adminUser->user_name = $validataData['user_name'];
            $adminUser->password = $validataData['password'];
            $adminUser->sex = $validataData['sex'];
            $adminUser->email = $validataData['email'];
            $adminUser->portrait = $validataData['portrait'];
            DB::beginTransaction();
            $flag = $adminUser->save();
            $arr=[];
            foreach ($validataData['roles'] as $k=>$v){
                $arr[$k]['role_id'] = $v;
            }
            $flag2 = $adminUser->adminUserRole()->createMany($arr);
            if($flag && $flag2){
                DB::commit();
                //发送事件
                event(new UserRegister($adminUser));
                return response()->json(['code'=>200,'msg'=>'操作成功']);
            }else{
                DB::rollBack();
                return response()->json(['code'=>404,'msg'=>'操作失败']);
            }
        }
        $role = AdminRole::pluck('name','id')->toArray();
        return view('admin.user.add',compact('role'));
    }

    public function del(Request $request)
    {
        $user_id = $request->get('user_id');
        $adminUser = AdminUser::whereUserId($user_id)->first();
        if(!$adminUser){
            return $this->error('数据不存在');
        }
        AdminUser::whereUserId($user_id)->delete();
        return $this->success('删除成功');
    }

    public function check(Request $request)
    {
        echo $request->get('token','测试一下');
    }

    //编辑
    public function edit(Request $request)
    {
        $id = $request->get('user_id');
        $adminUser = AdminUser::whereUserId($id)->first();
        if(!$adminUser){
            return $this->error('数据不存在');
        }
        if($request->expectsJson()){
            dd($request->all());
        }
        return view('admin.user.add');
    }
}
