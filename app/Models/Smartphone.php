<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Stmt\Return_;

class Smartphone extends Model
{
    protected $table = 'smartphone_specs';

    protected $fillable = [
        'model',
        'ram',
        'storage',
        'family_processor',
        'processor',
        'SIM',
        'operating_system',
        'screen_resolution',
        'screen_inches',
        'screen_hz',
        'screen_type',
        '5G',
        'NFC'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
