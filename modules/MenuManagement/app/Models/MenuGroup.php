<?php

namespace Modules\MenuManagement\app\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuGroup extends Model
{
    use Uuid, HasFactory;

    protected $fillable = ['name', 'status', 'permission_name', 'posision'];

    protected $casts = ['status' => 'boolean'];

    protected static function newFactory()
    {
        return \Modules\MenuManagement\Database\factories\MenuGroupFactory::new();
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
