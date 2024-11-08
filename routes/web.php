<?php


use Illuminate\Support\Facades\Route;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function() {
    $recipient = auth()->user();
    // dd($recipient);

    Notification::make()
    ->title(title:'You have added : New Medicine')
    ->body('10pcs Loratadine 10mg.')
    ->info()
    ->actions([
        Action::make('view')
            ->button()
            ->outlined()
            ->markAsRead(),
    ])
        ->sendToDatabase($recipient)
        // ->broadcast($recipient)
        ;
        // event(new DatabaseNotificationsSent($recipient));
        dd('success sending !');

})->middleware('auth');
// Route::get('/', function () {
//     return view('welcome');
// });
