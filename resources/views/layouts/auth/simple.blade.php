<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased">

        <div class="min-h-screen flex">

            {{-- Panel izquierdo: branding --}}
            <div class="hidden lg:flex lg:w-1/2 xl:w-2/5 flex-col justify-between bg-linear-to-br from-primary-800 to-primary-600 text-white p-12 relative overflow-hidden">

                {{-- Fondo decorativo --}}
                <div class="absolute inset-0 opacity-10 pointer-events-none select-none"
                     style="background-image: radial-gradient(circle at 70% 40%, white 1px, transparent 1px); background-size: 32px 32px;"></div>

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 relative z-10">
                    <span class="flex items-center justify-center w-10 h-10 rounded-xl bg-white/20 text-white font-bold text-lg select-none">A</span>
                    <span class="font-bold text-xl tracking-tight">ASONOG</span>
                </a>

                {{-- Contenido central --}}
                <div class="relative z-10 space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold leading-snug mb-3">
                            Invirtiendo en el<br>futuro de Honduras
                        </h2>
                        <p class="text-primary-200 text-base leading-relaxed">
                            Portal de becas educativas para jóvenes hondureños con
                            necesidad económica. Aplica en minutos desde cualquier lugar.
                        </p>
                    </div>

                    {{-- Features --}}
                    <ul class="space-y-4">
                        @foreach([
                            ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => 'Proceso 100% en línea y gratuito'],
                            ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'text' => 'Tu información siempre segura'],
                            ['icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'text' => 'Seguimiento en tiempo real de tu solicitud'],
                        ] as $f)
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}"/>
                            </svg>
                            <span class="text-sm text-primary-100">{{ $f['text'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Footer del panel --}}
                <p class="text-primary-300 text-xs relative z-10">
                    &copy; {{ date('Y') }} ASONOG &mdash; Asociación de Organismos No Gubernamentales de Honduras
                </p>
            </div>

            {{-- Panel derecho: formulario --}}
            <div class="flex flex-1 flex-col justify-center items-center px-6 py-12 sm:px-12">

                {{-- Logo móvil (solo visible en mobile) --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-10 lg:hidden">
                    <span class="flex items-center justify-center w-9 h-9 rounded-lg bg-primary-600 text-white font-bold">A</span>
                    <span class="font-bold text-zinc-900">ASONOG</span>
                </a>

                <div class="w-full max-w-sm">
                    {{ $slot }}
                </div>
            </div>

        </div>

        @fluxScripts
    </body>
</html>
