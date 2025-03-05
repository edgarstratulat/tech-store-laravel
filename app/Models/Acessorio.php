<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Acessorio extends Model
{
    use HasFactory; 

    protected $table = 'Acessorios';
    protected $fillable = ['name', 'price','sale_price', 'desc','category','stock','image_path'];
}
