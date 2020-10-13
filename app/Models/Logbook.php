<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;
    public $guarded = [];

//    public function findById($id){
//        return $this->where('id', $id)->first();
//    }
}
