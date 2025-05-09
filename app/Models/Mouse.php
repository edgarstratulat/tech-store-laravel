<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mouse extends Model
{
    protected $table = 'mouse_specs';

    protected $fillable = [
        'format',
        'interface',
        'dpi',
        'response_time'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'mouse_id');
    }
}