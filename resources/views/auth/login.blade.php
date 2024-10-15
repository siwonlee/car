<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
         <x-jet-authentication-card-logo />  
             



        </x-slot>



        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="vendor" value="{{ __('Vendor ID') }}" />
                <x-jet-input id="vendorid" class="block w-full mt-1" type="text" name="vendorid" required  />
            </div> --}}


            

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                
   {{-- @if (Route::has('register'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Register?') }}
                    </a>
                @endif
 --}}

                <span class="w-10"></span>
                               @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                
              



                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

    <div class="flex flex-col items-center pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="p-4 mb-4">If the keyboard does not show up with the buletooth scanner connected on the iphone, scan the barcord to show it up.</div>

        <img src="{{asset('storage/showpad.svg')}}" class="p-4" />


    </div>            
       
</x-guest-layout>
