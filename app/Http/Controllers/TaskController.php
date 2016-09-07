<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use App\Http\Requests;

class TaskController extends Controller
{
    public function index()
    {
        
        return view('task.index',['tasks'=>Task::orderBy('created_at','desc')->paginate(5)]);
    }

    public function add(Request $request)
    {
        $this->validate($request,['title'=>'required|max:255', 'desc'=>'required|max:255']);


        Task::create(['title'=>$request->title, 'desc'=>$request->desc]);
        return redirect('/');
    }

    public function edit(Request $request, $task_id)
    {
        $this->validate($request,['title'=>'required|max:255', 'desc'=>'required|max:255']);
        $task = new Task;
        $task=Task::find($task_id);
        $task->title=$request->title;
        $task->desc=$request->desc;
        $task->save();
        return redirect('/');
    }

    public function editView(Request $request, $task_id)
    {
        return view('task.edit',['task'=>Task::find($task_id)]);
    }

    public function delete(Request $request, $task)
    {
       Task::find($task)->delete();
        return redirect('/');
    }
}
