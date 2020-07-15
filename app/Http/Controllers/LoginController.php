<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RegModel;
class LoginController extends Controller
{
    public function reg(){
        return view('login.reg');
    }
    public function regdo(Request $request){
        $post=request()->except('_token');
//        $name=$request->input('name');
//        $password=$request->input('password');
//        $passwords=$request->input('passwords');
        if ($post['password']!=$post['passwords']){
            header('Refresh:2,url=/user/reg');
            echo "两次密码不一致";
        }else{
            $post['password']=password_hash($post['password'], PASSWORD_BCRYPT);
            $user=RegModel::where('name',$post['name'])->first();
            if ($user){
                header('Refresh:2,url=/user/reg');
                echo "用户名已存在";exit;
            }
            RegModel::create($post);
            header('Refresh:2,url=/user/login');
            echo "注册成功";
        }
    }
    public function login(){
        return view('login.login');
    }
    public function logindo(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $res=RegModel::where('name',$name)->first();

        if (!$res){
            header('Refresh:2,url=/user/login');
            echo "用户名密码错误";exit;
        }
        if (password_verify($password,$res['password'])){
            header('Refresh:2,url=/user/create');
            echo "登录成功";exit;
        }else{
            header('Refresh:2,url=/user/login');
            echo "用户名密码错误";exit;
        }
    }
    public function create(){
        echo "个人中心";
    }
}
