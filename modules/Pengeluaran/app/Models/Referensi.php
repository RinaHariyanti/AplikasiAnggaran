<?php

namespace Modules\Pengeluaran\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Rt\app\Models\NamaRt;

class Referensi extends Model
{
    use HasFactory;
              
    protected $fillable = ['tgl_transaksi', 'nota', 'nama_rt_id'];

    protected static function newFactory()
    {
        return \Modules\Pengeluaran\Database\factories\ReferensiFactory::new();
    }

    public function detail_pengeluaran()
    {
        return $this->hasMany(DetailPengeluaran::class);
    }

    public function nama_rt()
    {
        return $this->belongsTo(NamaRt::class);
    }
}
