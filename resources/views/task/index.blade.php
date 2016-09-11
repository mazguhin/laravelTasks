@extends('layouts.app')

@section('content')
<main class="container">
<div class="row">
    <div class="col-sm-6 col-sm-push-6">
    <section class="panel panel-default">
        <header class="panel-heading">
            Добавить задачу
        </header>

        <article class="panel-body">
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

            <div class="form-group">
                <label for="tags">Теги</label>
                <input type="text" class="form-control" placeholder="Введите теги" id="tags" name="tags">
                <p class="help-block">Разделяйте теги пробелами</p>
            </div>

            <button type="submit" class="btn btn-success form-control">Отправить</button>

        </form>
        </article>

        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </section>
    </div> 


    <div class="col-sm-6 col-sm-pull-6">
    <section class="panel panel-default">
        <header class="panel-heading">
            Список задач
        </header>

        <article class="panel-body">
        <ul>
        
        @foreach($tasks as $task)
            <li>                     
                <p><b>Заголовок:</b> {{ $task->title }}<br />
                <b>Описание:</b> {{ $task->desc }}<br />
                <b>Создано:</b> {{ $task->created_at->format('d/m/Y') }}<br />
                
                @if ($task->tags[0]->name!="")
                    <b>Теги:</b>
                    @foreach ($task->tags as $tag)
                        @if (!$loop->first) |
                        @endif
                        {{ $tag->name }}
                    @endforeach
                @endif
                </p><br />
           
           <div class="row">
           <div class="col-sm-6">
                <form action="/task/{{ $task->id }}" method="GET" class="form-inline">
                    {{ csrf_field() }}                   
                    <button class="btn btn-warning">Редактировать</button>
                </form>    
            </div>
            <div class="col-sm-6">    
                <form action="/task/{{ $task->id }}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <button class="btn btn-danger">Удалить</button>
                </form>    
             </div>
             </div>

                </li>    
        @if(!($loop->last))
        <hr>
        @endif
        
        @endforeach
        </ul>
        </article>  
        {!! $tasks->render() !!}  
    </section>
    </div>

    

</div>
</main>

@endsection