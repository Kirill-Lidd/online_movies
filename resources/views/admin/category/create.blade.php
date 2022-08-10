@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Категории</h1>
	<div class="mt-5">
		<form action="{{ route('category_store') }}" method="POST">
			@csrf
			<input type="text" name="title" placeholder="Название категории">
			@error('title')
			  <div class="text-danger">{{ $message }}</div>
			@enderror  
			
			<input type="submit" class="btn btn-success" value="Создать категорию">
		</form>
	</div>
</div>
@endsection
