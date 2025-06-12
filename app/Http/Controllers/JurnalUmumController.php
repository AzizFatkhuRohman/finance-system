<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    protected $jurnalUmum;
    public function __construct(JurnalUmum $jurnalUmum)
    {
        $this->jurnalUmum = $jurnalUmum;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request) {
            $data = JurnalUmum::when($request->start, function ($query, $start) {
                return $query->whereDate('tgl', '>=', $start);
            })
                ->when($request->finish, function ($query, $finish) {
                    return $query->whereDate('tgl', '<=', $finish);
                })
                ->when($request->no_account, function ($query, $no_account) {
                    return $query->where('no_account', $no_account);
                })
                ->get();
        } else {
            $data = $this->jurnalUmum->Index();
        }

        return view('admin.jurnal', [
            'data' => $data,
            'coa' => ChartOfAccount::all()
        ]);
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
    public function show(JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JurnalUmum $jurnalUmum)
    {
        //
    }
}
