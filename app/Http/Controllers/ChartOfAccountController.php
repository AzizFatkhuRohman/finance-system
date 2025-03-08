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
        return view('coa.index');
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
        $request->validate([
            'no_account'=>'required|digits:8',
            'description'=>'required|max:500',
            'nature'=>'required|max:500'
        ]);
        $this->chartOfAccount->Store([
            
        ])
    }

    /**
     * Display the specified resource.
     */
    public function show(ChartOfAccount $chartOfAccount)
    {
        //
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
    public function update(Request $request, ChartOfAccount $chartOfAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChartOfAccount $chartOfAccount)
    {
        //
    }
}
