@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')
<div class="container mt-4 p-3">
    <div class="row">
        <div class="col-md-5">
            @if(session('status'))
                <div class="alert alert-success mb-2">{{ session('status') }}</div>
            @endif
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="m-0"><span class="highlight"><i class="fas fa-user-edit mr-3"></i></span> Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ $user->profile ? route('profile.update', ['id' => auth()->user()->profile->user_id]) : route('profile.store', ['id' => auth()->user()->id]) }}" 
                            enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                    name="first_name" value="{{ $user->profile ? $user->profile->first_name : old('first_name') }}">
                                @if($errors->has('first_name'))
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small><br>
                                @endif
                                <br>
                            </div>

                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                    name="last_name" value="{{ $user->profile ? $user->profile->last_name : old('last_name') }}">
                                @if($errors->has('last_name'))
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small><br>
                                @endif
                                <br>
                            </div>
                        </div>

                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" 
                            name="address" value="{{ $user->profile ? $user->profile->address : old('address') }}">
                        @if($errors->has('address'))
                            <small class="text-danger">{{ $errors->first('address') }}</small><br>
                        @endif
                        <br>

                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" cols="15" rows="3" class="form-control">{{ $user->profile ? $user->profile->bio : old('bio') }}</textarea>
                        @if($errors->has('bio'))
                            <small class="text-danger">{{ $errors->first('bio') }}</small><br>
                        @endif
                        <br>

                        <label for="avatar">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Choose Image</label>
                            @if($errors->has('avatar'))
                                <small class="text-danger">{{ $errors->first('avatar') }}</small><br>
                            @endif
                        </div><br><br>

                        <div class="form-group">
                            @if ($user->profile)
                                <button type="submit" class="btn btn-primary btn-lg px-5">Update</button>
                            @else
                                <button type="submit" class="btn btn-primary btn-lg px-5">Save</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="m-0"><span class="highlight"><i class="fas fa-user mr-3"></i></span> Current Profile</h4>
                </div>
                <div class="card-body text-center">
                    @if ($user->profile)
                        @if ($user->profile->avatar)
                            <img src="{{ asset('/storage/' . $user->profile->avatar) }}" class="img-fluid rounded-circle w-50 shadow">
                        @else
                            <img src="{{ asset('img/klothee-favicon.png') }}" class="img-fluid rounded-circle w-50 shadow">
                        @endif
                        <h4 class="mt-4"><strong>{{ $user->profile->first_name . ' ' }}</strong><span class="highlight">{{ $user->profile->last_name }}</span></h4>
                        <h5 class="text-muted">{{ $user->role }}</h5>
                        <blockquote class="blockquote text-center mt-4">
                            <p class="mb-0">{{ $user->profile->bio }}</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    @else
                        <h5><em>Profile is Not Saved</em></h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection