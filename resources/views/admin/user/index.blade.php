@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Пользователи</h1>
	<div class="mt-5">
		<div>
			<a href="{{ route('user_create') }}" class="btn btn-success">Создать пользователя</a>
		</div>
		<div class="mt-5 ">
			<table class="table table-dark text-center ">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Email</th>
			      <th class="text-center" scope="col" colspan="2">Действие</th>
			    </tr>
			  </thead>
			  <tbody>
			   @foreach($users as $user)
			    <tr>
			      <th scope="row">{{ $user->id }}</th>
			      <td>{{ $user->email }}</td>
			      <td class="d-flex justify-content-around" colspan="2">
			      	<a href="{{ route('user_edit', $user->id) }}" class="text-decoration-none">Изменить</a>
			      	<form action="{{ route('user_destroy', $user->id) }}" method="post">
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
