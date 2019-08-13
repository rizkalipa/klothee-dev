@extends('layouts.master')

@section('title', 'Login Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-body">
                    <h3 class="card-title">Sign In <span class="highlight"><i class="far fa-grin"></i></span></h3><hr>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}"><br>
                        @if($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small><br><br>
                        @endif
                        
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password"><br>
                        @if($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small><br><br>
                        @endif
    
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div><br>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg px-5">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
