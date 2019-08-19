@extends('layouts.dashboard')

@section('title', 'Post')

@section('content')
<div class="container mt-4 p-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4>
                        <span class="highlight"><i class="far fa-newspaper mr-3"></i></span> 
                        Community Post
                    </h4>
                </div>
                <div class="card-body">
                    @foreach ($posts as $post)
                         @if ($post->status == 'Publish')
                            <div class="container border rounded-lg p-3 mb-3">
                                <div class="row">
                                    <div class="col inline-item-center">
                                        <img src="{{ asset('storage/' . $post->user->profile->avatar) }}" class="avatar">
                                        <p class="text-muted">{{ $post->created_by }}</p>
                                    </div>
                                    <div class="col text-right">
                                        <p class="text-muted">{{ $post->created_at->diffInHours(now()) . ' hours ago' }}</p>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    @if ($post->image)
                                        <div class="col text-center">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-lg">
                                        </div>
                                    @endif
                                    <div class="col">
                                        <h4><strong>{{ $post->title }}</strong></h4>
                                        <p class="mt-2">{{ $post->content }}</p>
                                        @if ($post->link)
                                            <a href="http://{{ $post->link }}" target="blink"><button class="btn btn-primary mt-4">Visit Link</button></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if(session('status'))
                <div class="alert alert-success mb-2">{{ session('status') }}</div>
            @endif
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight"><i class="fas fa-edit mr-3"></i></span> Write Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" autocomplete="off">
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
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Image Content</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="link" class="form-control" placeholder="Link or source" autocomplete="off">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="status" value="Publish" class="btn px-4 btn-primary">Publish</button>
                            <button type="submit" name="status" value="Draft" class="btn px-4 btn-secondary">Draft</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 mt-4 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight">Published</span> Post</h4>
                </div>
                <div class="card-body">
                    @foreach($posts as $post)
                        @if ($post->user_id == auth()->user()->id && $post->status == 'Publish')
                            <div class="py-2 inline-content-between">
                                <p><strong>{{ $post->title }}</strong> <small class="text-muted ml-2">{{ $post->created_at->format('d/m/y') }}</small></p>
                                <span>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                                        <button class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </a>
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card border-0 mt-4 shadow-sm">
                <div class="card-header bg-white">
                    <h4><span class="highlight">Draft</span> Post</h4>
                </div>
                <div class="card-body">
                    @foreach($posts as $post)
                        @if ($post->user_id == auth()->user()->id && $post->status == 'Draft')
                            <div class="py-2 inline-content-between">
                                <p><strong>{{ $post->title }}</strong> <small class="text-muted ml-2">{{ $post->created_at->format('d/m/y') }}</small></p>
                                <span>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                                        <button class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </a>
                                </span>
                            </div>
                        @endif
                    @endforeach
                    {{-- Filtering wheter post is exactly have Draft status --}}
                    @if(count($posts->filter(function($post){ return $post->status == 'Draft'; })) == 0)
                        <em>No Post in Draft</em>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection