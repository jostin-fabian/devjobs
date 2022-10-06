<form class="md:w-1/2 space-y-5" wire:submit.prevent="createVacancy">
    <!-- Vacancy title -->
    <div>
        <x-input-label for="title" :value="__('Vacancy title')"/>

        <x-text-input id="title" class="block mt-1 w-full" type="text" placeholder="Title of vacancy" wire:model="title"
                      :value="old('title')"
                      required autofocus/>
        @error('title')
        <p class="mt-1 text-red-500">{{ $message }}</p>
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
        <p class="mt-1 text-red-500">{{ $message }}</p>
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

        <x-input-error :messages="$errors->get('category')" class="mt-2"/>
    </div>
    <!-- Company -->
    <div>
        <x-input-label for="company" :value="__('Company')"/>

        <x-text-input id="company" class="block mt-1 w-full" type="text" placeholder="company: ex. Netflix,Uber"
                      wire:model="company" :value="old('company')"
                      required autofocus/>

        <x-input-error :messages="$errors->get('company')" class="mt-2"/>
    </div>
    <!-- Last day to apply -->
    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')"/>

        <x-text-input id="last_day" class="block mt-1 w-full" type="date"
                      wire:model="last_day" :value="old('last_day')"
                      required autofocus/>

        <x-input-error :messages="$errors->get('last_day')" class="mt-2"/>
    </div>
    <!-- Job Description  -->
    <div>
        <x-input-label for="description" :value="__('Job Description')"/>
        <textarea id="description" class="block mt-1 w-full h-72" wire:model="description"
                  placeholder="General job description, experience "></textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
    </div>
    <!-- Image -->
    <div>
        <x-input-label for="image" :value="__('Image')"/>

        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image"/>

        <x-input-error :messages="$errors->get('image')" class="mt-2"/>
    </div>
    <!-- primary button -->
    <x-primary-button class="w-full justify-center">
        {{ __('Create Vacancy') }}
    </x-primary-button>
</form>
