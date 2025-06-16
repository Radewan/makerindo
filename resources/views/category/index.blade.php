<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    <a href="{{ route('category.create') }}">Buat Category</a>
    <br>
    <table>
        <tr>
            <th>Nama Category</th>
            <th>Show Category</th>
            <th>Edit Category</th>
            <th>Hapus Category</th>
        </tr>
        @foreach ($category as $item)
            <tr>
                <td> {{ $item->title }} </td>
                <td> <a href="{{ route('category.show', $item->id) }}">Show</a> </td>
                <td> <a href="{{ route('category.edit', $item->id) }}">Edit</a> </td>
                <td>
                    <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('index') }}">Back</a>
</body>

</html>
