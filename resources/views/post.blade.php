<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1>{{ $post->title }}</h1>


        <p>{{ $post->category->name }}</p>

        <div>
            {!! $post->body !!}
        </div>

        <a href="/">Go back</a>
    </article>
</body>