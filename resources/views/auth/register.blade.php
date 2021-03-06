<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div>
                <x-jet-label for="name" value="{{ __('Nome Completo') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="genero" value="{{ __('Genero') }}" />
                <x-jet-input id="genero" class="" type="radio" name="genero" value="M" required autofocus autocomplete="genero" /><span>Masculino</span>
                <x-jet-input id="genero" class="" type="radio" name="genero" value="F" required autofocus autocomplete="genero" /><span>Feminino</span>
            </div>

            <div class="mt-4">
                <x-jet-label for="dnasc" value="{{ __('Data de Nascimento') }}" />
                <x-jet-input id="dnasc" class="block mt-1 w-full" type="date" name="dnasc" :value="old('dnasc')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="tipo" value="{{ __('Tipo') }}" />
                <x-jet-input id="tipo" class="" type="radio" name="tipo" value="individual" required autofocus autocomplete="tipo" /><span>Individual</span>
                <x-jet-input id="tipo" class="" type="radio" name="tipo" value="organizacao" required autofocus autocomplete="tipo" /><span>Organizacional</span>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Palavra-Passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Palavra-Passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('J?? possui uma conta?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
