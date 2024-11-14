@extends('master')
@section('content')
@include('role-permission.nav-links')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Users @can('create user')<a href="{{ route('users.create') }}" class="btn btn-success float-end">Add
                            User</a>@endcan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                @canany(['edit user', 'delete user'])
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $roleName)
                                            <label class="badge bg-primary mx-1">{{$roleName}}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('edit user')<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-info">Edit</a>@endcan
                                    @can('delete user')<a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-danger">Delete</a>@endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection