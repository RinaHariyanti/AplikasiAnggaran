<?php

namespace Modules\Pengeluaran\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','qty', 'amount', 'referensi_id'];

    protected static function newFactory()
    {
        return \Modules\Pengeluaran\Database\factories\DetailPengeluaranFactory::new();
    }
}
