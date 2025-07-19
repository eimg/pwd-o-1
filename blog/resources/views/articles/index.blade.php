<!DOCTYPE html>
<html lang="en">
<head>
    <title>Article List</title>
</head>
<body>
    <h1>Article List</h1>
    <ul>
        @foreach($articles as $article)
            <li>{{ $article['title'] }}</li>
        @endforeach
    </ul>
</body>
</html>
