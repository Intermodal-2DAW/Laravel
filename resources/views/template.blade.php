
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
        @yield('title')
    </title>
</head>
<body style="background-image: url('http://localhost/assets/fondo.jpg');background-repeat: no-repeat;background-size: cover; heigth:100%;">
    @include('partials.nav')
    <div class="w-100 p-3 position-absolute">
        <h3 class="float-end text-white" >{{currentDate()}}</h3>
    </div>
    @yield('content')
</body>
</html>


