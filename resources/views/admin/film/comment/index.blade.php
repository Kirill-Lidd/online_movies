@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
	<h1>Комментарии</h1>
	<div class="mt-5">
		<div class="mt-5 ">
			<table class="table table-dark text-center ">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Пользователь</th>
			      <th scope="col">Тип отзыва</th>
			      <th scope="col">Заголовок</th>
			      <th scope="col">Содержимое</th>
			      <th class="text-center" scope="col" colspan="2">Действие</th>
			    </tr>
			  </thead>
			  <tbody>
              @foreach($comments as $comment)
                  <tr>
                      <th scope="row">{{ $comment->id }}</th>
                      <td>{{ $comment->user->name}}</td>
                      <td>
                          @foreach($typeComment as $id => $type)
                              @if($id == $comment->type_comment)
                                  {{$type}}
                              @endif
                          @endforeach
                      </td>
                      <td>{{ $comment->title }}</td>
                      <td class="text-lg-start" style="max-width: 300px;">{{ $comment->content }}</td>
                      <td>
                          <form action="{{ route('comment_destroy', $comment->id) }}" method="post">
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
