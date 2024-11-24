<div>
    <div class="my-10 mx-auto max-w-7xl">

        <form wire:submit="create">
            {{ $this->form }}

            <x-filament::button color="success" size="xl" type="submit" class="my-5 w-full">
                Submit Booking
            </x-filament::button>
        </form>
        <x-filament-actions::modals />
    </div>


</div>
