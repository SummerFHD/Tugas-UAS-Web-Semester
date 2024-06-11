<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('dashboard.index', compact('products'));
    }

    public function create() {
        return view('dashboard.create');
    }

    public function create_store(Request $request) {
        $request->validate([
            'jenis' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $gambarName = time() . '.' . $gambar->extension();
        $gambar->move(public_path('images'), $gambarName);

        Product::create([
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarName
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('dashboard.edit', compact('product'));
    }

    public function edit_store(Request $request, $id) {
        $request->validate([
            'jenis' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = Product::find($id);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->extension();
            $gambar->move(public_path('images'), $gambarName);
            $product->gambar = $gambarName;
        }

        $product->jenis = $request->jenis;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diubah');
    }

    public function delete($id) {
        $product = Product::find($id);

        $gambarPath = public_path('images') . '/' . $product->gambar;
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        $product->delete();
        return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus');
    }
}
