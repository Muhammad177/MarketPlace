<?php

namespace App\Http\Controllers\shop;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $shops = Shop::with('category')->latest()->paginate(6);
    return view('user.shop.indexshop', compact('shops'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        return view('user.shop.createshop');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        return view('user.shop.showshop', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|min:0',
            'harga_barang' => 'required|numeric|min:0',
            'deskripsi_barang' => 'nullable|string',
            // Validasi unik untuk code_barang tapi kecuali data sendiri
            'code_barang' => 'required|string|max:100|unique:shops,code_barang,' . $shop->id,
        ]);

        $shop->update($validated);

        return redirect()->route('shops.index')->with('success', 'Barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Barang berhasil dihapus.');
    }
}
