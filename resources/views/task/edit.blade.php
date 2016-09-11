@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Редактирование записи
            </div>

            <div class="panel-body">
                <div class="col-sm-5 col-sm-offset-3">
                    <form action="/task/{{ $task->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input value="{{ $task->title }}" type="text" class="form-control" value="{{ old('title') }}" placceholder="Введите заголовок" id="title" name="title">
                            @if($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="desc">Описание</label>
                            <input value="{{ $task->desc }}" type="text" class="form-control" value="{{ old('desc') }}" placceholder="Введите описание" id="desc" name="desc">
                            @if($errors->has('desc'))
                                <span class="help-block">
                                    {{ $errors->first('desc') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="tags">Теги</label>
                           
                            <input value="<?php
                            $arrayLen=count($task->tags);
                            $counter=0;
                            foreach($task->tags as $tag) 
                                {
                                    if (++$counter == $arrayLen)
                                        echo $tag->name;
                                    else
                                        echo $tag->name." ";
                                } 
                            ?>" type="text" class="form-control" value="{{ old('tags') }}" placeholder="Введите теги" id="tags" name="tags">
                            <p class="help-block">Разделяйте теги пробелами</p>
                            @if($errors->has('tags'))
                                <span class="help-block">
                                    {{ $errors->first('tags') }}
                                </span>
                            @endif
                        </div>

                        <button class="btn btn-success col-sm-4 col-sm-offset-1" type="submit">Отправить</button>
                        <a class="btn btn-danger col-sm-4 col-sm-offset-2" href="/">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection