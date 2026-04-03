<div class="p-4 sm:p-6 max-w-5xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Solicitudes de Documentos</h1>
            <p class="text-zinc-500 text-sm mt-1">Crea solicitudes para que los becarios suban sus archivos.</p>
        </div>
        <button wire:click="openCreate"
            class="flex items-center gap-2 px-4 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nueva Solicitud
        </button>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de nueva solicitud --}}
    @if ($showForm)
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 mb-4">{{ $editingId ? 'Editar Solicitud' : 'Nueva Solicitud' }}</h2>
        <form wire:submit="{{ $editingId ? 'update' : 'save' }}" class="space-y-4">

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Título *</label>
                <input wire:model="title" type="text"
                    placeholder="Ej: Informe mensual de marzo 2026"
                    class="w-full border {{ $errors->has('title') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 ">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Tipo *</label>
                    <select wire:model="type"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="informe">Informe</option>
                        <option value="documento">Documento</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Fecha límite</label>
                    <input wire:model="due_date" type="date"
                        class="w-full border {{ $errors->has('due_date') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 ">
                    <p class="text-xs text-zinc-400 mt-1">Los becarios pueden enviar hasta las 23:59 de este día.</p>
                    @error('due_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Descripción / Instrucciones</label>
                <textarea wire:model="description" rows="3"
                    placeholder="Describe qué debe enviar el becario..."
                    class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition"
                    wire:loading.attr="disabled" wire:target="{{ $editingId ? 'update' : 'save' }}">
                    <span wire:loading.remove wire:target="{{ $editingId ? 'update' : 'save' }}">{{ $editingId ? 'Guardar cambios' : 'Crear solicitud' }}</span>
                    <span wire:loading wire:target="{{ $editingId ? 'update' : 'save' }}">{{ $editingId ? 'Guardando...' : 'Creando...' }}</span>
                </button>
                <button type="button" wire:click="cancelEdit"
                    class="px-5 py-2.5 bg-zinc-100 text-zinc-700 text-sm font-semibold rounded-lg hover:bg-zinc-200 transition">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
    @endif

    {{-- Lista de solicitudes --}}
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
        @if ($assignments->isEmpty())
            <div class="p-10 text-center">
                <svg class="mx-auto h-12 w-12 text-zinc-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-zinc-500 text-sm font-medium">No hay solicitudes creadas aún</p>
                <p class="text-zinc-400 text-xs mt-1">Usa el botón "Nueva Solicitud" para comenzar</p>
            </div>
        @else
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 border-b border-zinc-200">
                    <tr>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Solicitud</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden sm:table-cell">Tipo</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Fecha Límite</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden sm:table-cell">Entregas</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @foreach ($assignments as $assignment)
                    <tr class="hover:bg-zinc-50 transition">
                        <td class="px-4 py-3">
                            <p class="font-medium text-zinc-800">{{ $assignment->title }}</p>
                            @if ($assignment->description)
                                <p class="text-xs text-zinc-400 mt-0.5 truncate max-w-70">{{ $assignment->description }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell text-zinc-600 text-xs">
                            {{ $assignment->type_label }}
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell text-xs">
                            @if ($assignment->due_date)
                                <span class="{{ $assignment->isOverdue() ? 'text-red-600 font-medium' : 'text-zinc-500' }}">
                                    {{ $assignment->due_date->format('d/m/Y') }}
                                    @if ($assignment->isOverdue()) · Vencida @endif
                                </span>
                            @else
                                <span class="text-zinc-400">Sin límite</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <span class="px-2.5 py-1 bg-zinc-100 text-zinc-700 rounded-full text-xs font-medium">
                                {{ $assignment->documents_count }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                {{ $assignment->status === 'activa' ? 'bg-green-100 text-green-700' : 'bg-zinc-100 text-zinc-500' }}">
                                {{ $assignment->status_label }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-end sm:gap-3">
                                <button wire:click="edit({{ $assignment->id }})"
                                    class="text-xs font-medium text-zinc-500 hover:text-primary-600 transition">
                                    Editar
                                </button>
                                <button wire:click="toggleStatus({{ $assignment->id }})"
                                    wire:confirm="{{ $assignment->status === 'activa' ? '¿Cerrar esta solicitud? Los becarios ya no podrán enviar archivos.' : '¿Reabrir esta solicitud? Los becarios podrán enviar archivos de nuevo.' }}"
                                    class="text-xs font-medium text-zinc-500 hover:text-primary-600 transition">
                                    {{ $assignment->status === 'activa' ? 'Cerrar' : 'Reabrir' }}
                                </button>
                                <button wire:click="delete({{ $assignment->id }})"
                                    wire:confirm="¿Eliminar esta solicitud? Se perderán las entregas asociadas."
                                    class="text-xs text-red-500 hover:text-red-700 transition">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
