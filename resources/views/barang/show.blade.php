<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Barang</title>
</head>

<body>
    <h5>Nama Barang: {{ $barang->nama }}</h5>
    <h5> Category: {{ $barang->category->title }}</h5>
    <h5>Description Barang: {{ $barang->description }}</h5>
    <h5>Jumlah Barang: {{ $barang->jumlah }}</h5>
    <a href="{{ route('barang.index') }}">Back</a>

</body>

</html>
