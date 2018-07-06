<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 2018/4/8
 * Time: 14:03
 */
namespace App\Admin\Controllers;

class NoticeController extends Controller
{
    //权限列表页面
    public function index()
    {
        $notices = \App\Notice::all();
        return view('admin/notice/index',compact('notices'));
    }
    //创建权限页面
    public function create()
    {
        return view('admin/notice/create');
    }
    //创建权限的实际行为
    public function store()
    {
        $this->validate(request(),[
           'title' => 'required|string',
           'content' => 'required|string',
        ]);
       $notice = \App\Notice::create(request(['title','content']));
       dispatch(new \App\Jobs\SendMessage($notice));
        return redirect('/admin/notices');
    }

}