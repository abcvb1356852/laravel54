<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 2018/4/8
 * Time: 13:52
 */
Route::group(['prefix'=>'admin'],function (){
    //登录展示页面
    Route::get('/login','\App\Admin\Controllers\LoginController@index');
    //登录行为
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    //登出行为
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware'=>'auth:admin'],function(){
        //首页
        Route::get('/home','\App\Admin\Controllers\HomeController@index');
    });
});