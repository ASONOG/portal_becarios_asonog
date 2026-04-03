<div class="p-4 sm:p-6 max-w-6xl mx-auto space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Panel de Administración</h1>
            <p class="text-zinc-500 text-sm mt-1">Gestión y seguimiento de becarios ASONOG.</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Total Becarios</p>
                <p class="text-3xl font-bold text-zinc-900">{{ $totalBecarios }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Documentos</p>
                <p class="text-3xl font-bold text-zinc-900">{{ $totalDocs }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Pendientes</p>
                <p class="text-3xl font-bold text-secondary-600">{{ $pendientes }}</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-5">
                <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Aprobados</p>
                <p class="text-3xl font-bold text-green-600">{{ $aprobados }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Últimos becarios --}}
            <div class="bg-white border border-zinc-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-zinc-900">Becarios Recientes</h2>
                    <a href="{{ route('admin.becarios.index') }}" wire:navigate class="text-xs text-primary-600 hover:underline">Ver todos →</a>
                </div>
                <div class="divide-y divide-zinc-100">
                    @forelse ($recentBecarios as $becario)
                        <div class="py-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-semibold text-xs">
                                    {{ $becario->initials() }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-800">{{ $becario->name }}</p>
                                    <p class="text-xs text-zinc-400">{{ $becario->institution ?? 'Sin institución' }}</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.becarios.show', $becario) }}" wire:navigate class="text-xs text-primary-600 hover:underline">Ver</a>
                        </div>
                    @empty
                        <p class="text-sm text-zinc-400 py-4">No hay becarios registrados aún.</p>
                    @endforelse
                </div>
            </div>

            {{-- Documentos pendientes --}}
            <div class="bg-white border border-zinc-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-zinc-900">Documentos Pendientes</h2>
                    <a href="{{ route('admin.documents.index') }}" wire:navigate class="text-xs text-primary-600 hover:underline">Revisar todos →</a>
                </div>
                <div class="divide-y divide-zinc-100">
                    @forelse ($pendingDocs as $doc)
                        <div class="py-3 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-zinc-800">{{ $doc->title }}</p>
                                <p class="text-xs text-zinc-400">{{ $doc->user->name }} · {{ $doc->type_label }}</p>
                            </div>
                            <span class="px-2 py-0.5 bg-secondary-100 text-secondary-600 text-xs rounded-full font-medium">Pendiente</span>
                        </div>
                    @empty
                        <p class="text-sm text-zinc-400 py-4">No hay documentos pendientes. ✓</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Acciones rápidas --}}
        <div class="bg-white border border-zinc-200 rounded-xl p-6">
            <h2 class="text-base font-semibold text-zinc-900 mb-4">Acciones Rápidas</h2>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.becarios.index') }}" wire:navigate
                   class="flex items-center gap-2 px-4 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Gestionar Becarios
                </a>
                <a href="{{ route('admin.documents.index') }}" wire:navigate
                   class="flex items-center gap-2 px-4 py-2.5 bg-white text-zinc-700 text-sm font-medium rounded-lg border border-zinc-300 hover:bg-zinc-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Revisar Documentos
                </a>
            </div>
        </div>
    </div>
</div>
