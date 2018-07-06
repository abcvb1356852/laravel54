<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 2018/4/8
 * Time: 14:03
 */
namespace App\Admin\Controllers;

class TopicController extends Controller
{
    //权限列表页面
    public function index()
    {
        $topics = \App\Topic::all();
        return view('admin/topic/index',compact('topics'));
    }
    //创建权限页面
    public function create()
    {
        return view('admin/topic/create');
    }
    //创建权限的实际行为
    public function store()
    {
        $this->validate(request(),[
           'name' => 'required|string'
        ]);
        \App\Topic::create(['name'=>request('name')]);
        return redirect('/admin/topics');
    }

    public function destroy(\App\Topic $topic)
    {
        $topic->delete();
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}