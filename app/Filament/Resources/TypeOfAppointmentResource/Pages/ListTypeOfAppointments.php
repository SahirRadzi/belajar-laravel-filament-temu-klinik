<?php

namespace App\Filament\Resources\TypeOfAppointmentResource\Pages;

use App\Filament\Resources\TypeOfAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeOfAppointments extends ListRecords
{
    protected static string $resource = TypeOfAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
