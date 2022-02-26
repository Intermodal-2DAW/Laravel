{{-- @extends('template')

@section('title', 'New Post')

@section('content')

<div class="d-flex justify-content-center align-items-center pt-5">
    <div class="w-75 ">

        <h1 class="text-center">New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="container">

        @csrf
        @method('PUT')

        <div class="form-group">
            <h4 >Title: </h4>
            <div class="form-floating ">
                <input type="text" class="form-control" name="title" id="title" placeholder="title">
                <label for="title">Title</label>
            </div>
        </div>

        <div class="form-group">
            <h4>Content:</h4>
            <div class="form-floating ">
                <input type="text" class="form-control" name="content" id="content" placeholder="content">
                <label for="content">Content:</label>
            </div>
        </div>

        <div class="form-group">
            <h4>Users:</h4>
            <select class="form-select" name="user" id="user">
                <option value="">Select user id</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" name="send" value="Send" class="btn btn-success btn-block float-end my-4">
        </div>

    </form>
    </div>
</div>



@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <script type="text/javascript" src="../js/app.js"></script>


    <title>
        New Post
    </title>
</head>
<body style="background-image: url('http://localhost/assets/fondo.jpg');background-repeat: no-repeat;background-size: cover; heigth:100%;">
    @include('partials.nav')
    <div class="d-flex justify-content-center align-items-center pt-5">
        <div class="w-75 ">

            <h1 class="text-center">New Post</h1>

            {{-- @if ($errors->any())
            <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
            </ul>
            @endif --}}
        <form action="{{ route('posts.store') }}" method="POST" class="container">

            @csrf

            <div class="form-group">
                <h4 >Title: </h4>
                <div class="form-floating ">
                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ old('title') }}">
                    <label for="title">Title</label>
                </div>
            </div>
            @if ($errors->has('title'))
                <div class="text-danger">
                {{ $errors->first('title') }}
                </div>
            @endif

            <div class="form-group">
                <h4>Description:</h4>
                <div class="form-floating ">
                    <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{ old('description') }}">
                    <label for="description">Description:</label>
                </div>
            </div>
            @if ($errors->has('description'))
                <div class="text-danger">
                {{ $errors->first('description') }}
                </div>
            @endif

            <div class="form-group">
                <h4>Image:</h4>
                <div class="form-floating ">
                    <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{ old('image') }}">
                    <label for="image">Image:</label>
                </div>
            </div>
            @if ($errors->has('image'))
                <div class="text-danger">
                {{ $errors->first('image') }}
                </div>
            @endif

            <div class="form-group">
                <h4>Users:</h4>
                <select class="form-select" name="user" id="user">
                    {{-- <option value="">Select user id</option> --}}
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" name="send" value="Send" class="btn btn-success btn-block float-end my-4">
            </div>

        </form>
        </div>
    </div>
</body>
</html>
