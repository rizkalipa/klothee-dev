@extends('layouts.master')

@section('title', 'Register Page')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <h3 class="card-title">Register <span class="highlight"><i class="far fa-grin-beam"></i></span></h3><hr>
                            
                            <label for="name">Name</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}"><br>
                            @if($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small><br><br>
                            @endif
    
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
    
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                name="password_confirmation"><br>
                            @if($errors->has('password_confirmation'))
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small><br><br>
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
