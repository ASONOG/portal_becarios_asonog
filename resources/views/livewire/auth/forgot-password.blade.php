<x-layouts::auth :title="__('Recuperar contraseña')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Recuperar contraseña')"
            :description="__('Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="tucorreo@ejemplo.com"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('email') border-red-400 @enderror"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition text-sm"
                data-test="email-password-reset-link-button">
                Enviar enlace de recuperación
            </button>
        </form>

        <p class="text-sm text-center text-zinc-500">
            ¿Recordaste tu contraseña?
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Inicia sesión</a>
        </p>
    </div>
</x-layouts::auth>
