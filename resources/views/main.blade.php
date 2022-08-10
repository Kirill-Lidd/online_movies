@inject('CategoryController', 'App\Http\Controllers\Main\CategoryController')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>OnlineMovie фильмы и сериалы</title>
</head>

<body class="bg-black text-white">
    <!-- HEADER -->
    <div class="container-sm d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a href="{{ route('home_page') }}" class="navbar-brand" >OnlineMovie</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
                        @foreach($CategoryController->categories() as $category)
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"  id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$category->title}}
                            </a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li><a href="{{ route('movies_by_category_page',$category->id) }}" class="dropdown-item">Все {{ Str::lower($category->title) }} </a></li>
                                @foreach($CategoryController->genres() as $genre) 
                                <li><a href="{{ route('movies_by_genre_page',$genre->id) }}" class="dropdown-item " >{{ $genre->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                    <form action="{{ route('search') }}" class="d-flex">
                        <input class="form-control me-2" type="search" name="search" placeholder="Найти фильм" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Найти</button>
                    </form>
                     @if(auth()->user() and (int)auth()->user()->role == 1)
                    <div class="ms-5">
                        <div><a href="{{  route('admin_panel') }}" class="btn btn-outline-light">Админ</a></div>
                    </div>
                    @endif
                    <div class="ms-2">
                        @if(auth()->user())
                          <form action="{{ route('logout') }}" method="post">
                            @csrf
                              <input type="submit" class="btn btn-outline-light" value="Выйти">
                          </form> 
                        @else
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Войти</a>
                        </div>
                        @endif
                    </div>
                   
                </div>
            </div>
        </nav>
        <!-- Content -->
        @yield('content')
    </div>
    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center text-lg-start mt-5 	">
        <!-- Grid container -->
        <div class="text-center mt-5 p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
