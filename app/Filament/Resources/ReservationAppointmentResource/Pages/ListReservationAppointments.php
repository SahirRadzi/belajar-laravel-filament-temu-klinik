<?php

namespace App\Filament\Resources\ReservationAppointmentResource\Pages;

use App\Filament\Resources\ReservationAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReservationAppointments extends ListRecords
{
    protected static string $resource = ReservationAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
