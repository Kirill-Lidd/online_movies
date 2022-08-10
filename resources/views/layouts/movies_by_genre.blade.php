@extends('main')

@section('content')
<div class="container container-fluid mt-5">
    <div>
        <h1>{{ $genre->title }}</h1>
    </div>
    <div class="row row-cols-2 mt-5 row-cols-lg-5 g-2 g-lg-3 ">
        @foreach($by_genres->films as $film)
        <div class="col">
            <a href="{{ route('film_page',$film->id) }}" style="text-decoration: none;">
                <div class="card text-black text-start">
                    <img src="{{ asset("storage/" . $film->image) }}" class="card-img-top h-2" style="max-height: 250px" alt="...">
                    <div class="card-body">
                        <h2>{{ $film->title }}</h2>
                        <h6>{{ $film->year_release }}г</h6>
                        <p class="card-text text-truncate ">
                            @foreach($genres as $genre)
                                @if(in_array($genre->id, $film->genres->pluck('id')->toArray()))
                                    {{ $loop->first ? '' : ',' }}
                                    {{ $genre->title }}
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
