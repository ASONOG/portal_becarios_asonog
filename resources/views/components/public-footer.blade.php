<footer class="bg-zinc-900 text-zinc-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- Brand column --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-4">
                    <span class="flex items-center justify-center w-8 h-8 rounded-md bg-primary-600 text-white font-bold text-sm select-none">A</span>
                    <span class="font-semibold text-white text-base">ASONOG</span>
                </a>
                <p class="text-sm text-zinc-400 leading-relaxed max-w-xs">
                    Asociación de Organismos No Gubernamentales de Honduras. Apoyando el desarrollo humano integral desde 1991.
                </p>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="text-xs font-semibold text-zinc-400 uppercase tracking-wider mb-3">Navegación</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Inicio</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Sobre ASONOG</a></li>
                    <li><a href="{{ route('programs') }}" class="hover:text-white transition-colors">Becas</a></li>
                    <li><a href="{{ route('internships') }}" class="hover:text-white transition-colors">Prácticas</a></li>
                    <li><a href="{{ route('donate') }}" class="hover:text-white transition-colors">Donar</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contacto</a></li>
                </ul>
            </div>

            {{-- Area privada --}}
            <div>
                <h3 class="text-xs font-semibold text-zinc-400 uppercase tracking-wider mb-3">Becarios</h3>
                <ul class="space-y-2 text-sm">
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Mi cuenta</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Iniciar sesión</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-zinc-500">
            <p>&copy; {{ date('Y') }} ASONOG. Todos los derechos reservados.</p>
            <p>Honduras</p>
        </div>
    </div>
</footer>
