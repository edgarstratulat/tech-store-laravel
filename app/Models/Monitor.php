<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Monitor extends Model
{
    protected $table = 'monitor_specs';

    protected $fillable = [
        'inclination',
        'format',
        'ratio',
        'resolution',
        'inches',
        'refresh_rate',
        'response_time',
        'type_panel'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'monitor_id');
    }
}
