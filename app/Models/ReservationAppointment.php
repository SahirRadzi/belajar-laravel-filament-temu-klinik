<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_appointment_id',
        'patient_name',
        'phone',
        'datetime_appointment',
    ];

    public function typeOfAppointment(): BelongsTo
    {
        return $this->belongsTo(TypeOfAppointment::class);
    }
}
