<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Zan;
class PostController extends Controller
{
    //列表
    public function index(){
        $posts = Post::orderBy('created_at','desc')->withCount(['comment','zans'])->paginate(6);
        $posts->load('user');
    /*    $posts['content'] = html_entity_decode($posts['content']);*/
        return view("post/index",compact('posts'));
    }

    //详情页面
    public function show(Post $post){
        $post->load('comment');
        return view('post/show',compact('post'));
    }

    //创建页面
    public function create(){
        return view('post/create');
    }

    //创建逻辑
    public function store(){
     /*   $post = new Post();
        $post->titile = request('titile');
        $post->content = request('content');
        $post->save();*/
     //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);
     //逻辑
        $user_id = \Auth::id();
        $params = array_merge(request(['title','content']),compact('user_id'));
        $post = Post::create($params);
     //渲染
         return redirect("/");
    }

    //编辑页面
    public function edit(Post $post){
        return view('post/edit',compact('post'));
    }

    //编辑逻辑
    public function update(Post $post){
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);
        $this->authorize('update',$post);
        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        //渲染
        return redirect("posts/show/{$post->id}");
    }

    //删除逻辑
    public function delete(Post $post){
        //用户权限验证
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('/');
    }
    //提交评论
    public function comment(Post $post)
    {
        //验证
    /*    if(\Auth::check() == false){
            return json_decode(1);
        }*/
        $this->validate(request(),[
            'content' => 'required|min:3',
        ]);
        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = \request('content');
        $post->comment()->save($comment);
        //渲染
        return back();
    }
    //赞
    public function zan(Post $post){
        $param = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
        ];
        Zan::firstOrCreate($param);
        return back();
    }
    //取消赞
    public function unzan(Post $post){
        $post->zan(\Auth::id())->delete();
        return back();
    }
}
