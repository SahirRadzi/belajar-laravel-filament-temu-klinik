<?php

namespace App\Filament\Resources\PatientAppointmentResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Support\Facades\DB;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Resources\PatientAppointmentResource;

class ListPatientAppointments extends ListRecords
{
    protected static string $resource = PatientAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {

        $appointmentCounts = DB::table('patient_appointments')
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        // Get total appointments
        $all = $appointmentCounts->sum();

        // Get counts for specific statuses
        $NewPatient = $appointmentCounts->get('New Patient', 0);
        $OnSchedule = $appointmentCounts->get('On Schedule', 0);
        $CompleteAppointment = $appointmentCounts->get('Complete Appointment', 0);


        return[

            'All Patient' => Tab::make()
            ->badge($all)
            ->badgeColor('primary'),

            'New Patient' => Tab::make()

             ->badge($NewPatient)
             ->badgeColor('danger')
             ->modifyQueryUsing(function ($query) {
                return $query->where('status','New Patient');

             }),

            'On Schedule' => Tab::make()
             ->badge($OnSchedule)
             ->badgeColor('info')
             ->modifyQueryUsing(function ($query) {
             return $query->where('status','On Schedule');

             }),

            'Complete Appointment' => Tab::make()
             ->badge($CompleteAppointment)
             ->badgeColor('success')
             ->modifyQueryUsing(function ($query) {
             return $query->where('status','Complete Appointment');

             }),
        ];
    }


}
