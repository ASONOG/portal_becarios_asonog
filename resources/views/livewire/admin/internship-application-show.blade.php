<div class="p-4 sm:p-6 max-w-4xl mx-auto space-y-6">

    {{-- Back link --}}
    <a href="{{ route('admin.internships.index') }}" wire:navigate
       class="inline-flex items-center gap-1 text-sm text-zinc-500 hover:text-zinc-700 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Volver a solicitudes
    </a>

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">{{ $application->full_name }}</h1>
            <p class="text-zinc-500 text-sm mt-0.5">Solicitud recibida el {{ $application->created_at->format('d/m/Y \a \l\a\s H:i') }}</p>
        </div>
        <div>
            @php
                $badgeClass = match($application->status) {
                    'aceptada'  => 'bg-green-100 text-green-700',
                    'rechazada' => 'bg-red-100 text-red-600',
                    'revisada'  => 'bg-blue-100 text-blue-700',
                    default     => 'bg-secondary-100 text-secondary-600',
                };
            @endphp
            <span class="px-3 py-1 text-sm font-medium rounded-full {{ $badgeClass }}">
                {{ $application->status_label }}
            </span>
        </div>
    </div>

    {{-- Flash --}}
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Datos Personales --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Datos Personales</h2>
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
            <div>
                <dt class="text-zinc-500">Nombre completo</dt>
                <dd class="font-medium text-zinc-800">{{ $application->full_name }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Correo electrónico</dt>
                <dd class="font-medium text-zinc-800">{{ $application->email }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Teléfono</dt>
                <dd class="font-medium text-zinc-800">{{ $application->phone ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Departamento</dt>
                <dd class="font-medium text-zinc-800">{{ $application->department }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Municipio</dt>
                <dd class="font-medium text-zinc-800">{{ $application->municipality ?? '—' }}</dd>
            </div>
        </dl>
    </div>

    {{-- Perfil Académico --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Perfil Académico</h2>
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
            <div>
                <dt class="text-zinc-500">Nivel académico</dt>
                <dd class="font-medium text-zinc-800">{{ $application->academic_level_label }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Institución</dt>
                <dd class="font-medium text-zinc-800">{{ $application->institution }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Carrera / Área</dt>
                <dd class="font-medium text-zinc-800">{{ $application->field_of_study }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Semestre / Año</dt>
                <dd class="font-medium text-zinc-800">{{ $application->semester ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Requiere convenio institucional</dt>
                <dd class="font-medium text-zinc-800">{{ $application->requires_agreement ? 'Sí' : 'No' }}</dd>
            </div>
        </dl>
    </div>

    {{-- Modalidad --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Modalidad de Vinculación</h2>
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
            <div>
                <dt class="text-zinc-500">Tipo de vinculación</dt>
                <dd class="font-medium text-zinc-800">{{ $application->type_label }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Disponibilidad</dt>
                <dd class="font-medium text-zinc-800">{{ $application->availability_label }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Disponible desde</dt>
                <dd class="font-medium text-zinc-800">{{ $application->available_from?->format('d/m/Y') ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Duración estimada</dt>
                <dd class="font-medium text-zinc-800">{{ $application->duration_label }}</dd>
            </div>
        </dl>
    </div>

    {{-- Motivación --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Motivación y Experiencia</h2>
        <dl class="space-y-4 text-sm">
            <div>
                <dt class="text-zinc-500 mb-1">¿Por qué desea realizar prácticas en ASONOG?</dt>
                <dd class="font-medium text-zinc-800 bg-zinc-50 rounded-lg p-3">{{ $application->motivation }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">Experiencia en trabajo comunitario</dt>
                <dd class="font-medium text-zinc-800">{{ $application->has_community_experience ? 'Sí' : 'No' }}</dd>
            </div>
            <div>
                <dt class="text-zinc-500">¿Cómo se enteró?</dt>
                <dd class="font-medium text-zinc-800">{{ $application->source_label }}</dd>
            </div>
        </dl>
    </div>

    {{-- CV --}}
    @if($application->cv_path)
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Documento Adjunto</h2>
        <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" rel="noopener noreferrer"
           class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-medium text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Descargar hoja de vida
        </a>
    </div>
    @endif

    {{-- Gestión del estado --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <h2 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Gestión de la Solicitud</h2>

        @if($application->reviewed_at)
        <p class="text-xs text-zinc-400 mb-4">
            Última revisión: {{ $application->reviewed_at->format('d/m/Y H:i') }}
            @if($application->reviewer)
                por {{ $application->reviewer->name }}
            @endif
        </p>
        @endif

        <form wire:submit="updateStatus" class="space-y-4">
            <div>
                <label for="status" class="block text-sm font-medium text-zinc-700 mb-1">Estado</label>
                <select wire:model="status" id="status"
                    class="w-full sm:w-64 px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 bg-white text-zinc-700">
                    @foreach(\App\Models\InternshipApplication::STATUSES as $val => $label)
                        <option value="{{ $val }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="admin_notes" class="block text-sm font-medium text-zinc-700 mb-1">Notas del administrador</label>
                <textarea wire:model="admin_notes" id="admin_notes" rows="3"
                    placeholder="Observaciones internas sobre esta solicitud..."
                    class="w-full px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 resize-none"></textarea>
                @error('admin_notes') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                    Guardar cambios
                </button>
                <button type="button" wire:click="deleteApplication" wire:confirm="¿Estás seguro de eliminar esta solicitud? Esta acción no se puede deshacer."
                    class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 font-medium px-5 py-2.5 rounded-lg transition-colors text-sm">
                    Eliminar solicitud
                </button>
            </div>
        </form>
    </div>
</div>
