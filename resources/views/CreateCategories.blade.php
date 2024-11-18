<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>

    <form method="post" action="{{ route('store_category') }}">
        @csrf
        <input name="name" type="text">
        <label>Add Categories</label>

        <button type="submit">Add</button>
    </form>
</body>

</html>