<div class="p-4 sm:p-6 max-w-5xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Galería de Fotos</h1>
            <p class="text-zinc-500 text-sm mt-1">Administra las fotos de la galería pública. Máximo {{ $limit }} fotos ({{ $count }}/{{ $limit }}).</p>
        </div>
        <button wire:click="openCreate"
            @if($count >= $limit) disabled @endif
            class="flex items-center gap-2 px-4 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Agregar Foto
        </button>
    </div>

    {{-- Capacity bar --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-4">
        <div class="flex items-center justify-between text-xs text-zinc-500 mb-1.5">
            <span>Capacidad utilizada</span>
            <span class="font-medium {{ $count >= $limit ? 'text-red-600' : 'text-zinc-700' }}">{{ $count }} / {{ $limit }}</span>
        </div>
        <div class="w-full bg-zinc-100 rounded-full h-2">
            <div class="h-2 rounded-full transition-all {{ $count >= $limit ? 'bg-red-500' : 'bg-primary-500' }}"
                 style="width: {{ min(($count / $limit) * 100, 100) }}%"></div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Formulario --}}
    @if ($showForm)
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 mb-4">{{ $editingId ? 'Editar Foto' : 'Nueva Foto' }}</h2>
        <form wire:submit="{{ $editingId ? 'update' : 'save' }}" class="space-y-4">

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Título *</label>
                <input wire:model="title" type="text"
                    placeholder="Ej: Ceremonia de becas 2025"
                    class="w-full border {{ $errors->has('title') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Categoría *</label>
                    <select wire:model="category"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        @foreach(\App\Models\GalleryPhoto::CATEGORY_LABELS as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Proporción *</label>
                    <select wire:model="size"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="landscape">Horizontal (3:2)</option>
                        <option value="portrait">Vertical (2:3)</option>
                        <option value="landscape-lg">Panorámica (16:10)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Descripción</label>
                <textarea wire:model="description" rows="2"
                    placeholder="Breve descripción de la foto..."
                    class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">{{ $editingId ? 'Reemplazar imagen (opcional)' : 'Imagen *' }}</label>
                <input wire:model="photo" type="file" accept="image/*,.heic,.heif"
                    class="w-full border {{ $errors->has('photo') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-primary-50 file:text-primary-600 file:text-xs file:font-semibold">
                <p class="text-xs text-zinc-400 mt-1">JPG, PNG, WebP o HEIC. Máximo 2 MB.</p>
                @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <div wire:loading wire:target="photo" class="text-xs text-primary-600 mt-1">Subiendo imagen...</div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition"
                    wire:loading.attr="disabled" wire:target="{{ $editingId ? 'update' : 'save' }}">
                    <span wire:loading.remove wire:target="{{ $editingId ? 'update' : 'save' }}">{{ $editingId ? 'Guardar cambios' : 'Agregar foto' }}</span>
                    <span wire:loading wire:target="{{ $editingId ? 'update' : 'save' }}">{{ $editingId ? 'Guardando...' : 'Agregando...' }}</span>
                </button>
                <button type="button" wire:click="cancelEdit"
                    class="px-5 py-2.5 bg-zinc-100 text-zinc-700 text-sm font-semibold rounded-lg hover:bg-zinc-200 transition">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
    @endif

    {{-- Grid de fotos --}}
    @if ($photos->isEmpty())
        <div class="bg-white border border-zinc-200 rounded-xl p-10 text-center">
            <svg class="mx-auto h-12 w-12 text-zinc-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z"/>
            </svg>
            <p class="text-zinc-500 text-sm font-medium">No hay fotos en la galería</p>
            <p class="text-zinc-400 text-xs mt-1">Usa el botón "Agregar Foto" para comenzar</p>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($photos as $galleryPhoto)
                <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
                    <div class="aspect-square overflow-hidden bg-zinc-100">
                        <img src="{{ $galleryPhoto->image_url }}"
                             alt="{{ $galleryPhoto->title }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <p class="text-sm font-medium text-zinc-800 truncate">{{ $galleryPhoto->title }}</p>
                        <div class="flex items-center justify-between mt-1.5">
                            <span class="text-xs px-2 py-0.5 rounded-full
                                {{ $galleryPhoto->is_active ? 'bg-green-100 text-green-700' : 'bg-zinc-100 text-zinc-500' }}">
                                {{ $galleryPhoto->is_active ? 'Visible' : 'Oculta' }}
                            </span>
                            <span class="text-xs text-zinc-400">{{ $galleryPhoto->category_label }}</span>
                        </div>
                        <div class="flex items-center gap-1.5 mt-2 pt-2 border-t border-zinc-100">
                            <button wire:click="edit({{ $galleryPhoto->id }})"
                                class="flex-1 px-2 py-1.5 bg-zinc-100 text-zinc-700 text-xs font-medium rounded-lg hover:bg-zinc-200 transition text-center">
                                Editar
                            </button>
                            <button wire:click="toggleActive({{ $galleryPhoto->id }})"
                                class="flex-1 px-2 py-1.5 bg-zinc-100 text-zinc-700 text-xs font-medium rounded-lg hover:bg-zinc-200 transition text-center">
                                {{ $galleryPhoto->is_active ? 'Ocultar' : 'Mostrar' }}
                            </button>
                            <button wire:click="delete({{ $galleryPhoto->id }})"
                                wire:confirm="¿Eliminar esta foto? Esta acción no se puede deshacer."
                                class="px-2 py-1.5 bg-red-50 text-red-600 text-xs font-medium rounded-lg hover:bg-red-100 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
