<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class masakan extends Model
{
    use HasFactory;
    protected $fillable = ['nama','harga','desc','status','gambar','id_kategori_makanan','estimasi'];
    public function order(): BelongsToMany
    {
        return $this->belongsToMany(order::class, 'orderdetails', 'id_masakan', 'id_order');
    }
    public function keranjang(): BelongsToMany
    {
        return $this->belongsToMany(order::class, 'keranjangs', 'id_masakan', 'id_user');
    }

    public function kategori_masakan()
    {
        return $this->belongsTo(kategori_makanan::class,'id_kategori_makanan','id');
    }
}
