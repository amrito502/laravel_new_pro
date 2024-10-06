@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{$role->name}}
                        <a href="{{ route('roles.index') }}" class="btn btn-success float-end">Roles</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/' . $role->id . '/give-permission') }}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">{{ $message->first('permission') }}</span>
                            @enderror
                            <label for="">Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox"
                                             name="permission[]"
                                             value="{{ $permission->name }}"
                                             {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                            />
                                            
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
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