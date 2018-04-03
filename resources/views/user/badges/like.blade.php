@if(\Auth::id())
<div>
    @if(\Auth::id() == $target_user->id)

    @elseif(\Auth::user()->hasStar($target_user->id))
        <button class="btn btn-default like-button" like-value="1" like-user="{{$target_user->id}}" type="button">取消关注</button>
    @else
    <button class="btn btn-default like-button" like-value="0" like-user="{{$target_user->id}}" type="button">关注</button>
    @endif
</div>
@else
    <button class="btn btn-default like-button" like-value="2" like-user="{{$target_user->id}}" type="button">关注</button>
@endif
