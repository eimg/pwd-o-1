@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">
        <div class="card mb-2">
            <div class="card-body border-primary">
                <h4 class="card-title">{{ $article->title }}</h4>
                <div class="text-muted">
                    <b>Category:</b> {{ $article->category->name }},
                    <b>Comments:</b> {{ count($article->comments) }},
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p>{{ $article->body }}</p>
                
                <a href="{{ url("/articles/delete/$article->id") }}"
                    class="btn btn-sm btn-outline-danger">Delete</a>

                <a href="{{ url("/articles/edit/$article->id") }}"
                    class="btn btn-sm btn-outline-secondary">edit</a>
            </div>
        </div>

        <ul class="list-group mt-4">
            <li class="list-group-item active">
                Comments ({{ count($article->comments) }})
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>

                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>
        <form action="{{ url("/comments/add") }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea class="form-control my-2" name="content"></textarea>
            <button class="btn btn-secondary">Add Comment</button>
        </form>
    </div>
@endsection