@extends('template')

@section('title','Home page')

@section('content')

    <div class="position-relative">
        <img src="http://localhost/assets/rop.jpg" alt="????"  style="object-fit: cover; width: 100%;">

        <div class="position-absolute" style="top: 30%;left: 50%;transform: translate(-50%,-50%);background-color: rgba(255,255,255,0.2);border-radius: 100px;">
            <h1 class="text-center p-4 text-success fw-bolder text-nowrap" >Home page</h1>
            <p class="text-center text-white">Welcome</p>
        </div>


    </div>






@endsection
