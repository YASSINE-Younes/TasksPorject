<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
         $data = $request->validated();


              if($request->hasFile('image'))
                 

            {
                // مراحل لكي اوصل للصورة التي تم تحميلها 
                        
                        // 1- get image
                    $image = $request->image;
                        
                    // 2- change current name
                    $newImageName = time() . '-' . $image->getClientOriginalName();

                        // 3- move image from laptop to  my project laravel
                        $image->storeAs('tasks' ,$newImageName , 'public'); 

                    // 4- save new name image to database record
                        $data['image']  = $newImageName;
            }
          
      
      // donne user connecter maintenant
         $data['user_id'] = Auth::user()->id;
        
 
         // Créer un nouvel enregistrement dans la table TASKS
        Task::create($data);
        return back()->with('task-status',
           'Task Added with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
