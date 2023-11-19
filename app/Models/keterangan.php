<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keterangan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];
    public function order()
    {
        return $this->hasMany(order::class,'id_keterangan', 'id');
    }

    
}
