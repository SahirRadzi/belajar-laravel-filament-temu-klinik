<?php


use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {

    // $doctor = User::role('doctor')->get(); // Returns only users with the role 'doctor'
    $recipient = auth()->user();
    // dd($doctor);
    // dd($recipient);

    Notification::make()
    ->title(title:'You have added : Testing')
    ->body('Sending to me.')
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
        dd('Test Kedua !');

});
