<x-layouts::auth :title="__('Verificar correo')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Verifica tu correo')"
            :description="__('')"
        />

        <p class="text-sm text-zinc-500 leading-relaxed">
            Hemos enviado un enlace de verificación a tu correo electrónico.
            Por favor revisa tu bandeja de entrada y haz clic en el enlace para activar tu cuenta.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg">
                Se ha enviado un nuevo enlace de verificación a tu correo.
            </div>
        @endif

        <div class="flex flex-col gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition text-sm">
                    Reenviar correo de verificación
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full py-2.5 text-sm text-zinc-500 hover:text-zinc-700 transition"
                    data-test="logout-button">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</x-layouts::auth>
