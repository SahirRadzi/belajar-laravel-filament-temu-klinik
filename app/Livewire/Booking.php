<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\View;
use App\Models\ReservationAppointment;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class Booking extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Group::make()
                ->schema([
                    \Filament\Forms\Components\Section::make('Booking Form')
                    ->description('Fill in the blank.')
                        ->schema([
                        \Filament\Forms\Components\Select::make('type_of_appointment_id')
                            ->relationship('typeOfAppointment', 'name')
                            ->placeholder('Select your type of appointment')
                            ->required(),
                        \Filament\Forms\Components\TextInput::make('patient_name')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\DateTimePicker::make('datetime_appointment')
                            ->helperText(new HtmlString('Please select your <strong>Datetime Appointment</strong>'))
                            ->seconds(false)
                            ->required(),
                    	])
                ])
            ])
            ->statePath('data')
            ->model(ReservationAppointment::class);
    }

    public function create(): void
    {
        ReservationAppointment::create($this->form->getState());
        // dd($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.booking');
    }
}
