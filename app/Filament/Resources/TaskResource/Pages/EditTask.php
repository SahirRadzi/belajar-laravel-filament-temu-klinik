<?php

namespace App\Filament\Resources\TaskResource\Pages;

use Filament\Actions;
use App\Filament\Resources\TaskResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        // $recipient = auth()->user();

        // Notification::make()
        //     ->title('Updated Name')
        //     ->body('Tahniah ! Berjaya kemaskini.')
        //     ->success()
        //     ->sendToDatabase($recipient);

        return [
            Actions\DeleteAction::make(),
        ];
    }
}
