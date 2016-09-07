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
                            <input value="{{ $task->title }}" type="text" class="form-control" placceholder="Введите заголовок" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="desc">Описание</label>
                            <input value="{{ $task->desc }}" type="text" class="form-control" placceholder="Введите описание" id="desc" name="desc">
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