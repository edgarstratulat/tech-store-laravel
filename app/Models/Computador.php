<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Computador extends Model
{
    use HasFactory; 

    protected $table = 'table_computadores';
    protected $fillable = ['name', 'price'];
}
