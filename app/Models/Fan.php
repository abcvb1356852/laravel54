<?php

namespace App\Models;



class Fan extends BaseModel
{
    //粉丝用户
    public function fuser()
    {
        return $this->hasOne(\App\Models\User::class,'id','fan_id');
    }
    //被关注的用户
    public function suser()
    {
        return $this->hasOne(\App\Models\User::class,'id','star_id');
    }
}
