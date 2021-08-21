<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODOS PAGE</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>

<body>
    {{-- <h1>TODOS PAGE</h1> --}}
    {{-- {{ $todos }} --}}
    <div class="container">

        @extends('layouts.app')

        @section('title')
            Todos List
        @endsection

        @section('content')
            <h1 class="text-center my-5">TODOS PAGE</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">
                            Todos
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($todos as $todo)
                                    <li class="list-group-item">
                                        {{ $todo->name }}

                                        @if (!$todo->completed)
                                            <a href="/todos/{{ $todo->id }}/complete" style="color: white;"
                                                class="btn btn-warning btn-sm float-right">Complete</a>
                                        @endif
                                        <a href="/todos/{{ $todo->id }}"
                                            class="btn btn-primary btn-sm float-right mr-2">View</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
