<?php

namespace App\Filament\Resources\TypeOfAppointmentResource\Pages;

use App\Filament\Resources\TypeOfAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTypeOfAppointment extends ViewRecord
{
    protected static string $resource = TypeOfAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
