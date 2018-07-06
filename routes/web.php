    <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//用户模块
//注册页面
Route::get('/register','\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register','\App\Http\Controllers\RegisterController@register');
//登陆页面
Route::get('/login','\App\Http\Controllers\LoginController@index');
//登录行为
Route::post('/login','\App\Http\Controllers\LoginController@login');
//登出行为

//文章列表页
Route::get('','\App\Http\Controllers\PostController@index');
//文章详情页
Route::get('/posts/show/{post}','\App\Http\Controllers\PostController@show');

Route::group(['middleware'=>'auth:web'],function (){
    Route::get('/logout','\App\Http\Controllers\LoginController@logout');
//个人设置页面
    Route::get('/user/me/setting','\App\Http\Controllers\UserController@setting');
//个人设置操作
    Route::post('/user/me/store','\App\Http\Controllers\UserController@settingStore');


//创建文章
    Route::get('/posts/create','\App\Http\Controllers\PostController@create');
    Route::post('posts','\App\Http\Controllers\PostController@store');
//编辑文章
    Route::get('/posts/edit/{post}','\App\Http\Controllers\PostController@edit');
    Route::put('/posts/update/{post}','\App\Http\Controllers\PostController@update');
//提交评论
    Route::any('/posts/comment/{post}','\App\Http\Controllers\PostController@comment');
//删除
    Route::get('/posts/delete/{post}','\App\Http\Controllers\PostController@delete');
//赞
    Route::get('/posts/zan/{post}','\App\Http\Controllers\PostController@zan');
//取消赞
    Route::get('/posts/unzan/{post}','\App\Http\Controllers\PostController@unzan');
//个人中心
    Route::get('/user/{user}','\App\Http\Controllers\UserController@show');
    Route::post('/user/fan/{user}','\App\Http\Controllers\UserController@fan');
    Route::post('/user/unfan/{user}','\App\Http\Controllers\UserController@unfan');
//专题详情页
    Route::get('/topic/{topic}','\App\Http\Controllers\TopicController@show');
//投稿
    Route::post('/topic/submit/{topic}','\App\Http\Controllers\TopicController@submit');
//通知
    Route::get('/notices','\App\Http\Controllers\NoticeController@index');
});
include_once ('admin.php');