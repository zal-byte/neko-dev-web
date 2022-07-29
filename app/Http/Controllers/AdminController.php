<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogModel;

class AdminController extends Controller
{
    //
    public function postManage(){
        if(Auth::user()->role == "admin"){
            $posts = BlogModel::get();
            
            return view('admin.manage', ["posts"=>$posts]);
        }
    }

 
}
