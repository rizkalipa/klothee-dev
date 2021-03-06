@extends('layouts.dashboard')

@section('title', 'Edit Post')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="fas fa-edit mr-3"></i></span> Edit Post</h4>
                </div>
                <div class="card-body">
                    <div class="form">
                        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                    placeholder="Title" autocomplete="off" value="{{ $post->title }}">
                                @if($errors->has('title'))
                                    <small class="text-danger">{{ $errors->first('title') }}</small><br>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <textarea name="content" cols="10" rows="4" 
                                    placeholder="Write your idea and sharing ..." class="form-control @error('content') is-invalid @enderror">{{ $post->content }}</textarea>
                                @if($errors->has('title'))
                                    <small class="text-danger">{{ $errors->first('title') }}</small><br>
                                @endif
                            </div>

                            @if ($post->image)
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid img-thumbnail">
                                </div>
                            @endif
    
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Image Content</label>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <input type="text" name="link" class="form-control" placeholder="Link or source" 
                                    autocomplete="off" value="{{ $post->link }}">
                            </div>
    
                            <div class="form-group text-center">
                                <button type="submit" name="status" value="Publish" class="btn px-4 btn-primary">Publish</button>
                                <button type="submit" name="status" value="Draft" class="btn px-4 btn-secondary">Draft</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection