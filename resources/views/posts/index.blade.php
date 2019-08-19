@extends('layouts.dashboard')

@section('title', 'Post')

@section('content')
<div class="container mt-4 p-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="far fa-newspaper mr-3"></i></span> Community Post</h4>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="fas fa-edit mr-3"></i></span> Write Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            @if($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group">
                            <textarea name="content" cols="10" rows="4" placeholder="Write your idea and sharing ..." class="form-control @error('content') is-invalid @enderror"></textarea>
                            @if($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small><br>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Image Content</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="link" class="form-control" placeholder="Link or source">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection