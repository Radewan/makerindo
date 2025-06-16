<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>

<body>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>

        <button type="submit">Buat Category</button>
    </form>
    <h6>{{ session('errors') }}</h6>
    <a href="{{ route('category.index') }}">Back</a>


</body>

</html>
