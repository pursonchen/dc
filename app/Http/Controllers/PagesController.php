<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
     public function root(User $user)
    {
        return view('pages.root', compact('user'));
    }

    public function record() 
    {
        return view('pages.record');
    }
}
