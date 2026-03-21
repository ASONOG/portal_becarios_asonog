<div class="p-6 max-w-6xl mx-auto space-y-6">

        <div class="flex items-center justify-between flex-wrap gap-3">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900">Becarios</h1>
                <p class="text-zinc-500 text-sm mt-1">Listado y gestión de todos los becarios registrados.</p>
            </div>
            <a href="{{ route('admin.becarios.create') }}" wire:navigate
                class="flex items-center gap-2 px-4 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Becario
            </a>
        </div>

        {{-- Buscador --}}
        <div class="bg-white border border-zinc-200 rounded-xl p-4">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Buscar por nombre, correo o institución..."
                    class="w-full pl-10 pr-4 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
        </div>

        {{-- Tabla --}}
        <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
            @if ($becarios->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-zinc-500 text-sm">No se encontraron becarios.</p>
                </div>
            @else
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 border-b border-zinc-200">
                        <tr>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Becario</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Institución</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden sm:table-cell">Documentos</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Registrado</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @foreach ($becarios as $becario)
                        <tr class="hover:bg-zinc-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="h-9 w-9 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 font-semibold text-xs shrink-0">
                                        {{ $becario->initials() }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-zinc-800">{{ $becario->name }}</p>
                                        <p class="text-xs text-zinc-400">{{ $becario->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell text-zinc-600">
                                {{ $becario->institution ?? '—' }}
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                <span class="px-2.5 py-1 bg-zinc-100 text-zinc-700 rounded-full text-xs font-medium">
                                    {{ $becario->documents_count }}
                                </span>
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell text-zinc-400 text-xs">
                                {{ $becario->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.becarios.show', $becario) }}" wire:navigate
                                    class="text-xs font-medium text-primary-600 hover:underline">
                                    Ver perfil →
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($becarios->hasPages())
                    <div class="px-4 py-3 border-t border-zinc-100">
                        {{ $becarios->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
