<x-layouts::auth :title="__('Iniciar sesión')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Bienvenido de vuelta')"
            :description="__('Ingresa tu correo y contraseña para acceder al portal')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="tucorreo@ejemplo.com"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition "
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label class="text-sm font-medium text-zinc-700">Contraseña</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-primary-600 hover:text-primary-600 transition">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Tu contraseña"
                    class="w-full border {{ $errors->has('password') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition "
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded border-zinc-300 text-primary-600 focus:ring-primary-500" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm text-zinc-600">Mantenerme conectado</span>
            </label>

            <button type="submit"
                class="w-full py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition text-sm"
                data-test="login-button">
                Iniciar sesión
            </button>
        </form>

        @if (Route::has('register'))
            <p class="text-sm text-center text-zinc-500">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-primary-600 font-medium hover:underline">Regístrate gratis</a>
            </p>
        @endif
    </div>
</x-layouts::auth>
