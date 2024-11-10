<?php

namespace App\Observers;

use App\Models\User;
use App\Models\PatientAppointment;
use Filament\Notifications\Notification;

class AppointmentObserver
{
    /**
     * Handle the PatientAppointment "created" event.
     */
    public function created(PatientAppointment $patientAppointment): void
    {
        // $doctor = User::role('doctor')->get();

        Notification::make()
            ->title('You have a New Patient: ' . $patientAppointment->name)
            ->body('please check in Patient Appointment.')
            ->success()

            ->sendToDatabase($patientAppointment->user);
    }

    /**
     * Handle the PatientAppointment "updated" event.
     */
    public function updated(PatientAppointment $patientAppointment): void
    {
        //
    }

    /**
     * Handle the PatientAppointment "deleted" event.
     */
    public function deleted(PatientAppointment $patientAppointment): void
    {
        //
    }

    /**
     * Handle the PatientAppointment "restored" event.
     */
    public function restored(PatientAppointment $patientAppointment): void
    {
        //
    }

    /**
     * Handle the PatientAppointment "force deleted" event.
     */
    public function forceDeleted(PatientAppointment $patientAppointment): void
    {
        //
    }
}
