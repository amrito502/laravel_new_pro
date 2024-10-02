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
                        <table>
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
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection