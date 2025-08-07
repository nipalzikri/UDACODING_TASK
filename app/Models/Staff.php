<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'nama', 
        'id_laundry', 
        'password', 
        'email', 
        'no_hp', 
        'level', 
        'alamat'
    ];

    protected $table = 'staff';
}
