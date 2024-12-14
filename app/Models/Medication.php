<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_code',
        'name',
        'stock',
        'price',
        'image',
        'supplier_info',
        'exp_date',
    ];

    protected $casts = [
        'supplier_info' => 'json'
    ];


    public function patientAppointment(): BelongsTo
    {
        return $this->belongsTo(PatientAppointment::class);
    }
}
