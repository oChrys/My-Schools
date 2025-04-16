<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-auth-session-status class="mb-4 text-green-600" :status="session('success')" />

    <form method="POST" action="{{ route('login_post') }}">
        @csrf

        <!-- CPF -->
        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="senha" :value="__('Senha')" />

            <x-text-input id="senha" class="block mt-1 w-full"
                            type="password"
                            name="senha"
                            required autocomplete="current-senha" />

            <x-input-error :messages="$errors->get('senha')" class="mt-2" />
        </div>

        <!-- Registrar -->
        <div class="block mt-4">
            <label for="registrar" class="inline-flex items-center">
            <a href="{{ route('registrar_usuario') }}" class="ms-2 text-sm text-gray-600 dark:text-gray-400">Registrar</a>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('senha.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('senha.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
