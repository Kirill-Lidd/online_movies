@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Жанры</h1>
	<div class="mt-5">
		<div>
			<a href="{{ route('genre_create') }}" class="btn btn-success">Создать жанр</a>
		</div>
		<div class="mt-5 ">
			<table class="table table-dark text-center ">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Имя</th>
			      <th class="text-center" scope="col" colspan="2">Действие</th>
			    </tr>
			  </thead>
			  <tbody>
			  @foreach($genres as $genre)
			    <tr>
			      <th scope="row">{{$genre->id}}</th>
			      <td>{{$genre->title}}</td>
			      <td class="d-flex justify-content-around" colspan="2">
			      	<a href="{{ route('genre_edit', $genre->id) }}" class="text-decoration-none">Изменить</a>
			      	<form action="{{ route('genre_update', $genre->id) }}" method="post">
			      		@csrf
			      		@method('delete')
			      			<button type="submit" class=" text-decoration-none text-danger border-0 bg-dark">Удалить</button>
			      	</form>
			  		</td>	
			    </tr>
			  @endforeach	    
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection
