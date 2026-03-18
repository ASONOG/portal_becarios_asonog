<div class="p-6 max-w-5xl mx-auto space-y-6">

        {{-- Bienvenida --}}
        <div class="flex items-start justify-between flex-wrap gap-3">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900">Hola, {{ auth()->user()->name }} 👋</h1>
                <p class="text-zinc-500 text-sm mt-1">Bienvenido a tu portal de becas ASONOG.</p>
            </div>
            <span class="flex items-center gap-1.5 bg-secondary-50 border border-secondary-200 text-secondary-600 text-xs font-medium px-3 py-1.5 rounded-full">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                Convocatoria 2026 abierta
            </span>
        </div>

        {{-- Tarjetas de estado --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-3">Estado de Solicitud</p>
                <p class="text-xl font-bold text-zinc-800">Sin solicitud</p>
                <p class="text-xs text-zinc-400 mt-1">No has iniciado una solicitud aún</p>
            </div>

            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-3">Perfil Completado</p>
                <p class="text-xl font-bold text-zinc-800">{{ $completion }}%</p>
                <div class="mt-2">
                    <div class="h-1.5 w-full bg-zinc-100 rounded-full">
                        <div class="h-1.5 bg-primary-600 rounded-full transition-all" style="width: {{ $completion }}%"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-3">Cierre Convocatoria</p>
                <p class="text-xl font-bold text-zinc-800">30 Abr 2026</p>
                <p class="text-xs text-zinc-400 mt-1">Quedan 44 días para aplicar</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Próximos pasos --}}
            <div class="lg:col-span-2 bg-white border border-zinc-200 rounded-xl p-6">
                <h2 class="text-sm font-semibold text-zinc-900 mb-4">Próximos Pasos</h2>
                <div class="space-y-4">
                    {{-- Paso 1: completado --}}
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 h-5 w-5 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-800">Crear cuenta</p>
                            <p class="text-xs text-zinc-400">Completado</p>
                        </div>
                    </div>

                    {{-- Paso 2: perfil --}}
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 h-5 w-5 rounded-full {{ $completion >= 100 ? 'bg-green-100' : 'bg-primary-100' }} flex items-center justify-center shrink-0">
                            @if ($completion >= 100)
                                <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            @else
                                <span class="text-primary-600 font-bold text-xs">2</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-800">Completar tu perfil</p>
                            <p class="text-xs text-zinc-400">Agrega tu información personal, institución y datos de contacto</p>
                            <a href="{{ route('profile.edit') }}" wire:navigate class="mt-1.5 inline-block text-xs text-primary-600 font-medium hover:underline">
                                {{ $completion >= 100 ? 'Ver perfil' : 'Completar perfil' }} →
                            </a>
                        </div>
                    </div>

                    {{-- Paso 3: documentos --}}
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 h-5 w-5 rounded-full bg-zinc-100 flex items-center justify-center shrink-0">
                            <span class="text-zinc-400 font-bold text-xs">3</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-700">Subir documentos requeridos</p>
                            <p class="text-xs text-zinc-400">Informes, certificados y asignaciones.</p>
                            <a href="{{ route('becario.documents') }}" wire:navigate class="mt-1.5 inline-block text-xs text-primary-600 font-medium hover:underline">Ir a mis documentos →</a>
                        </div>
                    </div>

                    {{-- Paso 4 --}}
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 h-5 w-5 rounded-full bg-zinc-100 flex items-center justify-center shrink-0">
                            <span class="text-zinc-400 font-bold text-xs">4</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-zinc-400">Enviar solicitud de beca</p>
                            <p class="text-xs text-zinc-300">Disponible próximamente</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Panel lateral --}}
            <div class="space-y-4">
                <div class="bg-primary-600 rounded-xl p-5 text-white">
                    <p class="text-sm font-semibold mb-1">Convocatoria 2026</p>
                    <p class="text-xs text-primary-200 mb-4">Las becas ASONOG cubren matrícula, mensualidades y apoyo para materiales.</p>
                    <a href="{{ route('programs') }}" class="block w-full text-center bg-white text-primary-600 font-semibold text-sm py-2 rounded-lg hover:bg-primary-50 transition">
                        Ver programas
                    </a>
                </div>

                @if ($completion < 100)
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                    <div class="flex gap-2">
                        <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        <div>
                            <p class="text-xs font-semibold text-amber-800">Perfil incompleto</p>
                            <p class="text-xs text-amber-700 mt-0.5">Completa tu perfil para poder subir documentos y aplicar a una beca.</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="bg-white border border-zinc-200 rounded-xl p-4">
                    <p class="text-xs font-semibold text-zinc-700 mb-2">Documentos recientes</p>
                    @forelse ($docs as $doc)
                        <div class="flex items-center justify-between py-1.5 text-xs">
                            <span class="text-zinc-700 truncate max-w-35">{{ $doc->title }}</span>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium
                                {{ $doc->status === 'aprobado' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $doc->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                                {{ $doc->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                                {{ $doc->status === 'revisado' ? 'bg-primary-100 text-primary-600' : '' }}
                            ">{{ $doc->status_label }}</span>
                        </div>
                    @empty
                        <p class="text-xs text-zinc-400">Sin documentos aún.</p>
                    @endforelse
                    <a href="{{ route('becario.documents') }}" wire:navigate class="mt-2 block text-xs text-primary-600 font-medium hover:underline">Ver todos →</a>
                </div>
            </div>
        </div>
    </div>
</div>
