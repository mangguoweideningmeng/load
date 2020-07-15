<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegModel extends Model
{
    protected $table = 'reg';
    protected $primaryKey = 'id';
    // 关闭时间戳
    public $timestamps = false;
//    // 黑名单
//    //protected $guarded = ['passwords'];
    protected $fillable = ['name','password'];
}
