<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function masakan()
    {
        return $this->belongsToMany(masakan::class, 'orderdetails', 'id_order', 'id_masakan');
    }
    public function keterangan()
    {
        return $this->belongsTo(keterangan::class,'id_keterangan','id');
    }
    public function meja()
    {
        return $this->belongsTo(meja::class,'id_meja','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
    public function transaksi()
    {
        return $this->hasOne(transaksi::class,'id_order','id');
    }
    // public function orderdetails()
    // {
    //     return $this->belongsTo(OrderDetail::class,'id_order', 'id');
    // }
}
