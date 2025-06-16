<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <div class="text-lg font-bold text-blue-600">
            Storage
        </div>

        <div class="space-x-4">
            <a href="{{ route('category.index') }}" class="text-gray-700 hover:text-blue-600">Category</a>
            <a href="{{ route('barang.index') }}" class="text-gray-700 hover:text-blue-600">Barang</a>
        </div>

        <form action="{{ route('logout.post') }}" method="POST" class="ml-4">
            @csrf
            <button type="submit"
                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">
                Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Daftar Category</h2>
            <a href="{{ route('category.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                + Buat Category
            </a>
        </div>

        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2">Nama Category</th>
                    <th class="text-left px-4 py-2">Show</th>
                    <th class="text-left px-4 py-2">Edit</th>
                    <th class="text-left px-4 py-2">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $item->title }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('category.show', $item->id) }}"
                                class="text-blue-600 hover:underline">Show</a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('category.edit', $item->id) }}"
                                class="text-yellow-600 hover:underline">Edit</a>
                        </td>
                        <td class="px-4 py-2">
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('index') }}" class="text-sm text-blue-600 hover:underline">&larr; Kembali ke Dashboard</a>
        </div>
    </div>

</body>

</html>
