<?php

namespace Modules\Rt\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoice\app\Models\PaymentRecap;
use Modules\Pengeluaran\app\Models\Referensi;

class NamaRt extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory()
    {
        return \Modules\Rt\Database\factories\NamaRtFactory::new();
    }

    public function payment_recap()
    {
        return $this->hasMany(PaymentRecap::class);
    }

    public function referensi()
    {
        return $this->hasMany(Referensi::class);
    }

    public function expense($referen)
    {
        $amount = 0;

        foreach ($referen as $ref) {
            $amount += $ref->detail_pengeluaran_sum_amount;
        }

        return $amount;
    }
}
