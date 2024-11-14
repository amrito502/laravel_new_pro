@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4>Edit Role @can('view role')<a href="{{ route('roles.index') }}" class="btn btn-success float-end">Roles</a>@endcan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update',$role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control">
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