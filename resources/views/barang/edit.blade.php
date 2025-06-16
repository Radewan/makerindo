<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
</head>

<body>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $barang->nama }}">
        <br>
        <label for="category">Category</label>
        <select id="category" name="category">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        <br>
        <label for="description">Decription</label>
        <input type="text" name="description" id="description" value="{{ $barang->description }}">
        <br>
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" value="{{ $barang->jumlah }}">
        <br>
        <button type="submit">Edit Barang</button>

    </form>
    <h6>{{ session('errors') }}</h6>
    <a href="{{ route('barang.index') }}">Back</a>
</body>

</html>
