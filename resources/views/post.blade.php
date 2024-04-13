<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1>{{ $post->title }}</h1>


        <p>
            By <a href="#">Rafid Hasan</a> in {{ $post->category->name }}
        </p>

        <div>
            <p>{{ $post->body }}</p>
        </div>

        <a href="/">Go back</a>
    </article>
</body>