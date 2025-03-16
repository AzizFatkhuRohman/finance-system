<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasUuids;
    protected $guarded=[];
    public function Index(){
        return $this->latest()->get();
    }
    public function Show($id){
        return $this->find($id);
    }
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id,$data){
        return $this->find($id)->update($data);
    }
    public function Trash($id){
        return $this->find($id)->delete();
    }
}
