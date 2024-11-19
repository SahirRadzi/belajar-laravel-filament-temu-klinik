<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PatientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientResource\RelationManagers;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;
    protected static ?string $navigationIcon = 'heroicon-m-user-plus';
    protected static ?string $navigationGroup = 'Data management';
    // protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
                ->schema([

                Section::make('Personal Information')
                    ->collapsible()
                    ->description('Add personal information')
                    ->schema([
                        TextInput::make('ic')
                        ->numeric()
                        ->minValue('0')
                        ->label('Number of Identification (IC)')->required(),
                        TextInput::make('name')->required(),
                        Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female'
                            ])->required(),
                        DatePicker::make('date_of_birthday')->required(),
                        TextInput::make('phone')->required()
                        ->helperText(new HtmlString('Phone Number: <strong>60123456789</strong>')),
                        Textarea::make('address'),

                    ])->columns(2),

                Section::make('Personal Medical Information')
                ->description('Add personal medical information')
                ->collapsible()
                ->schema([

                Repeater::make('medical_info')
                    ->label('More Information')
                    ->schema([
                        Select::make('name')
                        ->options(config(key: 'pm-config'))
                        ->required(),

                        TextInput::make('value')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
            ])

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ic')
                ->label('No of Identification')
                ->searchable(),
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('gender'),
                TextColumn::make('phone')
                ->searchable(),
                // TextColumn::make('medical_info'),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
