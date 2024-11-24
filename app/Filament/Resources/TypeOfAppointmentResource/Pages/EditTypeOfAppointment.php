<?php

namespace App\Filament\Resources\TypeOfAppointmentResource\Pages;

use App\Filament\Resources\TypeOfAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeOfAppointment extends EditRecord
{
    protected static string $resource = TypeOfAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
