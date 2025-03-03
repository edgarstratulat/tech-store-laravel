<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory; 

    protected $table = 'Products';
    protected $fillable = ['name', 'price','sale_price', 'desc','category','image_path'];
}
