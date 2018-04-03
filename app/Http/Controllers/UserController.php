<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Fan;

class UserController extends Controller
{
    //个人设置页面
    public function setting()
    {
        return view('user.setting');
    }
    //个人设置行为
    public function settingStore()
    {

    }
    //个人中心页面
    public function show(User $user)
    {
        //这个人的信息，包含关注、粉丝、文章数

        $user = User::withCount(['posts','fans','starts'])->find($user->id);


        //这个人的文章列表，去创建时间最新的前10条

        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();

        //这个人关注的用户，包含关注用户的关注粉丝，文章数

        $fans = $user->starts();
        $suser = User::whereIn('id',$fans->pluck('star_id'))->withCount(['starts','posts','fans'])->get();

        //关注这个人的用户，包含粉丝用户的关注/粉丝/文章数

        $fans = $user->fans();
        $fuser = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['starts','posts','fans'])->get();
        return view('user/show',compact('user','posts','suser','fuser'));
    }
    //关注用户
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);
        return [
            'error' => 0,
            'msg' => '关注成功'
        ];

    }
    //取消关注
    public function unfan(User $user)
    {
        $me =\Auth::user();
        $me->doUnfan($user->id);
        return [
            'error' => 0,
            'msg' => '关注失败'
        ];
    }
}
