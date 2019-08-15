<?php

namespace App\Http\Controllers;

use App\AdminAction;
use App\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends BaseController
{
    public function index(Request $request)
    {
        if($request->expectsJson()){
            $name = $request->get('name');
            $data = AdminRole::Name($name)->paginate(10);
            return $this->success($data);
        }
        return view('admin.role.index');
    }

    public function add(Request $request)
    {
        $actions = AdminAction::pluck('name','id')->toArray();
        if($request->expectsJson()){
            $permission = $request->get('checkedCities');
            DB::beginTransaction();
            $adminRole = new AdminRole();
            $adminRole->name = $request->get('name');
            $adminRole->note = $request->get('desc');
            $flag = $adminRole->save();
            $arr=[];
            foreach ($permission as $k=>$v){
                $arr[$k]['action_id'] = $v;
            }
            $flag2 = $adminRole->AdminRoleAction()->createMany($arr);
            if($flag && $flag2){
                DB::commit();
                return $this->success('添加成功');
            }
            DB::rollBack();
            return $this->error('添加失败');
        }
        return view('admin.role.add',compact('actions'));
    }

    public function del(Request $request)
    {
        $id = $request->get('id');
        $adminRole = AdminRole::whereId($id)->first();
        if(!$adminRole){
            return $this->error('数据不存在');
        }
        AdminRole::whereId($id)->delete();
        return $this->success('删除成功');
    }
}
