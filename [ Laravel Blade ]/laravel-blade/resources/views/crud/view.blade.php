@include('layouts.navbar')
@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card col-6 offset-3">
            <div class="card-header">
                <h4>View Student
                    <a href="/" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/student/View/student/' .$view->id) }}" method="POST">
                    @csrf <!-- Adding CSRF token -->
                    {{-- @method("PATCH")     --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $view->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" id="age" value="{{ $view->age }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" name="gender" id="gender" value="{{ $view->gender }}" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
