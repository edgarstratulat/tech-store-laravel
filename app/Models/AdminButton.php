<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminButton extends Model
{
    use HasFactory;
    protected $table = 'AdminButtons';
    protected $fillable = ['button_name', 'route', 'dropdown', 'dropdownOptions'];
}
