@include('layouts.navbar')
@extends('layouts.app')
@section('content')
<div class="container mt-5">
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Student List
                <a href="{{ url('student/add/student/') }}" class="btn btn-primary float-end">Add Student</a>
            </h4>      
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allStudents as $key => $student )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>
                                <a href="{{ url('student/view/student/' .$student->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ url('student/edit/student/' .$student->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ url('/student/delete/student/' .$student->id) }}" style="display:inline" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection