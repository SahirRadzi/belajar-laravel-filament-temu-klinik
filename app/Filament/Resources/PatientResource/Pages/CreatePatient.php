<?php

namespace App\Filament\Resources\PatientResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PatientResource;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;

    // protected function getCreatedNotificationTitle(): ?string
    // {
    //     return 'Patient created';
    // }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Patient created')
            ->icon('heroicon-c-check-circle')
            ->iconColor('success')
            ->duration('5000')
            ->body('Loghat Perak: Maklumat pesakit kome, udah berjaye daftar.');

    }
}
