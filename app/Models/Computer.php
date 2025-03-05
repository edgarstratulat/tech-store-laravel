<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Computer extends Model
{
    use HasFactory; 

    protected $table = 'Computers';
    protected $fillable = ['name', 'price','sale_price', 'desc','category','stock','image_path'];
}
