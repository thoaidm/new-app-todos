<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deleted Todos</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>
    <div class="container">

        @extends('layouts.app')

        @section('title')
            {{-- Single Todo: {{ $todo->name }} --}}
        @endsection

        @section('content')
            @foreach($todo as $row )
            <h1 class="text-center my-5">
                {{ $row->name }}
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            Details
                        </div>

                        <div class="card-body">
                            {{ $row->description }}
                        </div>
                    </div>
                </div>
                <a href="/todos/{{ $row->id }}/restore" class="btn btn-info my-2">Restore</a>
                <a href="/todos/{{ $row->id }}/fdestroy" class="btn btn-danger my-2">FDelete</a>
            </div>
            @endforeach
        </div>
    @endsection
</body>

</html>
