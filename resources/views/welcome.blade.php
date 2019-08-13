@extends('layouts.master')

@section('title', 'Welcome !')

@section('content')
<div class="container">
    <div class="jumbotron card card-image shadow" style="background-image: url({{ asset('img/all-bg.jpg') }}); 
            background-size: 100%;">
        <div class="text-white text-center py-5 px-4">
            <div>
                <h2 class="card-title pt-3 mb-5 font-bold"><strong>Welcome to Our Community</strong></h2>
                <p class="mx-5 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos. Odit sed qui, dolorum!
                </p>
                <a class="btn btn-primary" href="{{ route('register') }}"><h5 class="m-0"><i class="fas fa-check-circle mr-2"></i> 
                    Register Now!</h5></a>
            </div>
        </div>
    </div>
</div>

@endsection