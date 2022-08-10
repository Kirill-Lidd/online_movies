@extends('admin.index')
@section('page')
<div class="mt-5 ms-5 col-8 mb-5 " style="width: 350px">
    <h1>Пользователи</h1>
    <div class="mt-5 ">
        <form action="{{ route('user_store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" placeholder="Имя" value="{{old('name')}}">
              <label>Имя</label>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
              <label>Email</label>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div> 
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" placeholder="Пароль">
              <label>Пароль</label>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <select class="form-select" name="role" aria-label="Default select example" >
                @foreach($roles as $id => $role)
                        <option {{ $id == old('role') ? 'selected':''}}  value="{{ $id }}">{{ $role}}</option>
                    @endforeach
              </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            
           
            <input type="submit" class="btn btn-success mt-5" value="Создать пользователя">
        </form>
    </div>
</div>
@endsection
