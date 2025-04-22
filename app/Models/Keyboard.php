<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keyboard extends Model
{
    protected $table = 'keyboard_specs';

    protected $fillable = [
        'format',
        'type',
        'light',
        'numpad',
        'switch',
        'response_time',
        'layout'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'keyboard_id');
    }
}
