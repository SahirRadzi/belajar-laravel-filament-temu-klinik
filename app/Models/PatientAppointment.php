<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\Medication;
use App\Observers\AppointmentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ObservedBy([AppointmentObserver::class])]

class PatientAppointment extends Model
{
    use HasFactory;

    protected $fillable =[
        'patient_id',
        'user_id',
        'date_of_appointment',
        'note',
        'status',
    ];

    protected $cast = [
        'medication_id' => 'data'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
}
