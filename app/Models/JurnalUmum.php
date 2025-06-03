<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JurnalUmum extends Model
{
    use HasUuids;
    protected $table = 'jurnal_umum';
    protected $guarded=[];
    public function Index()
{
    return DB::table('jurnal_umum')
        ->join('chart_of_accounts', 'jurnal_umum.no_account', '=', 'chart_of_accounts.no_account')
        ->select(
            'jurnal_umum.*',
            'chart_of_accounts.description as deskripsi',
            'chart_of_accounts.no_account as coa_no_account'
        )
        ->latest('jurnal_umum.created_at')
        ->get();
}
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id,$data){
        return $this->where('relational_id',$id)->update($data);
    }
}
