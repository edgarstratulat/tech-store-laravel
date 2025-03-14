<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComponentePC extends Model
{
    use HasFactory; 

    protected $table = 'Componentes';
    protected $fillable = ['name', 'promocao_id', 'price','sale_price', 'desc','category','subCategory','stock','image_path'];
}
