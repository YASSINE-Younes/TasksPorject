<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{

//constructeur
    public function __construct()
    {
            $this->middleware('auth')->only(['index' , 'add']);
    }


    public function index()
    {
      
                return view('theme.dashboard');
          
    }

    public function add(){
          
        return view('theme.addTask');
       
    }
}
