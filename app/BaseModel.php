<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 2018/3/20
 * Time: 17:22
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class BaseModel extends Model{

    protected $guarded = [];//不可以注入的字段
}