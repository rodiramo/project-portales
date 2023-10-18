<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - PixelPlaza</title>
     <!--icon-->
     <link rel="icon" href="{{ URL::to('/img/tickets.png') }}">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Vibur:400" rel='stylesheet' type='text/css'>
<!--css-->
<link rel="stylesheet" href="{{ url('css/app.css') }}">
<!--boxicons-->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<!--bootstrap-->  
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/')}}">Home</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/news')}}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/games')}}">Games</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                            <button type="submit" class="btn nav-link">{{ auth()->user()->email }} (Log Out)</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.formLogin') }}">Log In</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @if(Session::has('message.error'))
            <div class="wrapper wrapper-error">
                <div class="message">
                  <div class="icon"><i class='bx bx-error' style='color:#ff0909'  ></i></div>
                  <div class="subject">
                    {!! Session::get('message.error') !!}
                  </div>
                
                </div>
              </div>
              @endif
            @if(Session::has('message.success'))
            <div class="wrapper wrapper-success">
                <div class="message">
                  <div class="icon"><i class='bx bxs-check-circle'  ></i></div>
                  <div class="subject">
                    {!! Session::get('message.success') !!}
                  </div>
                
                </div>
              </div>
              @endif
           

            @yield('main')
        </main>
        <footer class="footer">
            <p>Rocio Diaz Ramos &copy; 2023</p>
        </footer>
    </div>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
