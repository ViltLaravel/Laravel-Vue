@include('layouts.navbar')
@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card col-6 offset-3">
            <div class="card-header">
                <h4>Add Student
                    <a href="/" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif
                <form action="{{ URL::to('/student/add/student') }}" method="POST">
                    @csrf <!-- Adding CSRF token -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" id="age">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" name="gender" id="gender">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
