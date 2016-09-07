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
        //return view('task.add', ['title'=>$request->title, 'desc'=>$request->desc]);
    }

    public function delete(Request $request, $task)
    {
       Task::find($task)->delete();
        return redirect('/');
    }
}
