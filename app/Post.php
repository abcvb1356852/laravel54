<?php

namespace App;



class Post extends BaseModel
{
    //protected $guarded = [];//不可以注入的数据字段
   /* protected $fillable = ['title','content'];//可以注入的数据字段*/

   //关联用户
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    //评论模型
    public function comment()
    {
        return $this->hasMany('App\Models\Comment')->orderBy('created_at','desc');
    }
    //和用户进行关联
    public function zan($user_id)
    {
        return $this->hasOne(\App\Models\Zan::class)->where('user_id',$user_id);
    }
    //文章的所有赞
    public function zans()
    {
        return $this->hasMany(\App\Models\Zan::class);
    }

}
