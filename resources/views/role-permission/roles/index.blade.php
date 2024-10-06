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
                    <h4>Roles <a href="{{ route('roles.create') }}" class="btn btn-success float-end">Add
                            Role</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ url('roles/'.$role->id.'/give-permission') }}" class="btn btn-info">
                                       Add / Edit Role Permission</a>
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger">Delete</a>
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