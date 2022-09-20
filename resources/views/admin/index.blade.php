<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
</head>

<body>
<div class="d-flex">
    <div class="bg-dark col-3 text-white min-vh-100 ">
        <div class="mt-5 text-center">
            <h2><a href="{{ route('admin_panel')}}" class="text-decoration-none text-white">Admin</a></h2>
        </div>
        <div class="list-group mt-4 rounded-0">
            <a href="{{route('user_index')}}" class="p-2 ps-5 text-decoration-none custom-hover ">Пользователи</a>
            <a href="{{route('category_index')}}" class="p-2 ps-5 text-decoration-none custom-hover ">Категории</a>
            <a href="{{route('genre_index')}}" class="p-2 ps-5 text-decoration-none custom-hover ">Жанры</a>
            <a href="{{route('film_index')}}" class="p-2 ps-5 text-decoration-none custom-hover ">Фильмы</a>
        </div>
        <div class="d-flex justify-content-between fixed-bottom col-3">
            <a href="{{ route('home_page') }}" class="btn btn-success"> Сайт </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="btn btn-danger" value="Выйти">
            </form>
        </div>
    </div>
    <div class="col-9">
        @yield('page')
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
