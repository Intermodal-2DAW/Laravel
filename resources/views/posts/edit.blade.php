{{-- @extends('template')

@section('title', 'Edit Post')

@section('content')

<div class="d-flex justify-content-center align-items-center pt-5">
    <div class="w-75 ">

        <h1 class="text-center">Edit Post</h1>

    <form action="{{ route('posts.update',$post->id) }}" method="POST" class="container">

        @csrf

        <div class="form-group">
            <h4 >Title: </h4>
            <div class="form-floating ">
                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
                <label for="title">Title</label>
            </div>
        </div>

        <div class="form-group">
            <h4>Content:</h4>
            <div class="form-floating ">
                <input type="text" class="form-control" name="content" id="content" placeholder="content" value="{{$post->content}}">
                <label for="content">Content:</label>
            </div>
        </div>

        <div class="form-group">
            <h4>Users:</h4>
            <select class="form-select" name="user" id="user">
                <option value="{{$post->id}}">{{$post->id}}</option>

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
    <link rel="stylesheet" type="text/css" href="../../css/app.css">
    <script type="text/javascript" src="../../js/app.js"></script>


    <title>
        Edit Post
    </title>
</head>
<body style="background-image: url('http://localhost/assets/fondo.jpg');background-repeat: no-repeat;background-size: cover; heigth:100%;">
    @include('partials.nav')
    <div class="w-100 p-3 position-absolute">
        <h3 class="float-end text-white" >{{currentDate()}}</h3>
    </div>
    <div class="d-flex justify-content-center align-items-center pt-5">
        <div class="w-75 ">

            <h1 class="text-center">Edit Post</h1>


        <form action="{{ route('posts.update',$post->id) }}" method="POST" class="container">

            @csrf
            @method('PUT')

            <div class="form-group">
                <h4 >Title: </h4>
                <div class="form-floating ">
                    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
                    <label for="title">Title</label>
                </div>
            </div>

            <div class="form-group">
                <h4>Content:</h4>
                <div class="form-floating ">
                    <input type="text" class="form-control" name="content" id="content" placeholder="content" value="{{$post->content}}">
                    <label for="content">Content:</label>
                </div>
            </div>

            <div class="form-group">
                <h4>Users:</h4>
                <select class="form-select" name="user" id="user" disabled>
                    <option value="{{$post->id}}">{{$post->id}}</option>

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
