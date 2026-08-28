<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 

class ThemeController extends Controller
{

//constructeur
    public function __construct()
    {
            $this->middleware('auth');
    }


    public function index()
    {
            $user = User::findOrFail(Auth::id());

            $totalTasks = $user->tasks()->count();

            $pendingTasks = $user->tasks()->where('status', 'pending')->count();

            $inProgressTasks = $user->tasks()->where('status', 'in_progress')->count();

            $completedTasks = $user->tasks()->where('status', 'completed')->count();

 



            return view('theme.dashboard', compact(
                'totalTasks',
                'pendingTasks',
                'inProgressTasks',
                'completedTasks',
             ));
          
    }

   
}
