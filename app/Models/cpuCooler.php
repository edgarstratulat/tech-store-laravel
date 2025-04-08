<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cpuCooler extends Model
{
    protected $table = 'cpu_coolers_specs';

    protected $fillable = [
        'socket',
        'type',
        'fan_rpm',
        'air_flow',
        'rgb'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
