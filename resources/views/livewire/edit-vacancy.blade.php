<form class="md:w-1/2 space-y-5" wire:submit.prevent='editVacancy' novalidate>
    <!-- Vacancy title -->
    <div>
        <x-input-label for="title" :value="__('Vacancy title')"/>

        <x-text-input id="title" class="block mt-1 w-full" type="text" placeholder="Title of vacancy" wire:model="title"
                      :value="old('title')"
                      required autofocus/>
        @error('title')
        <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <!-- Monthly Salary-->
    <div>
        <x-input-label for="salary" :value="__('Monthly Salary')"/>

        <select id="salary" wire:model="salary"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>{{ __('-- Select a salary --') }}</option>
            @foreach($salaries as $salary)
                <option value="{{$salary->id}}">{{$salary->salary}}</option>
            @endforeach

        </select>
        @error('salary')
        <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <!-- Category-->
    <div>
        <x-input-label for="category" :value="__('Category')"/>

        <select id="category" wire:model="category"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="">{{ __('-- Select a category --') }}</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        @error('category')
        <livewire:show-alert :message="$message"/>
        @enderror

    </div>
    <!-- Company -->
    <div>
        <x-input-label for="company" :value="__('Company')"/>

        <x-text-input id="company" class="block mt-1 w-full" type="text" placeholder="company: ex. Netflix,Uber"
                      wire:model="company" :value="old('company')"
                      required autofocus/>

    </div>
    @error('company')
    <livewire:show-alert :message="$message"/>
    @enderror
    <!-- Last day to apply -->
    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')"/>

        <x-text-input id="last_day" class="block mt-1 w-full" type="date"
                      wire:model="last_day" :value="old('last_day')"
                      required autofocus/>

    </div>
    @error('last_day')
    <livewire:show-alert :message="$message"/>
    @enderror
    <!-- Job Description  -->
    <div>
        <x-input-label for="description" :value="__('Job Description')"/>
        <textarea class="block mt-1 w-full h-72" wire:model="description"
                  placeholder="General job description, experience "></textarea>

    </div>
    @error('description')
    <livewire:show-alert :message="$message"/>
    @enderror
    <!-- Image -->
    <div>
        <x-input-label for="image" :value="__('Image')"/>

        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*"/>
        <!-- Edit Image -->
        <div class="my-5 w-80">
            <x-input-label :value="__('Current Image')"/>
            <img src="{{asset('storage/vacancies/'.$image)}}" alt="{{'Vacancy image ' . $title}}">
        </div>
        <!-- Edit Image -->

        <!--------------------------------------->
        @error('image')
        <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <!-- primary button -->
    <x-primary-button class="w-full justify-center">
        {{ __('Edit Vacancy') }}
    </x-primary-button>
</form>
