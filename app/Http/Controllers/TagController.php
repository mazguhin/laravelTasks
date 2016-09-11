<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

use App\Http\Requests;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index',['tags'=>Tag::orderBy('created_at','desc')->paginate(5)]);
    }

    public function delete (Tag $tag)
    {
        if(count($tag->tasks()->get())===0) {
            $tag->delete();
            return redirect('/tag');
        }
        else {
            return redirect('/tag')->withErrors(['message'=>'Данный тег используется существующей задачей']);
        }
    }
}
