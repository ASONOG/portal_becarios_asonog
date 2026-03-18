<div class="p-6 max-w-4xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-zinc-900">Mis Solicitudes</h1>
        <p class="text-zinc-500 text-sm mt-1">Sube los archivos que el administrador ha solicitado.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Solicitudes activas --}}
    <div class="space-y-4">
        <h2 class="text-sm font-semibold text-zinc-700 uppercase tracking-wide">Solicitudes Activas</h2>

        @forelse ($assignments as $assignment)
            @php $submission = $assignment->documents->first() @endphp
            <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
                {{-- Cabecera de la solicitud --}}
                <div class="px-5 py-4 flex items-start justify-between gap-4 flex-wrap">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <p class="font-semibold text-zinc-800">{{ $assignment->title }}</p>
                            <span class="text-xs px-2 py-0.5 bg-zinc-100 text-zinc-600 rounded font-medium">
                                {{ $assignment->type_label }}
                            </span>
                        </div>
                        @if ($assignment->description)
                            <p class="text-sm text-zinc-500 mt-1">{{ $assignment->description }}</p>
                        @endif
                        @if ($assignment->due_date)
                            <p class="text-xs mt-1.5 {{ $assignment->isOverdue() ? 'text-red-600 font-medium' : 'text-zinc-400' }}">
                                Fecha límite: {{ $assignment->due_date->format('d/m/Y') }}
                                @if ($assignment->isOverdue()) · Vencida @endif
                            </p>
                        @endif
                    </div>

                    <div class="shrink-0">
                        @if ($submission)
                            <span class="px-3 py-1.5 rounded-full text-xs font-semibold
                                {{ $submission->status === 'aprobado'  ? 'bg-green-100 text-green-700' : '' }}
                                {{ $submission->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                                {{ $submission->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                                {{ $submission->status === 'revisado'  ? 'bg-primary-100 text-primary-600' : '' }}
                            ">{{ $submission->status_label }}</span>
                        @else
                            <button wire:click="openUpload({{ $assignment->id }})"
                                class="flex items-center gap-1.5 px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                Subir archivo
                            </button>
                        @endif
                    </div>
                </div>

                {{-- Detalle de entrega existente --}}
                @if ($submission)
                    <div class="px-5 py-3 border-t border-zinc-100 bg-zinc-50 flex items-center justify-between gap-3 flex-wrap">
                        <div class="flex items-center gap-2 text-sm text-zinc-600">
                            <svg class="w-4 h-4 text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="truncate max-w-55">{{ $submission->file_name }}</span>
                            <span class="text-zinc-400">·</span>
                            <span class="text-zinc-400 text-xs">{{ $submission->file_size_formatted }}</span>
                            <span class="text-zinc-400">·</span>
                            <span class="text-zinc-400 text-xs">{{ $submission->created_at->format('d/m/Y') }}</span>
                        </div>
                        @if ($submission->admin_notes)
                            <p class="text-xs text-primary-600 bg-primary-50 px-2.5 py-1 rounded">
                                <span class="font-semibold">Nota:</span> {{ $submission->admin_notes }}
                            </p>
                        @endif
                        @if ($submission->status === 'pendiente')
                            <button wire:click="deleteSubmission({{ $submission->id }})"
                                wire:confirm="¿Eliminar esta entrega? Podrás subir el archivo nuevamente."
                                class="text-xs text-red-500 hover:text-red-700 transition">
                                Eliminar entrega
                            </button>
                        @endif
                    </div>
                @endif

                {{-- Formulario de subida inline --}}
                @if ($activeAssignmentId === $assignment->id)
                    <div class="px-5 py-4 border-t border-primary-100 bg-primary-50">
                        <form wire:submit="submit" class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">
                                    Archivo *
                                    <span class="text-zinc-400 font-normal">(PDF, Word, JPG/PNG — máx. 5MB)</span>
                                </label>
                                <input wire:model="file" type="file"
                                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                    class="w-full text-sm text-zinc-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-white file:text-primary-600 hover:file:bg-primary-50">
                                @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                <div wire:loading wire:target="file" class="mt-1 text-xs text-primary-600">Cargando archivo...</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Notas (opcional)</label>
                                <textarea wire:model="notes" rows="2"
                                    placeholder="Observaciones adicionales..."
                                    class="w-full border border-zinc-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="submit"
                                    class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition"
                                    wire:loading.attr="disabled" wire:target="submit">
                                    <span wire:loading.remove wire:target="submit">Enviar archivo</span>
                                    <span wire:loading wire:target="submit">Enviando...</span>
                                </button>
                                <button type="button" wire:click="cancelUpload"
                                    class="px-4 py-2 bg-white text-zinc-700 text-sm font-semibold rounded-lg border border-zinc-300 hover:bg-zinc-50 transition">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-white border border-zinc-200 rounded-xl p-10 text-center">
                <svg class="mx-auto h-12 w-12 text-zinc-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-zinc-500 text-sm font-medium">No hay solicitudes activas en este momento</p>
                <p class="text-zinc-400 text-xs mt-1">El administrador publicará aquí las solicitudes cuando las cree</p>
            </div>
        @endforelse
    </div>

    {{-- Historial de entregas --}}
    @if ($submissions->isNotEmpty())
    <div class="space-y-4">
        <h2 class="text-sm font-semibold text-zinc-700 uppercase tracking-wide">Historial de Entregas</h2>
        <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 border-b border-zinc-200">
                    <tr>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Solicitud</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Archivo</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden sm:table-cell">Fecha</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @foreach ($submissions as $sub)
                    <tr class="hover:bg-zinc-50 transition">
                        <td class="px-4 py-3">
                            <p class="font-medium text-zinc-800">{{ $sub->title }}</p>
                            @if ($sub->admin_notes)
                                <p class="text-xs text-primary-600 mt-0.5">
                                    <span class="font-semibold">Nota:</span> {{ $sub->admin_notes }}
                                </p>
                            @endif
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell text-zinc-500 text-xs">
                            {{ $sub->file_name }} · {{ $sub->file_size_formatted }}
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell text-zinc-400 text-xs">
                            {{ $sub->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                {{ $sub->status === 'aprobado'  ? 'bg-green-100 text-green-700' : '' }}
                                {{ $sub->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                                {{ $sub->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                                {{ $sub->status === 'revisado'  ? 'bg-primary-100 text-primary-600' : '' }}
                            ">{{ $sub->status_label }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
