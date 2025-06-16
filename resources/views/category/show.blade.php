<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Category</title>
</head>

<body>
    <h5> Category: {{ $category->title }}</h5>
    <table>
        <tr>
            <th>Nama Barang</th>
            <th>Category Barang</th>
            <th>Jumlah Barang</th>
            <th>Show Barang</th>
            <th>Edit Barang</th>
            <th>Hapus Barang</th>
        </tr>
        @foreach ($category->barangs as $item)
            <tr>
                <td> {{ $item->nama }} </td>
                <td> {{ $item->category->title }} </td>
                <td> {{ $item->jumlah }} </td>
                <td> <a href="{{ route('barang.show', $item->id) }}">Show</a> </td>
                <td> <a href="{{ route('barang.edit', $item->id) }}">Edit</a> </td>
                <td>
                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('category.index') }}">Back</a>

</body>

</html>
