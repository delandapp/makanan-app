<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_makanan extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    public function masakan()
    {
        return $this->hasMany(masakan::class,'id_kategori_makanan','id');
    }
}
