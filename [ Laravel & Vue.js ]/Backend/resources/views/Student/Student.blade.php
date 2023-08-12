<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Student List</title> --}}

    {!! SEOMeta::generate() !!}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 style="text-align: center; justify-content: center; text-transform: uppercase;">Hi This is the Student</h1>
    {{-- <form action="{{route('insertStudent')}}" method="POST"> --}}
        <div class="form-control card-body">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Fullname" aria-label="Fullname"
                    aria-describedby="basic-addon1" name="name">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Age" aria-label="Age"
                    aria-describedby="basic-addon1" name="age">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Gender" aria-label="Gender"
                    aria-describedby="basic-addon1" name="gender">
            </div>


        </div>
    {{-- </form> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
