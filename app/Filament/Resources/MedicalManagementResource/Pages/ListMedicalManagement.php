<?php

namespace App\Filament\Resources\MedicalManagementResource\Pages;

use App\Filament\Resources\MedicalManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalManagement extends ListRecords
{
    protected static string $resource = MedicalManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
