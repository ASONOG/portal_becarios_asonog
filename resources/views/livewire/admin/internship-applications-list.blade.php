<div class="p-4 sm:p-6 max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-zinc-900">Solicitudes de Prácticas</h1>
        <p class="text-zinc-500 text-sm mt-1">Solicitudes recibidas desde el formulario público de prácticas profesionales.</p>
    </div>

    {{-- Flash --}}
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Total Solicitudes</p>
            <p class="text-3xl font-bold text-zinc-900">{{ $totalApplications }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Pendientes</p>
            <p class="text-3xl font-bold text-secondary-600">{{ $pendingCount }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Aceptadas</p>
            <p class="text-3xl font-bold text-green-600">{{ $acceptedCount }}</p>
        </div>
    </div>

    {{-- Filtros --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-4">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Buscar por nombre, correo o institución..."
                    class="w-full pl-10 pr-4 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            <select wire:model.live="status"
                class="px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 bg-white text-zinc-700">
                <option value="">Todos los estados</option>
                @foreach(\App\Models\InternshipApplication::STATUSES as $val => $label)
                    <option value="{{ $val }}">{{ $label }}</option>
                @endforeach
            </select>
            <select wire:model.live="type"
                class="px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 bg-white text-zinc-700">
                <option value="">Todos los tipos</option>
                @foreach(\App\Models\InternshipApplication::TYPES as $val => $label)
                    <option value="{{ $val }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
        @if ($applications->isEmpty())
            <div class="p-10 text-center">
                <svg class="w-10 h-10 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-zinc-500 text-sm">No se encontraron solicitudes.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 border-b border-zinc-200">
                        <tr>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Solicitante</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Tipo</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Institución</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Fecha</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @foreach ($applications as $app)
                        <tr class="hover:bg-zinc-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 shrink-0">
                                        <span class="text-xs font-semibold">{{ strtoupper(substr($app->full_name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-zinc-800">{{ $app->full_name }}</p>
                                        <p class="text-xs text-zinc-400">{{ $app->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell text-zinc-600 text-xs">
                                {{ $app->type_label }}
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell text-zinc-600 text-xs">
                                {{ $app->institution }}
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $badgeClass = match($app->status) {
                                        'aceptada'  => 'bg-green-100 text-green-700',
                                        'rechazada' => 'bg-red-100 text-red-600',
                                        'revisada'  => 'bg-blue-100 text-blue-700',
                                        default     => 'bg-secondary-100 text-secondary-600',
                                    };
                                @endphp
                                <span class="px-2.5 py-0.5 text-xs font-medium rounded-full {{ $badgeClass }}">
                                    {{ $app->status_label }}
                                </span>
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell text-zinc-400 text-xs">
                                {{ $app->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.internships.show', $app) }}" wire:navigate
                                   class="inline-flex items-center gap-1 text-primary-600 hover:text-primary-700 text-xs font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Ver
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($applications->hasPages())
                <div class="px-4 py-3 border-t border-zinc-100">
                    {{ $applications->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
