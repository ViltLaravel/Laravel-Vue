<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Cat Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Age</th>
                            <th>Sound</th>
                            <th>Hobby</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $cat->getName() }}</td>
                            <td>{{ $cat->getColor() }}</td>
                            <td>{{ $cat->getAge() }}</td>
                            <td>{{ $cat->meow() }}</td>
                            <td>{{ $cat->sleep() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
