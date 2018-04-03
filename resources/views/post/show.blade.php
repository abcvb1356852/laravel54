@extends('layout.main')
@section('content')
            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <div style="display:inline-flex">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                       @can('update',$post)
                        <a style="margin: auto"  href="/posts/edit/{{$post->id}}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                       @endcan
                       @can('delete',$post)
                        <a style="margin: auto"  href="/posts/delete/{{$post->id}}">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                       @endcan
                    </div>

                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}<a href="/user/{{$post->user->id}}">{{$post->user->name}}</a></p>

                    {!!$post->content!!}
                    <div>
                        @if($post->zan(\Auth::id())->exists())
                            <a href="/posts/unzan/{{$post->id}}" type="button" class="btn btn-primary btn-lg">取消赞</a>
                        @else
                            <a href="/posts/zan/{{$post->id}}" type="button" class="btn btn-primary btn-lg">赞</a>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">评论</div>

                    <!-- List group -->
                    <ul class="list-group">
                        @foreach($post->comment as $val)
                        <li class="list-group-item">
                            <h5>{{$val->created_at}} by {{$val->user->name}}</h5>
                            <div>
                                {{$val->content}}
                            </div>
                        </li>
                         @endforeach
                    </ul>
                </div>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">发表评论</div>

                    <!-- List group -->
                    <ul class="list-group">
                        <form action="/posts/comment/{{$post->id}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="post_id" value="62"/>
                            <li class="list-group-item">
                                <textarea name="content" class="form-control" rows="10"></textarea>
                                <button class="btn btn-default" type="submit">提交</button>
                            </li>
                        </form>
                        @include('layout.error')

                    </ul>
                </div>

            </div><!-- /.blog-main -->
@endsection
{{--@section('js')
    <script>
        function login() {
            var content = $("#a1").val();
            alert(content);
            $.ajax({
                type:'POST',
                url:"/posts/comment/{{$post->id}}",
                data:"_token={{csrf_token()}},content="+content,
                success:function (aa) {
                    if(aa == 1) {
                        alert("请先登录再发表评论");
                    }else if(aa == 2){
                        alert('添加成功');
                    }
                }
            })
        }
    </script>
@endsection--}}

