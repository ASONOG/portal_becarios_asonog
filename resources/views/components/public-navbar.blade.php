<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-zinc-200"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                <span class="flex items-center justify-center w-8 h-8 rounded-md bg-primary-600 text-white font-bold text-sm select-none">A</span>
                <span class="font-semibold text-zinc-900 text-base tracking-tight">ASONOG</span>
            </a>

            {{-- Desktop navigation links --}}
            <div class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                    Inicio
                </a>
                <a href="{{ route('about') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">
                    Nosotros
                </a>
                <a href="{{ route('programs') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('programs') ? 'text-primary-600' : '' }}">
                    Becas
                </a>
                <a href="{{ route('internships') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('internships') ? 'text-primary-600' : '' }}">
                    Prácticas
                </a>
                <a href="{{ route('donate') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('donate') ? 'text-primary-600' : '' }}">
                    Donar
                </a>
                <a href="{{ route('contact') }}"
                   class="text-zinc-600 hover:text-primary-600 transition-colors {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">
                    Contacto
                </a>
            </div>

            {{-- CTA / Auth links --}}
            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-sm font-medium px-4 py-2 rounded-md bg-primary-600 text-white hover:bg-primary-700 transition-colors">
                        Mi cuenta
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-zinc-600 hover:text-zinc-900 transition-colors">
                        Iniciar sesión
                    </a>
                @endauth
            </div>

            {{-- Mobile menu toggle --}}
            <button
                @click="open = !open"
                class="md:hidden p-2 rounded-md text-zinc-500 hover:text-zinc-700 hover:bg-zinc-100 transition-colors"
                :aria-expanded="open"
                aria-label="Abrir menú"
            >
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition class="md:hidden border-t border-zinc-100 bg-white">
        <div class="px-4 py-3 space-y-1 text-sm font-medium">
            <a href="{{ route('home') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Inicio</a>
            <a href="{{ route('about') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Nosotros</a>
            <a href="{{ route('programs') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Becas</a>
            <a href="{{ route('internships') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Prácticas</a>
            <a href="{{ route('donate') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Donar</a>
            <a href="{{ route('contact') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Contacto</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 text-primary-600 font-semibold">Mi cuenta</a>
            @else
                <a href="{{ route('login') }}" class="block py-2 text-zinc-700 hover:text-primary-600">Iniciar sesión</a>
            @endauth
        </div>
    </div>
</nav>
