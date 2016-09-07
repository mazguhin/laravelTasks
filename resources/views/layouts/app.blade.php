<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Laravel</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <div class="navbar-brand">
                Tasks
            </div>
            
            <li class="active"><a href="#">Главная</a></li>
            <li><a href="/tasks">Задачи</a></li>
             
        </ul>
      </nav>
    </div>

    @yield('content')
  </body>
</html>