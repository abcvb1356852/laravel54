@extends("layout.main")
@section('content')
        <div class="col-sm-8">
            <blockquote>
                <p><img src="{{$user->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>


                <footer>关注：{{$user->starts_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
                @include('user.badges.like',['target_user'=>$user])
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($posts as $v)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$user->id}}">{{$user->name}}</a> {{$v->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/show/{{$v->id}}" >{{$v->title}}</a></p>


                            <p><p>{!! str_limit($v->content,100,'...') !!}</p>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @foreach($suser as $user)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$user->name}}</p>
                            <p class="">关注：{{$user->starts_count}} | 粉丝：{{$user->fans_count}}｜ 文章：{{$user->posts_count}}</p>

                            @include('user.badges.like',['target_user'=>$user])

                        </div>
                         @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        @foreach($fuser as $user)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">{{$user->name}}</p>
                                <p class="">关注：{{$user->starts_count}} | 粉丝：{{$user->fans_count}}｜ 文章：{{$user->posts_count}}</p>

                            @include('user.badges.like',['target_user'=>$user])

                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->


@endsection