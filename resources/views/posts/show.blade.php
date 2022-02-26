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
        Post tab
    </title>
</head>
<body style="background-image: url('http://localhost/assets/fondo.jpg');background-repeat: no-repeat;background-size: cover; heigth:100%;">
    @include('partials.nav')

    <h1 class="text-center p-5">Post</h1>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <h4 class="card-header">{{$post->title}}</h4>
                <div class="card-body text-success">
                  <h5 class="card-title">Content: {{$post->content}}</h5>
                  <p class="card-text">Date of creation: {{$post->created_at}}</p>
            </div>
        </div>



    </div>


    <form action="{{ route('posts.destroy', $post->id) }}"  class="float-end mx-2">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Delete Post" />
    </form>
    <form action="{{ route('posts.edit', $post->id) }}"   class="float-end text-white">
        @csrf
        @method('PUT')
        <input type="submit" class="btn btn-warning text-white" value="Edit Post"  />
    </form>

</body>
</html>
