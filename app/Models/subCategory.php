<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class subCategory extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'subCategories';
    protected $fillable = ['name', 'slug', 'category_id'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
