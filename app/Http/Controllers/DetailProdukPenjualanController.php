<?php

namespace App\Http\Controllers;

use App\Models\DetailProdukPenjualan;
use Illuminate\Http\Request;

class DetailProdukPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailProdukPenjualan $detailProdukPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailProdukPenjualan $detailProdukPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailProdukPenjualan $detailProdukPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = DetailProdukPenjualan::findOrFail($id);
        $product = $detail->product;
        $product->stok += $detail->qty;
        $product->save();
        $detail->delete();
    }
}
