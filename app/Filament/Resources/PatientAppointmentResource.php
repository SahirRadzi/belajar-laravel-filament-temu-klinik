<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Medication;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PatientAppointment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientAppointmentResource\Pages;
use App\Filament\Resources\PatientAppointmentResource\RelationManagers;

class PatientAppointmentResource extends Resource
{
    protected static ?string $model = PatientAppointment::class;
    protected static ?string $navigationIcon = 'heroicon-m-user-group';

    public static function getNavigationBadge(): ?String
    {
        return static::getModel()::where('status','=','new patient')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', '=','new patient')->count() > 0
        ? 'danger'
        : 'primary';
    }


    public static function form(Form $form): Form
    {


        return $form
            ->schema([

                Section::make('Appointment Details')
                    ->description('Fill the patient name, doctor, date of appointment & note.')
                    ->schema([
                        Forms\Components\Select::make('patient_id')
                        ->relationship('patient','ic')
                        ->preload()
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->label('Doctor')
                        ->relationship('user','name', fn ($query) => $query
                            ->getDoctors()
                        ) //ni cara nk buat query guna filament Terima kasih bang jadi , sat nk try something, tu kemas skit, org panggil scope
                        ->preload()
                        ->searchable()
                        ->required(),

                    Forms\Components\DatePicker::make('date_of_appointment')
                        ->required(),
                    ])
                    ->columns(2),

                Section::make('Notes')
                    ->description('Note for patient.')
                    ->schema([
                        Forms\Components\RichEditor::make('note')
                        ->hiddenLabel()
                        ->maxLength(255),
                    ])->columnSpanFull(),

                Section::make('Appointment Status')
                    ->description('Select the latest status.')
                    ->schema([

                Forms\Components\Select::make('status')
                    ->options([
                        'New Patient' => 'New Patient',
                        'On Schedule' => 'On Schedule',
                        'Complete Appointment' => 'Complete Appointment',
                    ])->required(),

                    ])
                    ->columns(2),

                Section::make('Doctor and Pharmacist')
                ->description('Select the medication bellow.')
                ->schema([
                    Repeater::make('More medicine')
                        ->hiddenLabel()
                        ->addActionLabel('Add more medicine')
                        ->schema([
                            Select::make('medication_id')
                            ->label('Medication list')
                            ->relationship('medication','name'),
                            Select::make('pcs')
                            ->options([
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ]),
                           Select::make('time')
                            ->options([
                                'Day' => 'Day',
                                'Night' => 'Night',
                            ]),
                        ])->columns(3),

                        ]),

                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient.name'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Doctor'),
                Tables\Columns\TextColumn::make('date_of_appointment')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('note')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('medication_list')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->slideOver()
                    ->color('success'),
                Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatientAppointments::route('/'),
            // 'create' => Pages\CreatePatientAppointment::route('/create'),
            // 'edit' => Pages\EditPatientAppointment::route('/{record}/edit'),
        ];
    }
}
