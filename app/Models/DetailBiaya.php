<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DetailBiaya extends Model
{
    use HasUuids;
    protected $table = 'detail_biaya';
    protected $guarded = [];
    public function biaya(){
        return $this->belongsTo(Biaya::class);
    }
    public function chartOfAccount(){
        return $this->belongsTo(ChartOfAccount::class);
    }
}
