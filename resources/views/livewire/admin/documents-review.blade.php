<div class="p-6 max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Revisión de Documentos</h1>
            <p class="text-zinc-500 text-sm mt-1">Revisa y aprueba los documentos subidos por los becarios.</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-zinc-200 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-zinc-900">{{ $counts['total'] }}</p>
                <p class="text-xs text-zinc-500 mt-0.5">Total</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-secondary-600">{{ $counts['pendiente'] }}</p>
                <p class="text-xs text-zinc-500 mt-0.5">Pendientes</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-600">{{ $counts['aprobado'] }}</p>
                <p class="text-xs text-zinc-500 mt-0.5">Aprobados</p>
            </div>
            <div class="bg-white border border-zinc-200 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-red-600">{{ $counts['rechazado'] }}</p>
                <p class="text-xs text-zinc-500 mt-0.5">Rechazados</p>
            </div>
        </div>

        {{-- Filtros --}}
        <div class="bg-white border border-zinc-200 rounded-xl p-4 flex flex-wrap gap-3">
            <div>
                <label class="text-xs text-zinc-500 block mb-1">Estado</label>
                <select wire:model.live="statusFilter"
                    class="border border-zinc-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option value="">Todos los estados</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="aprobado">Aprobado</option>
                    <option value="rechazado">Rechazado</option>
                </select>
            </div>
            <div>
                <label class="text-xs text-zinc-500 block mb-1">Solicitud</label>
                <select wire:model.live="assignmentFilter"
                    class="border border-zinc-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option value="">Todas las solicitudes</option>
                    @foreach ($assignments as $a)
                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabla --}}
        <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
            @if ($documents->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-zinc-400 text-sm">No hay documentos con los filtros seleccionados.</p>
                </div>
            @else
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 border-b border-zinc-200">
                        <tr>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Becario</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Solicitud</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden sm:table-cell">Archivo</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @foreach ($documents as $doc)
                        <tr class="hover:bg-zinc-50 transition">
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.becarios.show', $doc->user) }}" wire:navigate class="font-medium text-primary-600 hover:underline">
                                    {{ $doc->user->name }}
                                </a>
                                <p class="text-xs text-zinc-400">{{ $doc->user->email }}</p>
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <p class="text-sm text-zinc-700">{{ $doc->assignment?->title ?? $doc->title }}</p>
                                <p class="text-xs text-zinc-400">{{ $doc->created_at->format('d/m/Y') }}</p>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell text-xs text-zinc-500">
                                <a href="{{ $doc->download_url }}" target="_blank"
                                    class="inline-flex items-center gap-1 text-primary-600 hover:underline font-medium">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    {{ $doc->file_name }}
                                </a>
                                <p class="text-zinc-400 mt-0.5">{{ $doc->file_size_formatted }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $doc->status === 'aprobado'  ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $doc->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                                    {{ $doc->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                                ">{{ $doc->status_label }}</span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <button wire:click="startReview({{ $doc->id }})"
                                    class="text-xs font-medium text-primary-600 hover:underline">
                                    Revisar
                                </button>
                            </td>
                        </tr>

                        {{-- Panel de revisión --}}
                        @if ($reviewingDocId === $doc->id)
                        <tr class="bg-primary-50">
                            <td colspan="5" class="px-4 py-3">
                                <div class="flex flex-wrap items-center gap-3">
                                    <p class="text-xs font-semibold text-zinc-700">Revisando: {{ $doc->title }}</p>
                                    <select wire:model="reviewStatus"
                                        class="border border-zinc-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                        <option value="aprobado">Aprobado</option>
                                        <option value="rechazado">Rechazado</option>
                                    </select>
                                    <input wire:model="adminNotes" type="text" placeholder="Nota para el becario (opcional)"
                                        class="flex-1 min-w-50 border border-zinc-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    <button wire:click="saveReview"
                                        wire:loading.attr="disabled" wire:target="saveReview"
                                        class="px-4 py-1.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition disabled:opacity-50">
                                        <span wire:loading.remove wire:target="saveReview">Guardar</span>
                                        <span wire:loading wire:target="saveReview">Guardando...</span>
                                    </button>
                                    <button wire:click="cancelReview"
                                        class="px-4 py-1.5 bg-zinc-200 text-zinc-700 text-sm font-semibold rounded-lg hover:bg-zinc-300 transition">
                                        Cancelar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                @if ($documents->hasPages())
                    <div class="px-4 py-3 border-t border-zinc-100">
                        {{ $documents->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
