@extends ('layouts.app')

@section('content')

<main class="container">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <header class="panel-heading">
                    Профиль пользователя
                </header>

                <article class="panel-body text-center">
                    <p><strong>Имя: </string> {{ Auth::user()->name }}</p>
                    <p><strong>Email: </string> {{ Auth::user()->email }}</p>
                    <p><strong>Задач: </string> {{ Auth::user()->tasks()->count() }}</p>
                </article>
            </section>
        </div>
    </div>
</main>

@endsection