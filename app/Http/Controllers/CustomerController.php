<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_customer', [
            'data' => $this->customer->Index(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_customer', [
            'provinsi' => Province::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|unique:customers|max:255',
            // 'akronim' => 'required|max:20',
            'email' => 'required|unique:customers|max:50',
            'alamat' => 'required|max:255',
            // 'province'=>'required',
            // 'regency'=>'required',
            // 'district'=>'required',
            // 'village'=>'required',
            // 'kode_pos'=>'nullable|digits:5',
            'nomor_rekening' => 'required|max:30',
            'nama_bank' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'cabang' => 'required|max:255',
            'npwp' => 'required|digits:16'
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib di isi',
            'nama_perusahaan.unique' => 'Nama perusahaan sudah digunakan',
            'nama_perusahaan.max' => 'Nama perusahaan maksimum 255 karakter',
            // 'akronim.required' => 'Akronim wajib di isi',
            // 'akronim.max' => 'Akronim maksimum 20 karakter',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email sudah digunakan',
            'email.max' => 'Email maksimum 50 karakter',
            'alamat.required' => 'Alamat wajib di isi',
            'alamat.max' => 'Alamat maksimum 255 karakter',
            // 'province.required'=>'Provinsi wajib di isi',
            // 'regency.required'=>'Kabupaten wajib di isi',
            // 'district.required'=>'Kecamatan wajib di isi',
            // 'village.required'=>'Desa wajib di isi',
            // 'kode_pos.digits'=>'kode pos wajib 5 digit',
            'nomor_rekening.required' => 'Nomor rekening wajib di isi',
            'nomor_rekening.max' => 'Nomor rekening maksimum 30 karakter',
            'nama_bank' => 'Nama bank wajib di isi',
            'nama_bank.max' => 'Nama bank maksimum 255 karakter',
            'nama_pemilik.required' => 'Nama pemilik wajib di isi',
            'nama_pemilik.max' => 'Nama pemilik maksimum 255 karakter',
            'cabang.required' => 'Cabang bank wajib di isi',
            'cabang.max' => 'Cabang maksimum 255 karakter',
            'npwp.required' => 'NPWP wajib di isi',
            'npwp.digits' => "NPWP wajib 16 karakter"
        ]);
        $tahun = date('Y');
        $nama = strtoupper($request->nama_perusahaan);
        $huruf_depan = substr($nama, 0, 1);
        $customerCount = Customer::whereYear('created_at', $tahun)->count();
        $nomor_urut = $customerCount + 1;
        $code = "CD" . $huruf_depan . $tahun . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        $this->customer->Store([
            'nama_perusahaan' => $request->nama_perusahaan,
            // 'akronim' => $request->akronim,
            'code_customer' => $code,
            'email' => $request->email,
            'alamat' => $request->alamat,
            // 'province_id'=>$request->province,
            // 'regency_id'=>$request->regency,
            // 'district_id'=>$request->district,
            // 'village_id'=>$request->village,
            // 'kode_pos'=>$request->kode_pos,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'cabang' => $request->cabang,
            'npwp' => $request->npwp
        ]);
        return redirect('customer')->with('success', 'Data berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.edit_customer', [
            'data' => $this->customer->Show($id),
            'provinsi' => Province::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            // 'akronim' => 'required|max:20',
            'email' => 'required|max:50',
            'alamat' => 'required|max:255',
            // 'province'=>'required',
            // 'regency'=>'required',
            // 'district'=>'required',
            // 'village'=>'required',
            // 'kode_pos'=>'nullable|digits:5',
            'nomor_rekening' => 'required|max:30',
            'nama_bank' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'cabang' => 'required|max:255',
            'npwp' => 'required|digits:16'
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib di isi',
            'nama_perusahaan.unique' => 'Nama perusahaan sudah digunakan',
            'nama_perusahaan.max' => 'Nama perusahaan maksimum 255 karakter',
            // 'akronim.required' => 'Akronim wajib di isi',
            // 'akronim.max' => 'Akronim maksimum 20 karakter',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email sudah digunakan',
            'email.max' => 'Email maksimum 50 karakter',
            'alamat.required' => 'Alamat wajib di isi',
            'alamat.max' => 'Alamat maksimum 255 karakter',
            // 'province.required'=>'Provinsi wajib di isi',
            // 'regency.required'=>'Kabupaten wajib di isi',
            // 'district.required'=>'Kecamatan wajib di isi',
            // 'village.required'=>'Desa wajib di isi',
            // 'kode_pos.digits'=>'kode pos wajib 5 digit',
            'nomor_rekening.required' => 'Nomor rekening wajib di isi',
            'nomor_rekening.max' => 'Nomor rekening maksimum 30 karakter',
            'nama_bank' => 'Nama bank wajib di isi',
            'nama_bank.max' => 'Nama bank maksimum 255 karakter',
            'nama_pemilik.required' => 'Nama pemilik wajib di isi',
            'nama_pemilik.max' => 'Nama pemilik maksimum 255 karakter',
            'cabang.required' => 'Cabang bank wajib di isi',
            'cabang.max' => 'Cabang maksimum 255 karakter',
            'npwp.required' => 'NPWP wajib di isi',
            'npwp.digits' => "NPWP wajib 16 karakter"
        ]);
        $this->customer->Edit($id, [
            'nama_perusahaan' => $request->nama_perusahaan,
            // 'akronim' => $request->akronim,
            'email' => $request->email,
            'alamat' => $request->alamat,
            // 'province_id'=>$request->province,
            // 'regency_id'=>$request->regency,
            // 'district_id'=>$request->district,
            // 'village_id'=>$request->village,
            // 'kode_pos'=>$request->kode_pos,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'cabang' => $request->cabang,
            'npwp' => $request->npwp
        ]);
        return redirect('customer')->with('success', 'Data berhasil di buat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->customer->Trash($id);
        return redirect('customer')->with('success', 'Data berhasil di buat');
    }

    public function araging()
    {
        return view('admin.araging');
    }
    public function getAlamat($id)
    {
        // Ambil customer berdasarkan id
        $customer = Customer::find($id);

        // Jika customer ditemukan, return alamat
        if ($customer) {
            return response()->json(['alamat' => $customer->alamat]);
        }

        // Jika customer tidak ditemukan, return response error
        return response()->json(['error' => 'Customer tidak ditemukan'], 404);
    }
}
