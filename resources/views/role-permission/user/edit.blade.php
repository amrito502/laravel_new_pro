@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row">
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User <a href="{{ url('users') }}" class="btn btn-success float-end">Users</a>
                    </h4>
                </div>
                <div class="card-body">
                  
                    <form action="{{ url('users/'.$user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Emai</label>
                            <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select name="roles[]" multiple class="form-control">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection