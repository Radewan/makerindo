<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('barang.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'nama' => 'required',
            'description' => 'required|min:8',
            'jumlah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $barang = new Barang();
        $barang->user_id = $request->user()->id;
        $barang->category_id = $request->category;
        $barang->nama = $request->nama;
        $barang->description = $request->description;
        $barang->jumlah = $request->jumlah;
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::where('id', $id)->first();
        if (!$barang) {
            return redirect()->route('barang.index');
        }
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::where('id', $id)->first();
        if (!$barang) {
            return redirect()->route('barang.index');
        }
        $categories = Category::all();

        return view('barang.edit', compact('barang', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'nama' => 'required',
            'description' => 'required|min:8',
            'jumlah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $barang = Barang::where('id', $id)->first();
        if (!$barang) {
            return redirect()->route('barang.index');
        }
        $barang->user_id = $request->user()->id;
        $barang->category_id = $request->category;
        $barang->nama = $request->nama;
        $barang->description = $request->description;
        $barang->jumlah = $request->jumlah;
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::where('id', $id)->first();
        if (!$barang) {
            return redirect()->route('barang.index');
        }
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
