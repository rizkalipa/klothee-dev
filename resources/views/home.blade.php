@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <!-- Jumbotron -->
    <div class="card card-image border-0 shadow rounded-lg" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/forest2.jpg);
        background-size: 100%;">
        <div class="text-white text-center py-5 px-4" style="position: relative; z-index: 2">
            <div class="py-5">
                <!-- Content -->
                <h5 class="h5 orange-text"><i class="fas fa-camera-retro mr-2"></i> Community Update</h5>
                <h2 class="card-title h2 my-4 py-2">Look Some Update Today ?</h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur obcaecati vero aliquid libero doloribus ad, unde tempora maiores, ullam, modi qui quidem minima debitis perferendis vitae cumque et quo impedit.</p>
                <a class="btn peach-gradient"><i class="fas fa-clone left"></i> View project</a>
            </div>
        </div>
        <div class="rounded-lg overlay"></div>
    </div>
    <!-- Jumbotron -->
</div>
@endsection
