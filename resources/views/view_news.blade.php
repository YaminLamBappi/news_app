<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
</head>

<body>
    <h1>Title: {{ $post->title }}</h1>
    <img src="{{ asset($post->image) }}" alt="Not found">
    <p>Description: {!! $post->description  !!}</p>

    <h6>{{ $post->like }}</h6>
    <h6>{{ $post->view }}</h6>



</body>

</html>