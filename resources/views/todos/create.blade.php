<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Todos</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>

    <div class="container">
    @extends('layouts.app')

    @section('content')
        <h1 class="text-center my-5">Create Todos</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Create new todo</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/store-todos" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <textarea name="description" placeholder="Description" cols="5" rows="5"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Create Todo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
