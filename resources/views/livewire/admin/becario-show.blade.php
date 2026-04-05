<div class="p-4 sm:p-6 max-w-5xl mx-auto space-y-6">

        {{-- Header --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.becarios.index') }}" wire:navigate class="p-2.5 -ml-2.5 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div class="flex items-center gap-3">
                <div class="h-12 w-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-bold text-lg">
                    {{ $user->initials() }}
                </div>
                <div>
                    <h1 class="text-xl font-bold text-zinc-900">{{ $user->name }}</h1>
                    <p class="text-zinc-400 text-sm">{{ $user->email }}</p>
                </div>
            </div>

            <div class="ml-auto">
                <flux:modal.trigger name="confirm-delete-becario">
                    <flux:button variant="danger" size="sm" icon="trash-2">Eliminar</flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Datos del becario --}}
            <div class="bg-white border border-zinc-200 rounded-xl p-6 space-y-4">
                <h2 class="text-sm font-semibold text-zinc-900">Información del Becario</h2>

                @php
                    $fields = [
                        ['label' => 'Teléfono',     'value' => $user->phone],
                        ['label' => 'Identidad',    'value' => $user->national_id],
                        ['label' => 'Institución',  'value' => $user->institution],
                        ['label' => 'Carrera',      'value' => $user->career],
                    ];
                @endphp

                @foreach ($fields as $field)
                    <div>
                        <p class="text-xs text-zinc-400 mb-0.5">{{ $field['label'] }}</p>
                        <p class="text-sm font-medium text-zinc-800">{{ $field['value'] ?? '—' }}</p>
                    </div>
                @endforeach

                @if ($user->bio)
                    <div>
                        <p class="text-xs text-zinc-400 mb-0.5">Sobre mí</p>
                        <p class="text-sm text-zinc-700">{{ $user->bio }}</p>
                    </div>
                @endif

                <div class="pt-2 border-t border-zinc-100">
                    <p class="text-xs text-zinc-400">Perfil completado</p>
                    @php $pct = $user->profileCompletionPercentage(); @endphp
                    <div class="flex items-center gap-2 mt-1">
                        <div class="flex-1 h-1.5 bg-zinc-100 rounded-full">
                            <div class="h-1.5 bg-primary-600 rounded-full" style="width: {{ $pct }}%"></div>
                        </div>
                        <span class="text-xs font-medium text-zinc-700">{{ $pct }}%</span>
                    </div>
                </div>

                <div class="pt-2 border-t border-zinc-100">
                    <p class="text-xs text-zinc-400">Registrado</p>
                    <p class="text-sm font-medium text-zinc-800">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            {{-- Documentos --}}
            <div class="lg:col-span-2 space-y-4">
                <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
                    <div class="px-5 py-4 border-b border-zinc-100">
                        <h2 class="text-sm font-semibold text-zinc-900">Documentos ({{ $documents->count() }})</h2>
                    </div>

                    @if ($documents->isEmpty())
                        <div class="p-8 text-center">
                            <p class="text-zinc-400 text-sm">Este becario no ha subido documentos aún.</p>
                        </div>
                    @else
                        <div class="divide-y divide-zinc-100">
                            @foreach ($documents as $doc)
                            <div class="p-4">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <p class="font-medium text-zinc-800 text-sm">{{ $doc->title }}</p>
                                            <span class="px-2 py-0.5 rounded text-xs font-medium bg-zinc-100 text-zinc-600">{{ $doc->type_label }}</span>
                                        </div>
                                        @if ($doc->description)
                                            <p class="text-xs text-zinc-400 mt-1">{{ $doc->description }}</p>
                                        @endif
                                        <div class="flex items-center gap-3 mt-1.5 text-xs text-zinc-400">
                                            <span class="truncate max-w-[180px] sm:max-w-[250px]">{{ $doc->file_name }}</span>
                                            <span class="shrink-0">{{ $doc->file_size_formatted }}</span>
                                            <span class="shrink-0">{{ $doc->created_at->format('d/m/Y') }}</span>
                                        </div>
                                        @if ($doc->admin_notes)
                                            <div class="mt-2 bg-primary-50 rounded px-2.5 py-1.5 text-xs text-primary-600">
                                                <span class="font-semibold">Nota:</span> {{ $doc->admin_notes }}
                                            </div>
                                        @endif
                                        @if ($doc->reviewed_at)
                                            <p class="mt-1 text-xs text-zinc-400">Revisado el {{ $doc->reviewed_at->format('d/m/Y') }}
                                                @if ($doc->reviewer) por {{ $doc->reviewer->name }} @endif
                                            </p>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-2 shrink-0">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                            {{ $doc->status === 'aprobado'  ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $doc->status === 'pendiente' ? 'bg-secondary-100 text-secondary-600' : '' }}
                                            {{ $doc->status === 'rechazado' ? 'bg-red-100 text-red-700' : '' }}
                                        ">{{ $doc->status_label }}</span>
                                        <button wire:click="startReview({{ $doc->id }})"
                                            class="text-xs font-medium text-zinc-500 hover:text-primary-600 transition">
                                            Revisar
                                        </button>
                                    </div>
                                </div>

                                {{-- Panel de revisión inline --}}
                                @if ($reviewingDocId === $doc->id)
                                <div class="mt-3 pt-3 border-t border-zinc-100">
                                    <p class="text-xs font-semibold text-zinc-700 mb-2">Actualizar revisión</p>
                                    <div class="grid gap-3">
                                        <select wire:model="reviewStatus"
                                            class="w-full sm:w-auto border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                            <option value="aprobado">Aprobado</option>
                                            <option value="rechazado">Rechazado</option>
                                        </select>
                                        <input wire:model="adminNotes" type="text" placeholder="Nota para el becario (opcional)"
                                            class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                        <div class="flex gap-3">
                                            <button wire:click="saveReview"
                                                class="px-4 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
                                                Guardar
                                            </button>
                                            <button wire:click="cancelReview"
                                                class="px-4 py-2.5 bg-zinc-100 text-zinc-700 text-sm font-semibold rounded-lg hover:bg-zinc-200 transition">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Modal de confirmación para eliminar becario --}}
        <flux:modal name="confirm-delete-becario" focusable class="max-w-md">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">¿Eliminar a {{ $user->name }}?</flux:heading>
                    <flux:subheading class="mt-2">
                        Esta acción eliminará permanentemente la cuenta del becario, junto con todos sus documentos y datos asociados. Esta operación no se puede deshacer.
                    </flux:subheading>
                </div>

                <div class="flex justify-end gap-2">
                    <flux:modal.close>
                        <flux:button variant="filled">Cancelar</flux:button>
                    </flux:modal.close>

                    <flux:button variant="danger" wire:click="deleteBecario">Eliminar becario</flux:button>
                </div>
            </div>
        </flux:modal>
    </div>
</div>
