<?php

namespace App\Filament\Resources\PatientAppointmentResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PatientAppointmentResource;

class EditPatientAppointment extends EditRecord
{
    protected static string $resource = PatientAppointmentResource::class;

    protected function getHeaderActions(): array
    {

        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
