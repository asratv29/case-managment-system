<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretery extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
         'email',
         'username',
          'role',
           'dept',
            'year',
            'semister',
            'session',
            'tracking',
            'token',
            'phone',
            'gender'

    ];
}
