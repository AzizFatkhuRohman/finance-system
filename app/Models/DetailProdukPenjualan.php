<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DetailProdukPenjualan extends Model
{
    use HasUuids;
    protected $table = 'detail_produk_penjualan';
    protected $guarded = [];
    public function penjualan(){
        return $this->belongsTo(Penjualan::class);
    }
    public function chartOfAccount(){
        return $this->belongsTo(ChartOfAccount::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
