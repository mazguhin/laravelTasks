<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use App\Task;
use App\Tag;

use App\Http\Requests;

class TaskController extends Controller
{
    public function index()
    {
         return view('task.index',[
             'tasks'=>Auth::user()->tasks()->orderBy('created_at','desc')->paginate(5)
             ]);
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255', 
            'desc'=>'required|max:255',
            'tags'=>'max:255'
            ],[
                'title.required'=>'Поле "Заголовок" обязательно для заполнения',
                'desc.required'=>'Поле "Описание" обязательно для заполнения',
                'max'=>'Максимально допустимое количество символов: 255'
                ]);

        $thisTask = $request->user()->tasks()->create(['title'=>$request->title, 'desc'=>$request->desc]);
        $tags = explode(" ",trim(strtolower($request->tags)));
        
        foreach($tags as $tag)
        {
            $thisTag = Tag::where('name',$tag)->get();
           
            if(count($thisTag)===0)
                $thisTask->tags()->save(Tag::create(['name'=>$tag]));
            else 
                $thisTask->tags()->save($thisTag[0]);
        }

        
        return redirect('/');
    }

    public function edit(Request $request, \App\Task $task)
    {
        $this->authorize('edit', $task);
        $this->validate($request,[
            'title'=>'required|max:255', 
            'desc'=>'required|max:255',
            'tags'=>'max:255'
            ],[
                'title.required'=>'Поле "Заголовок" обязательно для заполнения',
                'desc.required'=>'Поле "Описание" обязательно для заполнения',
                'max'=>'Максимально допустимое количество символов: 255'
                ]);

        Auth::user()->tasks()->save($task);
        $task->tags()->detach();
        $tags = explode(" ",trim(strtolower($request->tags)));
        if ($tags[0]!=" ")
        {
            foreach($tags as $tag)
            {
                
                $thisTag = Tag::where('name',$tag)->get();
            
                if(count($thisTag)===0)
                    $task->tags()->save(Tag::create(['name'=>$tag]));
                else 
                    $task->tags()->save($thisTag[0]);
            }
        }

        return redirect('/');
    }

    public function editView(Request $request, \App\Task $task)
    {
        $this->authorize('edit', $task);
        return view('task.edit',['task'=>$task,'tags'=>$task->tags()]);
    }

    public function delete(Request $request, \App\Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect('/');
    }

    
}
