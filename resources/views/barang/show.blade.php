<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Barang</title>
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
        <h5>Nama Barang: {{ $barang->nama }}</h5>
        <h5> Category: {{ $barang->category->title }}</h5>
        <h5>Description Barang: {{ $barang->description }}</h5>
        <h5>Jumlah Barang: {{ $barang->jumlah }}</h5>

        <div class="mt-6">
            <a href="{{ route('barang.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Kembali ke
                Barang</a>
        </div>
    </div>

</body>

</html>
