@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
    <h1>{{$genre->title}}</h1>
    <div class="mt-5">
        <div class="mt-5 ">
            <form action="{{ route('genre_update', $genre->id) }}" method="post">
                @csrf
                @method('PATCH')
                <table class="table table-dark text-center ">
                  <tbody>
                   <tr>
                        <td>ID</td>
                        <td>Название</td> 
                    </tr>
                    <tr>
                        <td>{{$genre->id}}</td>
                        <td>
                            <input type="text" name="title" value="{{$genre->title}}">
                            @error('title')
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
