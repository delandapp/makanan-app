<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class saldo extends Model
{
    use HasFactory;
    protected $table = 'saldos';
    protected $guarded = ['id'];
    public function history(): BelongsToMany
    {      
        return $this->belongsToMany(details_transaksi::class, 'history_transaksis', 'id_saldo', 'id_transaksi');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'id_user','id');
    }
}
