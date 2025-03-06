<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Periferico extends Model
{
    use HasFactory; 

    protected $table = 'Perifericos';
    protected $fillable = ['name', 'price','sale_price', 'desc','category','subCategory','stock','image_path'];
}
