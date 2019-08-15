@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
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
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg px-5">Login</button>
            </div>
        </div>
        <div class="col-md-5">
            
        </div>
    </div>
</div>
@endsection