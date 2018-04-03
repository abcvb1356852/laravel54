$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$("META[name='csrf-token']").attr('content')
}
});
$(".like-button").click(function (event) {
    var target = $(event.target);
    var current_like = target.attr('like-value');
    var user_id = target.attr('like-user');
    if(current_like == 2){
        window.location.href='/login';
        return false;
    }
    if (current_like == 1) {
        //取消关注
        $.ajax({
            url: "/user/unfan/" + user_id,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.attr('like-value', 0);
                target.text("关注");
            }
        })
    } else {
        //关注
        $.ajax({
            url: "/user/fan/" + user_id,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.error != 0) {
                    alert(data.msg);
                    return;
                }
                target.attr('like-value', 1);
                target.text("取消关注");
            }
        })
    }
});
