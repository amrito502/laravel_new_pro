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
                    <h4>Permissions @can('create permission')<a href="{{ route('permissions.create') }}" class="btn btn-success float-end">Add
                            Permission</a>@endcan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                @canany(['edit permission','delete  permission'])
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @can('edit permission')<a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-info">Edit</a>@endcan
                                    @can('delete permission')<a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger">Delete</a>@endcan
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