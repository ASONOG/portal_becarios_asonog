<x-layouts::auth :title="__('Restablecer contraseña')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Nueva contraseña')"
            :description="__('Ingresa y confirma tu nueva contraseña para recuperar el acceso')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input
                    name="email"
                    type="email"
                    value="{{ request('email') }}"
                    required
                    autocomplete="email"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition "
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nueva contraseña</label>
                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Mínimo 8 caracteres"
                    class="w-full border {{ $errors->has('password') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition "
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Confirmar contraseña</label>
                <input
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Repite tu contraseña"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition"
                >
            </div>

            <button type="submit"
                class="w-full py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition text-sm"
                data-test="reset-password-button">
                Restablecer contraseña
            </button>
        </form>
    </div>
</x-layouts::auth>
