@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Жанры</h1>
	<div class="mt-5">
		<form action="{{ route('genre_store') }}" method="POST">
			@csrf
			<input type="text" name="title" placeholder="Название категории">
			@error('title')
			  <div class="text-danger">{{ $message }}</div>
			@enderror
			
			<input type="submit" class="btn btn-success" value="Создать жанр">
		</form>
	</div>
</div>
@endsection
