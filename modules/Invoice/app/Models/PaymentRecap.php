<?php

namespace Modules\Invoice\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Rt\app\Models\NamaRt;

class PaymentRecap extends Model
{
    use HasFactory;

    protected $fillable = ['name','amount','date', 'nama_rt_id'];

    protected static function newFactory()
    {
        return \Modules\Invoice\Database\factories\PaymentRecapFactory::new();
    }

    public function nama_rt()
    {
        return $this->belongsTo(NamaRt::class);
    }
}
