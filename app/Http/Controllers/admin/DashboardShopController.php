<?php

namespace App\Http\Controllers\admin;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Services\ShopService;
use App\Http\Controllers\Controller;

class DashboardShopController extends Controller
{
    protected $shopService;
        public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index()
    {
         $shops = $this->shopService->getDataDashboard();
         return view('admin.dashboard.shop.index', compact('shops'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|min:0',
            'harga_barang' => 'required|numeric|min:0',
            'deskripsi_barang' => 'nullable|string',
            'code_barang' => 'required|string|max:100|unique:shops,code_barang',
        ]);

        Shop::create($validated);

        return redirect()->route('shops.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
         return view('admin.dashboard.shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
