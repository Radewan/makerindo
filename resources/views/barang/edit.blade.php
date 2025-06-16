<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
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
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ $barang->nama }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>

            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="description" id="description" value="{{ $barang->description }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required value="{{ $barang->jumlah }}">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200 mt-3">
                Edit Barang
            </button>
        </form>


        <a href="{{ route('barang.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Kembali
            ke
            Barang</a>
    </div>
    </div>

</body>

</html>
