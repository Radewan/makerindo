<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Title</title>
</head>

<body>
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $category->title }}">
        <br>
        <button type="submit">Edit Title</button>

    </form>
    <h6>{{ session('errors') }}</h6>
    <a href="{{ route('category.index') }}">Back</a>
</body>

</html>
