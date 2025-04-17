<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    protected $table = 'computer_specs';

    protected $fillable = [
        'processor',
        'motherboard',
        'ram',
        'storage',
        'gpu',
        'case',
        'powersupply'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function processor()
    {
        return $this->belongsTo(Processor::class, 'processor');
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class, 'ram');
    }

    public function motherboard()
    {
        return $this->belongsTo(Motherboard::class, 'motherboard');
    }

    public function storage()
    {
        return $this->belongsTo(Armazenamento::class, 'storage');
    }

    public function gpu()
    {
        return $this->belongsTo(GPU::class, 'gpu');
    }

    public function powersupply()
    {
        return $this->belongsTo(PowerSupply::class, 'powersupply');
    }

    public function case()
    {
        return $this->belongsTo(ComputerCase::class, 'case');
    }


}
