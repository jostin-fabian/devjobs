<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}"novalidate>
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <!-- Job role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('What type of Account do you want at DevJobs?')"/>
                <select id="role" name="role"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="" {{ old('role') == ''?'selected' : '' }}>
                        {{ __('-- Select a role --') }}
                    </option>
                    <option value="1">Developer - Get a Job</option>
                    <option value="2">Recruiter - Post Jobs'</option>
                </select>

            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                              name="password_confirmation" required/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex justify-between my-5">
                <x-link
                    :href="route('login')">
                    I already have an account
                </x-link>
                <x-link
                    :href="route('password.request')">
                    Forgot your password

                </x-link>
            </div>

            <x-primary-button class="w-full justify-center">
                {{ __('Create an account') }}
            </x-primary-button>
        </form>
    </x-auth-card>
</x-guest-layout>
