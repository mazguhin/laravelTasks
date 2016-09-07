@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            Список задач
        </div>

        <div class="panel-body">
        <ul>
        @foreach($tasks as $task)
             
            <li>                     
                <p><b>Заголовок:</b> {{ $task->title }}<br />
                <b>Описание:</b> {{ $task->desc }}<br />
                <b>Создано:</b> {{ $task->created_at->format('m/d/Y') }}<br />
                </p>
           
                <form action="/task/{{ $task->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">Удалить</button>
                </form>    
                </li>    
        @if(!($loop->last))
        <hr>
        @endif
        
        @endforeach
        </ul>
        </div>  
        {!! $tasks->render() !!}  
    </div>
    </div>

    <div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            Добавить задачу
        </div>

        <div class="panel-body">
        <form action="/task" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" placeholder="Введите заголовок" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="desc">Описание</label>
                <input type="text" class="form-control" placeholder="Введите описание" id="desc" name="desc">
            </div>

            <button type="submit" class="btn btn-success form-control">Отправить</button>

        </form>
        
        </div>
    </div>
    </div> 

</div>
</div>

@endsection