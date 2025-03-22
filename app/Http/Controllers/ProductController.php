<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_produk',[
            'data' => $this->product->Index()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_produk' => 'required',
            'nm_produk' => 'required|max:50',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'kd_produk.required' => 'Kode Produk wajib di isi',
            'nm_produk.required' => 'Nama Produk wajib di isi',
            'nm_produk.max' => 'Nama Produk maksimum 50 karakter',
            'satuan.required' => 'Satuan wajib isi',
            'harga.required' => 'Harga wajib di isi',
            'stok.required' => 'Stok wajib di isi'
        ]);
        $this->product->Store([
            'kode_produk' => $request->kd_produk,
            'nama_produk' => $request->nm_produk,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect('produk')->with('success', 'Data berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.edit_produk',[
            'data' => $this->product->Show($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kd_produk' => 'required',
            'nm_produk' => 'required|max:50',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'kd_produk.required' => 'Kode Produk wajib di isi',
            'nm_produk.required' => 'Nama Produk wajib di isi',
            'nm_produk.max' => 'Nama Produk maksimum 50 karakter',
            'satuan.required' => 'Satuan wajib isi',
            'harga.required' => 'Harga wajib di isi',
            'stok.required' => 'Stok wajib di isi'
        ]);
        $this->product->Edit($id,[
            'kode_produk' => $request->kd_produk,
            'nama_produk' => $request->nm_produk,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect('produk')->with('success', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->product->Trash($id);
        return redirect('produk')->with('success','Data berhasil di hapus');
    }
}
