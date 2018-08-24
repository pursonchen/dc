<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth', ['except' => ['permission-denied']]);
    }

     public function root()
    {
        return view('pages.root'); 
    }

    public function record(User $user) 
    {
        return view('pages.record');
    }

    public function permissionDenied()
    {
        // 如果当前用户有权限访问后台，直接跳转访问
        if (config('administrator.permission')()) {
            return redirect(url(config('administrator.uri')), 302);
        }
        // 否则使用视图
        return view('pages.permission_denied');
    }
}
