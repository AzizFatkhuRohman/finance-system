<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    protected $chartOfAccount;
    public function __construct(ChartOfAccount $chartOfAccount){
        $this->chartOfAccount=$chartOfAccount;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_akun');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_akun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_account'=>'required|digits:8',
            'description'=>'required|max:500',
            'nature'=>'required|max:500'
        ],[
            'no_account.required'=>'No akun wajib di isi',
            'no_account.digits'=>'No akun wajib 8 digit',
            'description.required'=>'Deskripsi wajib isi',
            'description.max'=>'Deskripsi maksimum 500 karakter',
            'nature.required'=>'Nature wajib di isi',
            'nature.max'=>'Nature maksimum 500 karakter'
        ]);
        $this->chartOfAccount->Store([
            'no_account'=>$request->no_account,
            'description'=>$request->description,
            'nature'=>$request->nature
        ]);
        return redirect()->back()->with('success','Data berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.data_akun',[
            'data'=>$this->chartOfAccount->Show($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChartOfAccount $chartOfAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_account'=>'required|digits:8',
            'description'=>'required|max:500',
            'nature'=>'required|max:500'
        ],[
            'no_account.required'=>'No akun wajib di isi',
            'no_account.digits'=>'No akun wajib 8 digit',
            'description.required'=>'Deskripsi wajib isi',
            'description.max'=>'Deskripsi maksimum 500 karakter',
            'nature.required'=>'Nature wajib di isi',
            'nature.max'=>'Nature maksimum 500 karakter'
        ]);
        $this->chartOfAccount->Edit($id,[
            'no_account'=>$request->no_account,
            'description'=>$request->description,
            'nature'=>$request->nature
        ]);
        return redirect()->back()->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->chartOfAccount->Trash($id);
        return redirect()->back()->with('success','Data berhasil di hapus');
    }
}
