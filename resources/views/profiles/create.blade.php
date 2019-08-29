@extends('layouts.dashboard')

@section('title', 'Create Profile')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success mb-2">{{ session('status') }}</div>
            @endif
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="m-0"><span class="highlight"><i class="fas fa-user-edit mr-3"></i></span> Create Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.store', ['id' => auth()->user()->id]) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                    name="first_name" value="{{ old('first_name') }}">
                                @if($errors->has('first_name'))
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small><br>
                                @endif
                                <br>
                            </div>

                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                    name="last_name" value="{{ old('last_name') }}">
                                @if($errors->has('last_name'))
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small><br>
                                @endif
                                <br>
                            </div>
                        </div>

                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" 
                            name="address" value="{{ old('address') }}">
                        @if($errors->has('address'))
                            <small class="text-danger">{{ $errors->first('address') }}</small><br>
                        @endif
                        <br>

                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" cols="15" rows="3" class="form-control">{{ old('bio') }}</textarea>
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
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection