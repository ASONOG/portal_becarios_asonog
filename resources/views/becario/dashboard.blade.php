<div class="p-4 sm:p-6 max-w-5xl mx-auto space-y-6">

        {{-- Bienvenida --}}
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Hola, {{ auth()->user()->name }} 👋</h1>
            <p class="text-zinc-500 text-sm mt-1">Bienvenido al portal de gestión ASONOG.</p>
        </div>

        {{-- Tarjetas de resumen --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-zinc-200 border-l-4 border-l-primary-500 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-1">Solicitudes Activas</p>
                <p class="text-3xl font-bold text-zinc-800">{{ $activeRequests }}</p>
                <p class="text-xs text-zinc-400 mt-1">Requerimientos por atender</p>
            </div>

            <div class="bg-white border border-zinc-200 border-l-4 border-l-secondary-500 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-1">Entregas Pendientes</p>
                <p class="text-3xl font-bold text-secondary-600">{{ $pendingCount }}</p>
                <p class="text-xs text-zinc-400 mt-1">Documentos en revisión</p>
            </div>

            <div class="bg-white border border-zinc-200 border-l-4 border-l-green-500 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-1">Entregas Aprobadas</p>
                <p class="text-3xl font-bold text-green-600">{{ $approvedCount }}</p>
                <p class="text-xs text-zinc-400 mt-1">Documentos aprobados</p>
            </div>

            @if ($completion < 100)
            <div class="bg-white border border-zinc-200 border-l-4 border-l-zinc-400 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-1">Perfil Completado</p>
                <p class="text-3xl font-bold text-zinc-800">{{ $completion }}%</p>
                <div class="mt-2">
                    <div class="h-1.5 w-full bg-zinc-100 rounded-full">
                        <div class="h-1.5 bg-primary-600 rounded-full transition-all" style="width: {{ $completion }}%"></div>
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white border border-zinc-200 border-l-4 border-l-zinc-400 rounded-xl p-5">
                <p class="text-xs font-medium text-zinc-500 uppercase tracking-wide mb-1">Total de Entregas</p>
                <p class="text-3xl font-bold text-zinc-800">{{ $totalDocs }}</p>
                <p class="text-xs text-zinc-400 mt-1">Documentos enviados</p>
            </div>
            @endif
        </div>

        {{-- Contenido principal --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Documentos recientes (área principal) --}}
            <div class="lg:col-span-2 bg-white border border-zinc-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-zinc-900">Documentos Recientes</h2>
                    <a href="{{ route('becario.documents') }}" wire:navigate class="text-xs text-primary-600 font-medium hover:underline px-2 py-1.5 -mr-2 rounded-lg">Ver todos →</a>
                </div>

                @forelse ($docs as $doc)
                    <div class="flex items-center justify-between py-3 {{ !$loop->last ? 'border-b border-zinc-100' : '' }}">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="shrink-0 h-9 w-9 rounded-lg {{ $doc->status === 'aprobado' ? 'bg-green-100' : ($doc->status === 'rechazado' ? 'bg-red-100' : 'bg-zinc-100') }} flex items-center justify-center">
                                <svg class="w-4 h-4 {{ $doc->status === 'aprobado' ? 'text-green-600' : ($doc->status === 'rechazado' ? 'text-red-600' : 'text-zinc-400') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-zinc-800 truncate">{{ $doc->title }}</p>
                                <p class="text-xs text-zinc-400">{{ $doc->created_at->format('d/m/Y') }} · {{ $doc->file_size_formatted }}</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-xs font-medium shrink-0
                            {{ $doc->status === 'aprobado'  ? 'bg-green-100 text-green-700' : '' }}
                            {{ $doc->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                            {{ $doc->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                            {{ $doc->status === 'revisado'  ? 'bg-primary-100 text-primary-600' : '' }}
                        ">{{ $doc->status_label }}</span>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="mx-auto h-10 w-10 text-zinc-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-sm text-zinc-400">Aún no has enviado documentos</p>
                        <a href="{{ route('becario.documents') }}" wire:navigate class="mt-2 inline-block text-xs text-primary-600 font-medium hover:underline">Ir a mis solicitudes →</a>
                    </div>
                @endforelse
            </div>

            {{-- Panel lateral --}}
            <div class="space-y-4">

                {{-- Accesos rápidos --}}
                <div class="bg-white border border-zinc-200 rounded-xl p-5">
                    <h2 class="text-base font-semibold text-zinc-900 mb-4">Acciones</h2>
                    <div class="space-y-3">
                        <a href="{{ route('becario.documents') }}" wire:navigate
                           class="flex items-center gap-3 p-3 rounded-lg bg-primary-50 hover:bg-primary-100 transition group">
                            <div class="h-8 w-8 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-zinc-800 group-hover:text-primary-700">Mis Solicitudes</p>
                                <p class="text-xs text-zinc-400">Ver y subir entregas</p>
                            </div>
                        </a>
                        <a href="{{ route('profile.edit') }}" wire:navigate
                           class="flex items-center gap-3 p-3 rounded-lg bg-zinc-50 hover:bg-zinc-100 transition group">
                            <div class="h-8 w-8 rounded-lg bg-zinc-600 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-zinc-800 group-hover:text-zinc-900">Mi Perfil</p>
                                <p class="text-xs text-zinc-400">{{ $completion >= 100 ? 'Ver información' : 'Completar perfil' }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                @if ($completion < 100)
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                    <div class="flex gap-2">
                        <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        <div>
                            <p class="text-xs font-semibold text-amber-800">Perfil incompleto</p>
                            <p class="text-xs text-amber-700 mt-0.5">Completa tu perfil para poder gestionar documentos y entregas.</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
