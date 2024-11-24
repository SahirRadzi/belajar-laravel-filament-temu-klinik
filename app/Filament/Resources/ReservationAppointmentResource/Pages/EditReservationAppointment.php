<?php

namespace App\Filament\Resources\ReservationAppointmentResource\Pages;

use App\Filament\Resources\ReservationAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservationAppointment extends EditRecord
{
    protected static string $resource = ReservationAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
