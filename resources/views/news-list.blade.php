<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 auto;
            width: 80%;
        }

        .card {
            width: 25%;
            margin-bottom: 20px;
        }

        .card-text {
            overflow: hidden;
        }

        .card-text span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
        }
    </style>
    <title>News List</title>
</head>

<body>

    <h1>All News</h1>

    <div class="news-container">
        @foreach ($posts as $post)
            <div class="card">
                <img class="card-img-top" src="{{ asset($post->image) }}" alt="Post Image">
                <div class="card-body">
                    <h3>{{$post->image_path}}</h3>
                    <h6>Category: {{$post->category->name}} <br>
                    </h6>
                    <h5 class="card-title">title: {{$post->title}}
                    </h5>

                    <a href="{{ route('update-post', ['id' => $post->id]) }}" class="btn btn-primary">Update</a>
                    <a href="{{ route('delete-post', ['id' => $post->id]) }}" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                    <a href="{{ route('view-post', ['id' => $post->id]) }}" class="btn btn-primary">View</a>
                </div>
                <a href="{{ route('like-post', ['id' => $post->id]) }}" class="fa fa-thumbs-up">Like</a>

                Likes:{{ $post->likes }}</sp>

                <span>Views:{{ $post->views }}</span>
                <span>Status:{{ $post->status }}</span>

                <a href="{{ route('active-post', ['id' => $post->id]) }}" class="btn btn-success">Acitve</a>
                <br>
                <a href="{{ route('inactive-post', ['id' => $post->id]) }}" class="btn btn-success">Inactive</a>



            </div>
        @endforeach
    </div>


</body>

</html>