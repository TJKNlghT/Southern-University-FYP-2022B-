<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/8f27d68390.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css\index.css') }}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Font awesome icon kit-->
        
        <script src="https://kit.fontawesome.com/5e7da929cb.js" crossorigin="anonymous"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
        <!-- Navbar -->
        <nav class="navbar shadow navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img class="img-fluid" id="sushi-logo" src="{{asset('images/logo.png')}}" alt="sushi logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="/"><i class="fas fa-home pe-2"></i>Home</a>
                                </li>
                                
                                <li class="nav-item mr-3">
                                    <a class="btn btn-black btn-rounded" href="{{ route('login') }}"><i class="fas fa-sign-in pe-2"></i>Log In</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="{{route('adminportal')}}"><i class="fas fa-user pe-2"></i>Admin Portal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="{{route('viewtrackorder')}}"><i class="fas fa-history pe-2"></i>Track Order</a>
                            </li>
                            <li class="nav-item dropdown mr-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black;text-decoration:none;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;text-decoration:none;">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </head>
    <body>
        
        <main>
            {{$slot}}
        </main>

        <script src="{{asset('js/index.js')}}"></script>
    </body>
</html>