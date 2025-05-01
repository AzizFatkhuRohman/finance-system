<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\ChartOfAccount;
use App\Models\DetailBiaya;
use App\Models\FileBiaya;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiayaController extends Controller
{
    protected $biaya;
    public function __construct(Biaya $biaya)
    {
        $this->biaya = $biaya;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.biaya',[
            'pending'=>Biaya::with('supplier')->where('status','pending')->latest()->get(),
            'paid'=>Biaya::with('supplier')->where('status','paid')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $monthYear = Carbon::now()->format('Y/m');

        // Cari transaksi terakhir yang dibuat pada bulan dan tahun yang sama
        $lastTransaction = Biaya::whereDate('tgl_transaksi', 'like', Carbon::now()->format('Y-m') . '%')
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
        $kodeTransaksi = 'EX-' . $monthYear . '/' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
        return view('admin.form_biaya', [
            'supplier' => Supplier::all(),
            'kode_akun' => ChartOfAccount::all(),
            'kodeTransaksi' => $kodeTransaksi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|exists:suppliers,id',
            'tgl' => 'required|date',
            // 'pajak' => 'nullable|numeric',
            // 'diskon' => 'nullable|numeric',
            'produk' => 'required|array',
            'produk.*' => 'required',
            'quantity' => 'required|array',
            'quantity.*' => 'required|numeric',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric',
            'kode_akun' => 'required|array',
            'kode_akun.*' => 'required|exists:chart_of_accounts,id',
            'file' => 'nullable|array',
            'file.*' => 'nullable|file|max:3072'
        ], [
            'nama_supplier.required' => 'Nama supplier harus dipilih.',
            'tgl.required' => 'Tanggal Transaksi harus diisi.',
            'produk.required' => 'Produk harus dipilih.',
            'produk.*.required' => 'Setiap item harus dipilih.',
            'quantity.required' => 'Quantity item harus diisi.',
            'quantity.*.required' => 'Quantity setiap item harus diisi.',
            'quantity.*.numeric' => 'Quantity harus berupa angka.',
            'harga.*.required' => 'Harga setiap item harus diisi.',
            'harga.*.numeric' => 'Harga harus berupa angka.',
            'kode_akun.required' => 'Kode Akun harus dipilih.',
            'kode_akun.*.required' => 'Kode Akun setiap produk harus dipilih.',
            'kode_akun.*.exists' => 'Kode Akun yang dipilih tidak ditemukan.',
            'file.*.file' => 'Setiap lampiran harus berupa file.',
            'file.*.max' => 'Ukuran maksimal tiap file adalah 3 MB.'
        ]);
        $biaya = $this->biaya->Store([
            'supplier_id' => $request->nama_supplier,
            'user_id' => Auth::user()->id,
            'kode_transaksi' => $request->kode_transaksi,
            'tgl_transaksi' => $request->tgl,
            // 'pajak' => $request->pajak,
            // 'diskon' => $request->diskon,
            'total_harga' => $request->total
        ]);
        foreach ($request->produk as $index => $value) {
            DetailBiaya::create([
                'biaya_id' => $biaya->id,
                'chart_of_account_id' => $request->kode_akun[$index],
                'item_biaya' => $value,
                'qty' => $request->quantity[$index],
                'harga' => $request->harga[$index],
                'total_harga' => $request->total_harga[$index],
            ]);
        }        
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile) {
                $originalName = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
                $uploadedFile->move(public_path('upload_biaya'), $originalName);
                FileBiaya::create([
                    'biaya_id' =>  $biaya->id,
                    'nama_file' => $originalName,
                ]);
            }
        }
        return redirect('biaya')->with('success', 'Biaya berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.edit-biaya',[
            'supplier' => Supplier::all(),
            'kode_akun' => ChartOfAccount::all(),
            'data'=>Biaya::with('supplier')->find($id),
            'fileUpload'=>FileBiaya::where('biaya_id',$id)->get(),
            'detailBiaya'=>DetailBiaya::with('chartOfAccount')->where('biaya_id',$id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biaya $biaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biaya $biaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biaya $biaya)
    {
        //
    }

    public function pembayaran()
    {
        return view('admin.form_pembayaran_biaya');
    }
}
