<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to this Vacancy</h3>
    @if(session()->has('message'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{session('message')}}
        </p>
    @else
        <form wire:submit.prevent="applyTo" class="w-96 mt-5" novalidate>
            <div class="mb-4">
                {{--CV--}}
                <x-input-label for="cv" :value="__('Resume or CV (PDF)')"/>
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf"/>
            </div>
            @error('cv')
            <livewire:show-alert :message="$message">
                @enderror
                <x-primary-button class="my-5">
                    {{__('Apply to')}}
                </x-primary-button>


        </form>

    @endif
</div>
