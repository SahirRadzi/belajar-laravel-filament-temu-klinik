<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ic',
        'name',
        'gender',
        'date_of_birthday',
        'phone',
        'address',
        'medical_info'
    ];

    protected $casts = [
        'medical_info' => 'json'
    ];
}

