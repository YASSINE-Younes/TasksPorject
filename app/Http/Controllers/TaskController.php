<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

 use App\Http\Requests\StoreTaskRequest;
 use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{

    //constructeur
        public function __construct()
        {
                $this->middleware('auth');
        }



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                    $search = $request->search;
                    $statusFilter = $request->statusFilter;
                    $priorityFilter = $request->priorityFilter;
              
                  


                // تجهيز استعلام مهام المستخدم
                $query = Task::where('user_id', Auth::id());

                  // البحث بالعنوان
                if ($search) 
                {
                    $query->where('title','like','%' . $search . '%');
                }

                // الفلترة بالحالة
                  if($statusFilter)
                    {
                    $query->where('status', $statusFilter);

                    }
               
                // الفلترة بالأولوية
                    if($priorityFilter)
                        {
                      $query->where('priority', $priorityFilter);

                        }

                  // تنفيذ الاستعلام
                $tasks = $query->latest()->paginate(6);
                     
                return view('theme.index', compact('tasks'));
                        

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
        if($task->user_id == Auth::user()->id)
            {

            
      return view('theme.showTask' , compact('task'));
            }
            else {
                abort(403 , 'Impossible de voir  une tache pas de vous ' );
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
         if($task->user_id == Auth::user()->id)
            {

            
            return view('theme.editTask' , compact('task'));
            }
            else {
                abort(403 , 'Impossible de modofier  une tache pas de vous ' );
            }
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
 
     if($task->user_id == Auth::user()->id)
                 
        {

         $data = $request->validated();
      
         
            // تاكد في حالة  مستخدم حمل صورة ام لا
            if($request->hasFile('image'))
                {
                     // مراحل لكي اوصل للصورة التي تم تحميلها 
        
                      //0 Delete Old Image dans Dossier Originale STORAGE  
                      // on utuliser IF Parce que votre image est nulle.
                     //  Si la tâche ne contient pas d'ancienne image, 
                       //Laravel ne tentera pas de supprimer un chemin vide.
                      if ($task->image) 
                        {
                                  Storage::delete("public/tasks/$task->image");  
                      }
                        
 
                        // 1- get image
                    $image = $request->image;
                        
                    // 2- change current name
                    $newImageName = time() . '-' . $image->getClientOriginalName();

                        // 3- move image from laptop to  my project laravel
                        $image->storeAs('tasks' ,$newImageName , 'public'); 

                    // 4- save new name image to database record
                        $data['image']  = $newImageName;

                              
                       }


  

         $task->update($data);

        return back()->with('update-task',   'La tâche a été modifiée avec succès.');
                    }
                    else 
                    {
                       abort(403 , 'Vous n’êtes pas autorisé à modifier cette tâche.');
                    }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
         if($task->user_id == Auth::user()->id)
         {

         // حذف الصورة إذا كانت موجودة
        if ($task->image) 
            {
            // تاكد من ان المستخدم الذي يريد حذف المقال هو نفس المستخدم الذي قام بانشاء المقال
           Storage::delete("public/tasks/$task->image");  
        }

             // حذف المهمة من قاعدة البيانات
            $task->delete();
             return to_route('tasks.index')->with('task-status-delete',   'La tâche a été supprimée avec succès.');
           }
           else 
            {
            abort(403 , 'Vous n’êtes pas autorisé à supprimer cette tâche.');
              }
    }
}
