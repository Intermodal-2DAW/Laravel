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
        List posts
    </title>
</head>
<body style="background-image: url('http://localhost/assets/fondo.jpg');background-repeat: no-repeat;background-size: cover; heigth:100%;">
    @include('partials.nav')

    <div class="container-fluid">

        <div class="row m-0">
            <div class="col-md-4">

                <div class="p-5">
                    <img src="http://localhost/assets/post.png" alt="" class="w-100 mt-5">

                </div>
            </div>
            <div class="col-md-8">
                <h1 class="text-center pt-5 p-3">Post</h1>

                    <table class="table table-hover">
                        <th scope="col"><h2>Post Title</h2></th>
                        <th scope="col"><h2>See post</h2></th>
                        <th scope="col"><h2>Delete Post</h2></th>
                        <th scope="col"><h2>Edit Post Random</h2></th>
                        @foreach($posts as $post)
                            <tr scope="row">
                                <td >
                                    {{ $post->title }} ( {{$post->user->login}} )
                                </td>
                                <td>
                                    <a href=" {{ route('posts.show',$post)}}" class="btn btn-success">Watch</a>
                                </td>
                                <td>
                                    <a href=" {{ route('posts.destroy',$post)}}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a href=" {{ route('posts.editTest',$post)}}" class="btn btn-warning text-white">Edit Random</a>
                                </td>
                            <tr>
                        @endforeach
                    </table>

                    <a href=" {{ route('posts.newPost')}}" class="btn btn-primary mb-5 text-white">Add New Post Random</a>


            </div>


        </div>
    </div>





</body>
</html>
