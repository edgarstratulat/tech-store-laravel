<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComputerCase extends Model
{
    protected $table = 'cases_specs';

    protected $fillable = [
        'format',
        'motherboard_supported',
        'number_front_fans',
        'number_rear_fans',
        'number_lower_fans',
        'number_rear_fans',
        'max_gpu_length',
        'max_cooler_height',
        'tempered_glass',
        'rgb'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class, 'pc_case_id');
    }

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class, 'case');
    }
}
