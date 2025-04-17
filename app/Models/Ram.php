<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ram extends Model
{
    protected $table = 'ram_specs';

    protected $fillable = [
        'size',
        'type',
        'frequency',
        'latency'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class, 'ram');
    }
}
