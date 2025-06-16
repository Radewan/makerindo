<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
</head>

<body>
    <a href="{{ route('category.index') }}">Category</a>
    <br>
    <a href="{{ route('barang.index') }}">Barang</a>
    <br>
    <br>
    <br>
    <form action="{{ route('logout.post') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
