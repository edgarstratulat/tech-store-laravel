<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Armazenamento extends Model
{
    protected $table = 'storage_specs';

    protected $fillable = [
        'size',
        'type',
        'rotation_speed',
        'writing_speed',
        'reading_speed',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
