<x-layouts::auth :title="__('Crear cuenta')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Crear tu cuenta')"
            :description="__('Completa tus datos para solicitar una beca ASONOG')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo</label>
                <input
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Tu nombre y apellido"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('name') border-red-400 @enderror"
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo -->
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="tucorreo@ejemplo.com"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('email') border-red-400 @enderror"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Contraseña</label>
                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Mínimo 8 caracteres"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('password') border-red-400 @enderror"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Confirmar contraseña</label>
                <input
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Repite tu contraseña"
                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                >
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition text-sm"
                data-test="register-user-button">
                Crear cuenta
            </button>
        </form>

        <p class="text-sm text-center text-zinc-500">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Inicia sesión</a>
        </p>
    </div>
</x-layouts::auth>
