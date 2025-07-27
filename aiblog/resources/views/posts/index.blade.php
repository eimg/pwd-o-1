@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar with Categories -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Categories</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('posts.index') }}" class="text-decoration-none 
                               {{ !isset($category) ? 'fw-bold text-primary' : 'text-dark' }}">
                                All Posts
                            </a>
                        </li>
                        @foreach($categories as $cat)
                            <li class="mb-2">
                                <a href="{{ route('posts.category', $cat) }}" class="text-decoration-none 
                                   {{ isset($category) && $category->id === $cat->id ? 'fw-bold text-primary' : 'text-dark' }}">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>{{ isset($category) ? $category->name : 'Latest Posts' }}</h1>
                <div class="d-flex align-items-center">
                    <span class="text-muted me-3">{{ $posts->total() }} posts</span>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                    @endauth
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($posts->count() > 0)
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="{{ $post->featured_image }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                <a href="{{ route('posts.category', $post->category) }}" class="text-decoration-none">
                                                    {{ $post->category->name }}
                                                </a>
                                            </small>
                                            <small class="text-muted">{{ $post->created_at->format('M j, Y') }}</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-1">
                                            <small class="text-muted">by {{ $post->user->name }}</small>
                                            <div class="btn-group">
                                                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Read More</a>
                                                @can('update', $post)
                                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <h3 class="text-muted">No posts found</h3>
                    <p class="text-muted">There are no posts in this category yet.</p>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create the first post</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 