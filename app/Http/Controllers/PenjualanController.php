<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\Customer;
use App\Models\DetailProdukPenjualan;
use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    protected $penjualan;
    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }

    public function index()
    {
        return view('admin.penjualan', [
            'data' => $this->penjualan->Index(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_penjualan', [
            'customer' => Customer::all(),
            'kode_akun' => ChartOfAccount::all(),
            'produk' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_customer' => 'required|exists:customers,id', // Pastikan customer ada di database
            'tgl' => 'required|date',
            'kode_akun.*' => 'required|exists:chart_of_accounts,no_account',
            'produk.*' => 'required|exists:products,kode_produk',
            'quantity.*' => 'required|integer|min:1',
            'harga.*' => 'required|numeric|min:1',
            'pajak' => 'required|numeric',
            'diskon' => 'required|numeric'
        ], [
            'nama_customer.required' => 'Nama customer harus diisi.',
            'nama_customer.exists' => 'Nama customer tidak ditemukan.',
            'tgl.required' => 'Tanggal harus diisi.',
            'tgl.date' => 'Tanggal yang dimasukkan tidak valid.',
            'kode_akun.*.required' => 'Kode akun harus dipilih.',
            'kode_akun.*.exists' => 'Kode akun yang dipilih tidak valid.',
            'produk.*.required' => 'Produk harus dipilih.',
            'produk.*.exists' => 'Produk yang dipilih tidak valid.',
            'quantity.*.required' => 'Jumlah produk harus diisi.',
            'quantity.*.integer' => 'Jumlah produk harus berupa angka.',
            'quantity.*.min' => 'Jumlah produk minimal 1.',
            'harga.*.required' => 'Harga produk harus diisi.',
            'harga.*.numeric' => 'Harga produk harus berupa angka.',
            'harga.*.min' => 'Harga produk minimal 1.',
            'pajak.required' => 'Pajak harus diisi',
            'pajak.numeric' => 'Pajak harus berupa angka',
            'diskon.required' => 'Diskon harus diisi',
            'diskon.numeric' => 'Diskon harus berupa angka',
        ]);
        $customerId = $request->input('nama_customer');
        $kodeTransaksi = $request->input('kode_transaksi');
        $tglTransaksi = $request->input('tgl');
        $alamat = $request->input('alamat');
        $pajak = $request->input('pajak', 0);  // Pajak default 0 jika kosong
        $diskon = $request->input('diskon', 0); // Diskon default 0 jika kosong

        $kodeAkun = $request->input('kode_akun');
        $produk = $request->input('produk');
        $quantity = $request->input('quantity');
        $harga = $request->input('harga');

        // Menghitung total harga
        $totalHarga = 0;
        foreach ($quantity as $index => $qty) {
            $subtotal = $qty * $harga[$index];
            $totalHarga += $subtotal;
        }

        // Menghitung pajak dan diskon
        $totalPajak = ($totalHarga * $pajak) / 100;
        $totalDiskon = ($totalHarga * $diskon) / 100;

        // Menghitung total akhir setelah pajak dan diskon
        $totalAkhir = $totalHarga + $totalPajak - $totalDiskon;

        // Menyimpan data penjualan ke dalam database
        $penjualan = $this->penjualan->Store([
            'customer_id' => $customerId,
            'user_id' => Auth::user()->id,
            'kode_transaksi' => $kodeTransaksi,
            'status' => 'draft', // Anda bisa menyesuaikan status
            'tgl_transaksi' => $tglTransaksi,
            'pajak' => $totalPajak,
            'diskon' => $totalDiskon,
            'total_harga' => $totalAkhir,
        ]);

        // Menyimpan detail produk untuk penjualan
        foreach ($produk as $index => $prod) {
            DetailProdukPenjualan::create([
                'penjualan_id' => $penjualan->id, // Mengaitkan dengan penjualan yang baru saja disimpan
                'chart_of_account_id' => $kodeAkun[$index], // Pastikan ini sesuai dengan input chart_of_account
                'product_id' => $prod, // ID produk
                'qty' => $quantity[$index], // Kuantitas produk
                'total_harga' => $quantity[$index] * $harga[$index], // Menghitung total harga produk (quantity * harga)
            ]);
        }
        return redirect('penjualan')->with('success', 'Penjualan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
    public function quotation()
    {
        return view('admin.quotation');
    }
}
