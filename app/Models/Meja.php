<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $guarded = ["id"];
    
    public function order()
    {
        return $this->hasMany(order::class,'id_meja', 'id');
    }
}
