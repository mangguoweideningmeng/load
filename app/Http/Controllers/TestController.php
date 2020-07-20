<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test(){
        $key1='name1';
        $val1='zhangsan';
        Redis::set();
    }
    public function zhangsan(){
        echo 111;
    }
}
