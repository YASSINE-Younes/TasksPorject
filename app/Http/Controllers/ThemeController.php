<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function index(){
        if(Auth::check())
            {  
                return view('theme.index');
            }
        else {
            return to_route('login');
        }
    }

    public function add(){
          if(Auth::check())
            {  
        return view('theme.addTask');
        }
        else {
            return to_route('login');
        }
    }
}
