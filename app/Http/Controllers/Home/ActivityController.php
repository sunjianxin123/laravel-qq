<?php

namespace App\Http\Controllers\Home;

use App\Activity;
use Illuminate\Http\Request;
use Foryoufeng\Generator\Message;
use App\Http\Controllers\Controller;
/**
 * 活动
 */
class ActivityController extends Controller
{
    use Message;

    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $name = $request->get('content');
            $title = $request->get('title');
            $query = Activity::orderByDesc('id');
            if ($name) {
                $query = $query->where('content', 'like', '%' . $name . '%');
            }
            if ($title) {
                $query = $query->where('title', 'like', '%' . $title . '%');
            }
            return $this->success($query->paginate()->toArray());
        }
        return view('home.activity.index');
    }

    public function show(Request $request)
    {
        $activity = Activity::find(1);

        return view('home.activity.show', [
            'item' => $activity
        ]);
    }

    public function update(Request $request)
    {
        $id = (int)$request->get('id');
        $activity = null;
        if ($id) {
            $activity = Activity::whereId($id)->first();
        }
        if ($request->expectsJson()) {
            $data = $request->validate([
                'id' => 'required|int',
                'name' => 'required',
            ]);

            if (!$activity) {
                $activity = new Activity();
            }
            $activity->fill($data);
            if ($activity->save()) {
                return $this->success('保存成功');
            }
            return $this->error('保存失败');
        }

        if (!$activity) {
            $activity = [
                'id' => 0,
                'name' => ''
            ];
        }
        return view('home.activity.update', compact('activity'));
    }

    public function delete(Request $request)
    {
        $id = (int)$request->get('id');
        $activity = Activity::whereId($id)->first();
        if ($activity && $activity->delete()) {
            return $this->success('删除成功');
        }
        return $this->error('删除失败');
    }



}