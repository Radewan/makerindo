<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Barang</title>
</head>

<body>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <br>
        <label for="category">Category</label>
        <select id="category" name="category">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah">

        <button type="submit">Buat Barang</button>
    </form>
    <h6>{{ session('errors') }}</h6>
    <a href="{{ route('barang.index') }}">Back</a>


</body>

</html>
