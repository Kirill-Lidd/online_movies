@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
    <h1>{{$film->title}}</h1>
    <div class="mt-5">
        <div class="mt-5 ">
            <form action="{{ route('film_update',$film->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <table class="table table-dark text-center ">
                  <tbody>
                   <tr>
                        <td>ID</td>
                        <td>{{$film->id}}</td> 
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>
                            <input type="text" name="title" value="{{$film->title}}">
                            @error('title')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>

                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>
                            <textarea class="form-control" name="description"  id="floatingTextarea2" style="height: 100px">{{$film->description}}</textarea>
                            @error('description')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td> 
                    </tr>
                     <tr>
                        <td>Год релиза</td>
                        <td>
                            <input type="text" name="year_release" value="{{$film->year_release}}">
                            @error('year_release')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td> 
                    </tr>
                     <tr>
                        <td>Категория</td>
                        <td>
                            <select style=" width: 50%;margin: 0 auto;" class="form-select " name="category_id" aria-label="Default select example" >
                                @foreach($categories as $category)
                                    <option {{ $category->id == $film->category_id ? 'selected':''}}  value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                     <tr>
                        <td>Жанр</td>
                        <td>
                            <div  class="m-auto w-50 col-md-8 col-lg-5 d-flex justify-content-center bg-white rounded align-items-center">
                                <div class="d-flex text-left align-items-center  w-100">
                                   <select  class="" id="multiple-checkboxes" name="genre_ids[]" multiple="multiple">
                                       @foreach($genres as $genre)
                                       <option {{ is_array($film->genres->pluck('id')->toArray() ) &&  in_array($genre->id, $film->genres->pluck('id')->toArray())?' selected ': '' }} value="{{ $genre->id }}">{{ $genre->title }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                @error('genre_ids')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror 
                        </td>
                    </tr>
                    <tr>
                        <td>Постер</td>
                        <td>
                            <div>
                                <img style="height:100px;width: 100px;" src="{{url('storage/'. $film->image )}}" alt="">
                            </div> 
                            <input type="file" name="image" value="{{$film->image}}">
                            @error('image')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td> 
                    </tr>
                    <tr>
                        <td>Трейлер</td>
                        <td>
                            <div>
                                <video style="height:100px;width: 200px;" controls class="embed-responsive-item" id="trailer_video">
                                    <source src="{{url('storage/'. $film->trailer )}}" type="video/mp4">
                                </video>
                            </div> 
                            <input type="file" name="trailer" value="{{$film->trailer}}">
                            @error('trailer')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td> 
                    </tr>
                    <tr>
                        <td>Фильм</td>
                        <td>
                            <div>
                                <video style="height:100px;width: 200px;" controls class="embed-responsive-item" id="trailer_video">
                                    <source src="{{url('storage/'. $film->film )}}" type="video/mp4">
                                </video>
                            </div> 
                            <input type="file" name="film" value="{{$film->film}}">
                            @error('film')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td> 
                    </tr>
                    
                  </tbody>
                </table>
                <input type="submit" value="Сохранить изменения">
            </form>
        </div>
    </div>
</div>
@endsection
