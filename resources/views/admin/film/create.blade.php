@extends('admin.index')
@section('page')
<div class="mt-5 ms-5 col-8 mb-5 " style="width: 350px">
    <h1>Фильмы</h1>
    <div class="mt-5 ">
        <form action="{{ route('film_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="title" placeholder="Название" value="{{old('title')}}">
              <label>Название</label>
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <textarea class="form-control" name="description"  placeholder="Описание" id="floatingTextarea2" style="height: 100px">{{ old('description')}}</textarea>
              @error('description')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
            	<select class="form-select" name="category_id" aria-label="Default select example" >
            		@foreach($categories as $category)
                        <option {{ $category->id == old('category_id') ? 'selected':''}}  value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
            	</select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8 col-lg-5 d-flex justify-content-center align-items-center">
                <div class="d-flex text-left align-items-center w-100">
                    <strong class="sl">Жанр:</strong>
                    <select id="multiple-checkboxes" name="genre_ids[]" multiple="multiple">
                        @foreach($genres as $genre)
                        <option {{ is_array(old('genre_ids')) &&  in_array($genre->id, old('genre_ids'))?' selected ': '' }} value="{{ $genre->id }}">{{ $genre->title }}</option>
                        @endforeach
                    </select>
                    @error('genre_ids')
                     <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating mb-3">
                  <input type="text" name="year_release" class="form-control" value="{{old('year_release')}}" placeholder="Год релиза">
                  <label>Год релиза</label>
                </div>
                @error('year_release')
                 <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="formFile" class="form-label fw-bold">Постер фильма</label>
                <input class="form-control" type="file"  name="image"  id="formFile">
                @error('image')
                 <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="formFile" class="form-label fw-bold">Трейлер фильма</label>
                <input class="form-control" type="file" name="trailer"  id="formFile">
                @error('trailer')
                 <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="formFile" class="form-label fw-bold">Фильм</label>
                <input class="form-control" type="file" name="film"  id="formFile">
                @error('film')
                 <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-success mt-5" value="Загрузить фильм">
        </form>
    </div>
</div>
@endsection
