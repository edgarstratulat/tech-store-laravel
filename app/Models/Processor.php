<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Processor extends Model
{
    protected $table = 'processor_specs';

    protected $fillable = [
        'model',
        'cores',
        'threads',
        'tdp',
        'socket'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
