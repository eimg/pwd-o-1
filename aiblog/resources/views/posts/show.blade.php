@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Post Content -->
            <article class="mb-5">
                <header class="mb-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h1 class="display-5 fw-bold">{{ $post->title }}</h1>
                            <div class="d-flex align-items-center text-muted mb-3">
                                <span class="me-3">
                                    <a href="{{ route('posts.category', $post->category) }}" class="text-decoration-none">
                                        {{ $post->category->name }}
                                    </a>
                                </span>
                                <span class="me-3">by {{ $post->user->name }}</span>
                                <span>{{ $post->created_at->format('F j, Y') }}</span>
                            </div>
                        </div>
                        @can('update', $post)
                            <div class="btn-group">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                                    Delete
                                </button>
                            </div>
                        @endcan
                    </div>
                </header>

                <div class="mb-4">
                    <img src="{{ $post->featured_image }}" class="img-fluid rounded" alt="{{ $post->title }}">
                </div>

                <div class="post-content">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </article>

            <!-- Navigation -->
            <div class="d-flex justify-content-between mb-5">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Posts
                </a>
                <a href="{{ route('posts.category', $post->category) }}" class="btn btn-outline-primary">
                    More in {{ $post->category->name }}
                </a>
            </div>

            <!-- Comments Section -->
            <section class="comments-section">
                <h3 class="mb-4">Comments ({{ $post->comments->count() }})</h3>

                @if($post->comments->count() > 0)
                    <div class="comments">
                        @foreach($post->comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-1">{{ $comment->user->name }}</h6>
                                        <div class="d-flex align-items-center">
                                            <small class="text-muted me-2">{{ $comment->created_at->format('M j, Y \a\t g:i A') }}</small>
                                            @can('delete', $comment)
                                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                            onclick="return confirm('Are you sure you want to delete this comment?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <p class="card-text">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-muted">No comments yet. Be the first to comment!</p>
                    </div>
                @endif

                @auth
                <!-- Comment Form for authenticated users -->
                <div class="comment-form mt-4">
                    <h4 class="mb-3">Leave a Comment</h4>
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Comment *</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
                @else
                <div class="text-center py-4">
                    <p class="text-muted">
                        <a href="{{ route('login') }}" class="text-decoration-none">Login</a> to post a comment.
                    </p>
                </div>
                @endauth
            </section>
        </div>
    </div>
</div>

<!-- Delete Post Modal -->
@can('delete', $post)
<div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post? This action cannot be undone.</p>
                <p><strong>{{ $post->title }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection 