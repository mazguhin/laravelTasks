@extends ('layouts.app')

@section ('content')

<div class="col-sm-5 col-sm-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            Информация
        </div>

        <div class="panel-body text-center">
        
        <p><b>Информация успешно добавлена.</b>
        <p><i>Заголовок:</i> {{$title}}
        <p><i>Описание:</i> {{$desc}}</p>
        <a class="btn btn-success" href="/">Вернуться на главную</a>
        </div>
    </div>
    </div> 

@endsection