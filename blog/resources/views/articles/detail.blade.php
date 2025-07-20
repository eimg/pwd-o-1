@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">
        <div class="card mb-2">
            <div class="card-body border-primary">
                <h4 class="card-title">{{ $article->title }}</h4>
                <div class="text-muted">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p>{{ $article->body }}</p>
                <a href="{{ url("/articles/delete/$article->id") }}"
                    class="btn btn-sm btn-outline-danger">Delete</a>
            </div>
        </div>
    </div>
@endsection