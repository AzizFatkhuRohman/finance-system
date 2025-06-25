<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\ChartOfAccount;
use App\Models\DetailBiaya;
use App\Models\FileBiaya;
use App\Models\JurnalUmum;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BiayaController extends Controller
{
    protected $biaya;
    protected $jurnalumum;
    public function __construct(Biaya $biaya, JurnalUmum $jurnalUmum)
    {
        $this->biaya = $biaya;
        $this->jurnalumum = $jurnalUmum;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.biaya', [
            'pending' => Biaya::with('supplier')->where('status', 'pending')->latest()->get(),
            'paid' => Biaya::with('supplier')->where('status', 'paid')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $monthYear = Carbon::now()->format('Y/m');

        // Cari transaksi terakhir berdasarkan pola kode transaksi
        $lastTransaction = Biaya::where('kode_transaksi', 'like', 'EX-' . $monthYear . '/%')
            ->orderBy('kode_transaksi', 'desc')
            ->first();

        // Tentukan nomor urut berdasarkan transaksi terakhir
        $lastNumber = 1; // Default jika tidak ada transaksi bulan ini

        if ($lastTransaction) {
            // Ambil nomor urut dari kode_transaksi terakhir
            preg_match('/(\d{4})$/', $lastTransaction->kode_transaksi, $matches);
            if (isset($matches[1])) {
                $lastNumber = (int) $matches[1] + 1;
            }
        }

        // Buat kode transaksi dengan format EX-Y/m/nomor_urut
        $kodeTransaksi = 'EX-' . $monthYear . '/' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
        return view('admin.form_biaya', [
            'supplier' => Supplier::all(),
            'kode_akun' => ChartOfAccount::whereIn('category_account',[6,7,8,9])->get(),
            'kodeTransaksi' => $kodeTransaksi,
            'sumber_dana'=>ChartOfAccount::where('category_account',1)->get(),
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
            'sumber_dana'=>'required',
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
            'sumber_dana.required'=>'Sumber dana wajib di pilih',
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
            'chart_of_account_id'=>$request->sumber_dana,
            // 'pajak' => $request->pajak,
            // 'diskon' => $request->diskon,
            'total_harga' => $request->total
        ]);
        $supplier = Supplier::findOrFail($biaya->supplier_id);
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
                $randomPrefix = Str::random(5);
                $fileName = $randomPrefix . '_' . $originalName;

                $uploadedFile->move(public_path('upload_biaya'), $fileName);

                FileBiaya::create([
                    'biaya_id' => $biaya->id,
                    'nama_file' => $fileName,
                ]);
            }
        }
        $detailBiaya = DetailBiaya::where('biaya_id',$biaya->id)->first();
        $coa = ChartOfAccount::find($detailBiaya->chart_of_account_id);
        $this->jurnalumum->Store([
            'kategori' => 'biaya',
            'relational_id' => $biaya->id,
            'code_perusahaan'=>$supplier->code_supplier,
            'no_account'=>$coa->no_account,
            'nama' => $supplier->nama_perusahaan,
            'tgl'=>$biaya->tgl_transaksi,
            'debit' => $biaya->total_harga,
            'kredit'=>0
        ]);
        return redirect('biaya')->with('success', 'Biaya berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.edit-biaya', [
            'supplier' => Supplier::all(),
            'kode_akun' => ChartOfAccount::whereIn('category_account',[6,7,8,9])->get(),
            'sumber_dana'=>ChartOfAccount::where('category_account',1)->get(),
            'data' => Biaya::with('supplier','chartOfAccount')->find($id),
            'fileUpload' => FileBiaya::where('biaya_id', $id)->get(),
            'detailBiaya' => DetailBiaya::with('chartOfAccount')->where('biaya_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.edit-biaya-receipt', [
            'supplier' => Supplier::all(),
             'kode_akun' => ChartOfAccount::whereIn('category_account',[6,7,8,9])->get(),
            'data' => Biaya::with('supplier')->find($id),
            'fileUpload' => FileBiaya::where('biaya_id', $id)->get(),
            'detailBiaya' => DetailBiaya::with('chartOfAccount')->where('biaya_id', $id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->action === 'submit') {
            $request->validate([
                'file' => 'nullable|array',
                'file.*' => 'nullable|file|max:3072'
            ], [
                'file.*.file' => 'Setiap lampiran harus berupa file.',
                'file.*.max' => 'Ukuran maksimal tiap file adalah 3 MB.'
            ]);

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $uploadedFile) {
                    $originalName = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
                    $randomPrefix = Str::random(5);
                    $fileName = $randomPrefix . '_' . $originalName;

                    $uploadedFile->move(public_path('upload_biaya'), $fileName);

                    FileBiaya::create([
                        'biaya_id' => $id,
                        'nama_file' => $fileName,
                    ]);
                }
            }
            $biaya = $this->biaya->Edit($id, [
                'status' => 'paid'
            ]);
            $supplier = Supplier::findOrFail($biaya->supplier_id);
            $detailBiaya = DetailBiaya::where('biaya_id',$id)->firts();
            $coa = ChartOfAccount::find($detailBiaya->chart_of_account_id);
            $this->jurnalumum->Edit($biaya->id,[
                'nama' => $supplier->nama_perusahaan,
                'code_perusahaan'=>$supplier->code_supplier,
                'no_account'=>$coa->no_account,
                'debit' => $biaya->total_harga,
                'kredit'=>0
            ]);
            return redirect('biaya')->with('success', 'Biaya berhasil disubmit');
        } else {
            $request->validate([
                'nama_supplier' => 'required|exists:suppliers,id',
                'tgl' => 'required|date',
                'sumber_dana'=>'required',
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
                'sumber_dana.required'=>'Sumber dana wajib di pilih',
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

            $biaya = Biaya::findOrFail($id);

            // Update Biaya
            $biaya->update([
                'supplier_id' => $request->nama_supplier,
                'user_id' => Auth::user()->id,
                'kode_transaksi' => $request->kode_transaksi,
                'tgl_transaksi' => $request->tgl,
                'chart_of_account_id'=>$request->sumber_dana,
                'total_harga' => $request->total
            ]);

            // Hapus DetailBiaya Lama
            DetailBiaya::where('biaya_id', $biaya->id)->delete();

            // Insert DetailBiaya Baru
            foreach ($request->produk as $index => $value) {
                DetailBiaya::create([
                    'biaya_id' => $biaya->id,
                    'chart_of_account_id' => $request->kode_akun[$index],
                    'item_biaya' => $value,
                    'qty' => $request->quantity[$index],
                    'harga' => $request->harga[$index],
                    'total_harga' => $request->quantity[$index] * $request->harga[$index],
                ]);
            }

            // Handle File Uploads
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $uploadedFile) {
                    $originalName = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
                    $randomPrefix = Str::random(5);
                    $fileName = $randomPrefix . '_' . $originalName;
                    $uploadedFile->move(public_path('upload_biaya'), $fileName);

                    FileBiaya::create([
                        'biaya_id' => $biaya->id,
                        'nama_file' => $fileName,
                    ]);
                }
            }

            return redirect('biaya')->with('success', 'Biaya berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->biaya->Trash($id);
            JurnalUmum::where('relational_id', $id)->where('kategori', 'biaya')->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
        }
    }

    public function biaya_receipt($id)
    {
        $this->biaya->Edit($id, [
            'status' => 'pending'
        ]);
    }
    public function pembayaran()
    {
        return view('admin.form_pembayaran_biaya');
    }
}
