<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_code',
        'name',
        'stock',
        'price',
        'supplier_info',
        'exp_date',
    ];

    protected $casts = [
        'supplier_info' => 'json'
    ];
}
