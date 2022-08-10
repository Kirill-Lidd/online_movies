@extends('main')
@section('content')
<div class="container container-fluid mt-5">
    <div class="d-flex col-12 justify-content-between">
        <div class="col-4 mx-auto ">
            <div class="d-grid gap-2  col-10 mx-auto">
                <img src="{{ asset('storage/'. $film->image) }}" alt="" class="rounded container-fluid" style="max-width: 300px;">
            </div>
            <div class="d-grid gap-2  col-10 mx-auto">
                <button type="button" class="rounded-pill btn btn-outline-light mt-3" data-bs-toggle="modal" data-bs-target="#trailer">
                    Трейлер
                </button>
                <!-- Modal -->
                <div class="modal fade" id="trailer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                    <div class="modal-dialog modal-lg " data-bs-backdrop="true">
                        <div class="modal-content ">
                            <video controls   class="embed-responsive-item" id="trailer_video">
                                <source src="{{ asset('storage/'. $film->trailer) }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 ">
            <div class="col-8">
                <h1>{{$film->title}} ({{$film->year_release}})</h1>
            </div>
            <div class="col-8">
                <p>{{$film->description}}</p>
            </div>
            <div class="d-flex">
                <div>
                    <button type="button" class="rounded-pill btn btn-outline-light btn-lg me-2" data-bs-toggle="modal" data-bs-target="#film">
                        Смотреть
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="film" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                        <div class="modal-dialog modal-lg " data-bs-backdrop="true">
                            <div class="modal-content">
                               <video controls class="embed-responsive-item" id="film_video">
                                   <source src="{{ asset('storage/'. $film->film) }}" type="video/mp4">
                               </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="rounded-pill btn btn-outline-light btn-lg">Смотреть позже</button>
                </div>
            </div>
            <div class="mt-5">
                <div>
                    <h3>О фильме</h3>
                    <div style="font-size: 13px;">
                        <div class="d-flex mt-3">
                            <div class="col-3 text-muted">Год производства</div>
                            <div class="col-4">{{ $film->year_release }}</div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="col-3 text-muted">Страна</div>
                            <div class="col-4">СССР</div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="col-3 text-muted">Жанр</div>
                            <div class="col-4">
                                @foreach($genres as $genre)
                                    @if(in_array($genre->id, $film->genres->pluck('id')->toArray()))
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $genre->title }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="col-3 text-muted">Длительность</div>
                            <div class="col-4">92 мин.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div>
                    <h3>Актерский состав</h3>
                    <div style="font-size: 13px;">
                        <span>Надежда Румянцева, Николай Рыбников, Люсьена Овчинникова, Станислав Хитров, Инна Макарова,Светлана Дружинина,Нина Меньшикова,Роман Филиппов, Михаил Пуговкин, Анатолий Адоскин</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top border-white mt-5">
        <div class="mt-3">
            <h2>Отзывы</h2>

        </div>
    </div>
</div>
<script>
var trailer = document.getElementById('trailer')
var film = document.getElementById('film')
var trailerVideo = document.getElementById('trailer_video')
var filmVideo = document.getElementById('film_video')

trailer.addEventListener('hide.bs.modal', function(event) {
    trailerVideo.pause();
})

film.addEventListener('hide.bs.modal', function(event) {
    filmVideo.pause();
})

</script>
@endsection
