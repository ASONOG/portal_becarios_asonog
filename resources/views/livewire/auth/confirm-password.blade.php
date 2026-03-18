<x-layouts::auth :title="__('Confirmar contraseña')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Confirma tu identidad')"
            :description="__('Esta es una área segura. Ingresa tu contraseña para continuar')"
        />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Contraseña</label>
                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Tu contraseña"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('password') border-red-400 @enderror"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition text-sm"
                data-test="confirm-password-button">
                Confirmar
            </button>
        </form>
    </div>
</x-layouts::auth>
