@extends ('layouts.app')

@section('content')

<main class="container">

@if (count($errors)>0)
<div class="row">
<div class="col-sm-12">
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
</div>
</div>
@endif

<div class="row">
    <div class="col-sm-12">
    <section class="panel panel-default">
        <header class="panel-heading">
            Список тегов
        </header>

        <article class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Имя тега</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->created_at->format("d/m/Y") }}</td>
                        <td>
                            <form action="/tag/{{ $tag->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $tags->render() !!}
        </article>
    </section>
    </div>
</div>
</main>

@endsection