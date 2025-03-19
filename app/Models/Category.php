<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'Categories';
    protected $fillable = ['name'];

    public function subcategories(): HasMany
    {
        return $this->hasMany(subCategory::class);
    }
}
