<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 2018/4/8
 * Time: 14:03
 */
namespace App\Admin\Controllers;

class LoginController extends Controller
{
    //登录展示页
    public function index()
    {
        return view('admin.login.index');
    }
    //登录操作
    public function login()
    {
        //验证
        $this->validate(\request(),[
            'name'=>'required|min:5',
            'password'=>'required|min:5|max:12',
        ]);
        //逻辑
        $user = \request(['name','password']);
        if(\Auth::guard('admin')->attempt($user)){
            return redirect('/admin/home');
        }
        //渲染
        return \Redirect::back()->withErrors("账号名或者密码错误");
    }
    //登出
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}