@extends('master')
@section('content')
<section class="main_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5 p-5">
                    <div class="card-header">
                        Laravel CSV File Upload
                    </div>
                    <div class="card-body shadow">
                        @if (session('success'))
                            <div>{{ session('success') }}</div>
                        @endif
                        <form action="/students/upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="csv_file">Upload CSV file:</label>
                            <input class="form-control mt-3" type="file" name="csv_file" id="csv_file" accept=".csv">
                            @if($errors->has('csv_file'))
                                <div class="error mt-3 text-danger">{{ $errors->first('csv_file') }}</div>
                            @endif
                            <button type="submit" class="btn btn-success mt-4">Upload</button>
                        </form>
                        <div class="table_section mt-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Class</th>
                                        <th>Branch</th>
                                        <th>Shift</th>
                                        <th>Gender</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->sid }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td>{{ $student->branch }}</td>
                                            <td>{{ $student->shift }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
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
    </div>
</section>
@endsection