@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Фильмы</h1>
	<div class="mt-5">
		<div>
			<a href="{{ route('film_create') }}" class="btn btn-success">Создать карту фильма</a>
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
			   @foreach($films as $film)
			    <tr>
			      <th scope="row">{{ $film->id }}</th>
			      <td>{{ $film->title }}</td>
			      <td class="d-flex justify-content-around" colspan="2">
			      	<a href="{{ route('film_edit', $film->id) }}" class="text-decoration-none">Изменить</a>
			      	<form action="{{ route('film_destroy', $film->id) }}" method="post">
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
