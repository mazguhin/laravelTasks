<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use App\Task;

use App\Http\Requests;

class TaskController extends Controller
{
    public function index()
    {
         return view('task.index',['tasks'=>Auth::user()->tasks()->orderBy('created_at','desc')->paginate(5)]);
    }

    public function add(Request $request)
    {
        $this->validate($request,['title'=>'required|max:255', 'desc'=>'required|max:255'],['title.required'=>'Поле "Заголовок" обязательно для заполнения','desc.required'=>'Поле "Описание" обязательно для заполнения']);
        $request->user()->tasks()->create(['title'=>$request->title, 'desc'=>$request->desc]);
        return redirect('/');
    }

    public function edit(Request $request, \App\Task $task)
    {
        $this->authorize('edit', $task);
        $this->validate($request,['title'=>'required|max:255', 'desc'=>'required|max:255']);
        $task->title=$request->title;
        $task->desc=$request->desc;
        $task->save();
        return redirect('/');
    }

    public function editView(Request $request, \App\Task $task)
    {
        $this->authorize('edit', $task);
        return view('task.edit',['task'=>$task]);
    }

    public function delete(Request $request, \App\Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect('/');
    }

    
}
