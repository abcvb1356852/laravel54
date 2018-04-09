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

}