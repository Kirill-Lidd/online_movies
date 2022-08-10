@extends('admin.index')

@section('page')
<div class="mt-5 ms-5 col-8 ">
    <h1>{{$user->name}}</h1>
    <div class="mt-5">
        <div class="mt-5 ">
            <form action="{{ route('user_update',$user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <table class="table table-dark text-center ">
                  <tbody>
                    <tr>
                        <td>ID</td>
                        <td>
                            {{$user->id}}
                            <input type="hidden" name="user_id" value="{{$user->id}}"> 
                        </td> 
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>
                            <input type="text" name="name" value="{{$user->name}}">
                            @error('name')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="{{$user->email}}">
                            @error('email')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror 
                        </td>
                    </tr>
                     <tr>
                        <td>Роль</td>
                        <td>
                            <div>
                              <select class="form-select w-50 m-auto" name="role" aria-label="Default select example" >
                                @foreach($roles as $id => $role)
                                        <option {{ $id == $user->role ? 'selected':''}}  value="{{ $id }}">{{ $role}}</option>
                                    @endforeach
                              </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 
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
