<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{
    use HasFactory , HasRoles; 

    protected $table = 'Users';
    protected $fillable = ['name', 'email', 'password'];
}
