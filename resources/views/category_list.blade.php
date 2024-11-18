<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>
    <h1>All categories</h1>
    <ol>
        @foreach ($categories as $categorie)

            <li> {{$categorie->name}}
                <a href="{{ route('update_category', ['id' => $categorie->id]) }}">Edit</a>

            </li>
        @endforeach

    </ol>


</body>

</html>