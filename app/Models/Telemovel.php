<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telemovel extends Model
{
    use HasFactory; 

    protected $table = 'Telemoveis';
    protected $fillable = ['name', 'price','sale_price', 'desc','category','stock','image_path'];
}
