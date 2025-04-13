<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\Customer;
use App\Models\DetailProdukPenjualan;
use App\Models\Penjualan;
use App\Models\Product;
use Carbon\Carbon;
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
            'data' => Penjualan::with('customer', 'user')->whereIn('status', ['draft','created'])->latest()->get(),
            'pengiriman' => Penjualan::with('customer', 'user')->whereIn('status', ['created','send'])->latest()->get(),
            'faktur' => Penjualan::with('customer', 'user')->whereIn('status', ['paid', 'send'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $monthYear = Carbon::now()->format('Y/m');

        // Cari transaksi terakhir yang dibuat pada bulan dan tahun yang sama
        $lastTransaction = Penjualan::whereDate('tgl_transaksi', 'like', Carbon::now()->format('Y-m') . '%')
            ->orderBy('tgl_transaksi', 'desc')
            ->first();

        // Tentukan nomor urut berdasarkan transaksi terakhir
        $lastNumber = 1; // Default jika tidak ada transaksi bulan ini

        if ($lastTransaction) {
            // Ambil nomor urut dari kode_transaksi terakhir dan extract nomor urutnya
            preg_match('/(\d{4})$/', $lastTransaction->kode_transaksi, $matches);
            if (isset($matches[1])) {
                $lastNumber = (int) $matches[1] + 1; // Increment nomor urut
            }
        }

        // Buat kode transaksi dengan format TR-Y/m/nomor_urut
        $kodeTransaksi = 'TR-' . $monthYear . '/' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
        return view('admin.form_penjualan', [
            'customer' => Customer::all(),
            'kode_akun' => ChartOfAccount::all(),
            'produk' => Product::all(),
            'kodeTransaksi' => $kodeTransaksi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|exists:customers,id',
            'tgl' => 'required|date',
            'pajak' => 'nullable|numeric',
            'diskon' => 'nullable|numeric',
            'produk' => 'required|array',
            'produk.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|numeric',
            'kode_akun' => 'required|array',
            'kode_akun.*' => 'required|exists:chart_of_accounts,id',
        ], [
            'nama_customer.required' => 'Nama Customer harus dipilih.',
            'tgl.required' => 'Tanggal Transaksi harus diisi.',
            'produk.required' => 'Produk harus dipilih.',
            'produk.*.required' => 'Setiap produk harus dipilih.',
            'produk.*.exists' => 'Produk yang dipilih tidak ditemukan.',
            'quantity.required' => 'Quantity produk harus diisi.',
            'quantity.*.required' => 'Quantity setiap produk harus diisi.',
            'quantity.*.numeric' => 'Quantity harus berupa angka.',
            'kode_akun.required' => 'Kode Akun harus dipilih.',
            'kode_akun.*.required' => 'Kode Akun setiap produk harus dipilih.',
            'kode_akun.*.exists' => 'Kode Akun yang dipilih tidak ditemukan.',
        ]);
        foreach ($request->produk as $key => $produkId) {
            $product = Product::find($produkId);
            $quantity = $request->quantity[$key];
            if ($quantity > $product->stok) {
                return back()->withErrors(['quantity' => "Quantity untuk produk {$product->nama_produk} tidak boleh melebihi stok {$product->stok}."]);
            }
        }
        $penjualan = $this->penjualan->Store([
            'customer_id' => $request->nama_customer,
            'user_id' => Auth::user()->id,
            'kode_transaksi' => $request->kode_transaksi,
            'tgl_transaksi' => $request->tgl,
            'pajak' => $request->pajak,
            'diskon' => $request->diskon,
            'total_harga' => $request->total
        ]);
        foreach ($request->produk as $key => $produkId) {
            $product = Product::find($produkId);
            $quantity = $request->quantity[$key];
            $totalHarga = $request->total_harga[$key]; // Total harga per produk, bisa dihitung sesuai dengan harga * quantity

            // Menyimpan detail produk penjualan
            DetailProdukPenjualan::create([
                'penjualan_id' => $penjualan->id, // ID penjualan yang baru saja disimpan
                'chart_of_account_id' => $request->kode_akun[$key], // ID kode akun
                'product_id' => $produkId, // ID produk yang dijual
                'qty' => $quantity, // Quantity yang dijual
                'total_harga' => $totalHarga, // Total harga produk (harga * quantity)
            ]);

            // Update stok produk jika diperlukan
            $product->stok -= $quantity;
            $product->save();
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
    public function destroy(Penjualan $penjualan) {}
    public function spk($id)
    {
        return view('admin.form_spk',[
            'data'=>Penjualan::with('customer')->find($id),
            'customer'=>Customer::all(),
            'kode_akun' => ChartOfAccount::all(),
            'produk' => Product::all(),
            'DetailProdukPenjualan'=>DetailProdukPenjualan::with('chartOfAccount','product')->where('penjualan_id',$id)->get()
        ]);
    }
    public function pengiriman($id){
        return view('admin.form_pengiriman',[
            'data'=>Penjualan::with('customer')->find($id),
            'customer'=>Customer::all(),
            'kode_akun' => ChartOfAccount::all(),
            'produk' => Product::all(),
            'DetailProdukPenjualan'=>DetailProdukPenjualan::with('chartOfAccount','product')->where('penjualan_id',$id)->get()
        ]);
    }
    public function faktur($id){
        return view('admin.form_faktur',[
            'data'=>Penjualan::with('customer')->find($id),
            'customer'=>Customer::all(),
            'kode_akun' => ChartOfAccount::all(),
            'produk' => Product::all(),
            'DetailProdukPenjualan'=>DetailProdukPenjualan::with('chartOfAccount','product')->where('penjualan_id',$id)->get()
        ]);
    }
    public function quotation()
    {
        return view('admin.quotation');
    }
}
