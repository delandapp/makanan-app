<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class details_transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function saldo(): BelongsToMany
    {
        return $this->belongsToMany(saldo::class, 'history_transaksis', 'id_transaksi', 'id_saldo');
    }
}
