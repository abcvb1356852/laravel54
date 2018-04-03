<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Postpolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //修改选项
    public function update(User $user,Post $post)
    {
        return $user->id === $post->user_id;
    }
    //删除选项
    public function delete(User $user,Post $post)
    {
        return $user->id === $post->user_id;
    }
}
