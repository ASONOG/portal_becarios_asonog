<div class="p-4 sm:p-6 max-w-6xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-zinc-900">Revisión de Documentos</h1>
        <p class="text-zinc-500 text-sm mt-1">Revisa las entregas de los becarios, organizadas por solicitud.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Total</p>
            <p class="text-3xl font-bold text-zinc-900">{{ $counts['total'] }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Pendientes</p>
            <p class="text-3xl font-bold text-secondary-600">{{ $counts['pendiente'] }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Aprobados</p>
            <p class="text-3xl font-bold text-green-600">{{ $counts['aprobado'] }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Rechazados</p>
            <p class="text-3xl font-bold text-red-600">{{ $counts['rechazado'] }}</p>
        </div>
    </div>

    {{-- Filtro --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-4 flex flex-wrap gap-3">
        <div>
            <label class="text-xs text-zinc-500 block mb-1">Solicitud</label>
            <select wire:model.live="assignmentFilter"
                class="border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="">Todas las solicitudes</option>
                @foreach ($allAssignments as $a)
                    <option value="{{ $a->id }}">{{ $a->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Lista de solicitudes --}}
    @forelse ($assignments as $assignment)
        <a href="{{ route('admin.documents.show', $assignment) }}" wire:navigate
            class="block bg-white border border-zinc-200 rounded-xl hover:border-primary-300 hover:shadow-sm transition"
            wire:key="assignment-{{ $assignment->id }}">
            <div class="flex items-center justify-between px-5 py-4">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 flex-wrap">
                        <h2 class="text-base font-semibold text-zinc-900">{{ $assignment->title }}</h2>
                        <span
                            class="px-2 py-0.5 rounded-full text-xs font-medium
                            {{ $assignment->status === 'activa' ? 'bg-green-100 text-green-700' : 'bg-zinc-100 text-zinc-500' }}">
                            {{ $assignment->status_label }}
                        </span>
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-zinc-100 text-zinc-600">
                            {{ $assignment->type_label }}
                        </span>
                    </div>
                    <div class="flex items-center gap-3 mt-1 text-xs text-zinc-400">
                        @if ($assignment->due_date)
                            <span class="{{ $assignment->isOverdue() ? 'text-red-500 font-medium' : '' }}">
                                Vence: {{ $assignment->due_date->format('d/m/Y') }}
                            </span>
                        @endif
                        <span>{{ $assignment->total_documents_count }}
                            {{ $assignment->total_documents_count === 1 ? 'entrega' : 'entregas' }}</span>
                        <span>de {{ $totalBecarios }} becarios</span>
                        @if ($assignment->pending_count > 0)
                            <span class="text-secondary-600 font-medium">{{ $assignment->pending_count }}
                                pendiente{{ $assignment->pending_count > 1 ? 's' : '' }}</span>
                        @endif
                    </div>
                </div>

                {{-- Barra de progreso mini --}}
                <div class="flex items-center gap-3 shrink-0 ml-4">
                    @php $pct = $totalBecarios > 0 ? round(($assignment->total_documents_count / $totalBecarios) * 100) : 0; @endphp
                    <div class="w-16 sm:w-24 h-1.5 bg-zinc-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary-500 rounded-full" style="width: {{ $pct }}%"></div>
                    </div>
                    <span class="text-xs text-zinc-400">{{ $pct }}%</span>
                    <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </a>
    @empty
        <div class="bg-white border border-zinc-200 rounded-xl p-10 text-center">
            <p class="text-zinc-400 text-sm">No hay solicitudes con los filtros seleccionados.</p>
        </div>
    @endforelse
</div>
