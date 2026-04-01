<div class="p-6 max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-zinc-900">Registro de Donaciones</h1>
        <p class="text-zinc-500 text-sm mt-1">Historial de todas las donaciones recibidas a través del portal.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Total Donaciones</p>
            <p class="text-3xl font-bold text-zinc-900">{{ $totalDonaciones }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Completadas</p>
            <p class="text-3xl font-bold text-green-600">{{ $totalCompletadas }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Pendientes</p>
            <p class="text-3xl font-bold text-secondary-600">{{ $totalPendientes }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Monto Recaudado</p>
            <p class="text-3xl font-bold text-primary-600">
                ${{ number_format($montoTotal, 2) }}
            </p>
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
                    placeholder="Buscar por nombre, correo o ID de orden..."
                    class="w-full pl-10 pr-4 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            <select wire:model.live="status"
                class="px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 bg-white text-zinc-700">
                <option value="">Todos los estados</option>
                <option value="completed">Completadas</option>
                <option value="pending">Pendientes</option>
                <option value="failed">Fallidas</option>
            </select>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
        @if ($donations->isEmpty())
            <div class="p-10 text-center">
                <svg class="w-10 h-10 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-zinc-500 text-sm">No se encontraron donaciones.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 border-b border-zinc-200">
                        <tr>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Donante</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Correo</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Monto</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Fecha de Pago</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden xl:table-cell">ID de Orden</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @foreach ($donations as $donation)
                        <tr class="hover:bg-zinc-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 shrink-0">
                                        @if ($donation->anonymous)
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        @else
                                            <span class="text-xs font-semibold">
                                                {{ strtoupper(substr($donation->donor_name ?? '?', 0, 1)) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-zinc-800">
                                            {{ $donation->anonymous ? 'Anónimo' : ($donation->donor_name ?? '—') }}
                                        </p>
                                        @if ($donation->anonymous)
                                            <span class="text-xs text-zinc-400 italic">Donación anónima</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell text-zinc-500 text-xs">
                                {{ $donation->anonymous ? '—' : $donation->donor_email }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="font-semibold text-zinc-800">
                                    {{ $donation->currency }} {{ number_format($donation->amount, 2) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $badgeClass = match($donation->status) {
                                        'completed' => 'bg-green-100 text-green-700',
                                        'pending'   => 'bg-secondary-100 text-secondary-600',
                                        'failed'    => 'bg-red-100 text-red-600',
                                        default     => 'bg-zinc-100 text-zinc-600',
                                    };
                                    $badgeLabel = match($donation->status) {
                                        'completed' => 'Completada',
                                        'pending'   => 'Pendiente',
                                        'failed'    => 'Fallida',
                                        default     => ucfirst($donation->status),
                                    };
                                @endphp
                                <span class="px-2.5 py-0.5 text-xs font-medium rounded-full {{ $badgeClass }}">
                                    {{ $badgeLabel }}
                                </span>
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell text-zinc-400 text-xs">
                                {{ $donation->paid_at ? $donation->paid_at->format('d/m/Y H:i') : '—' }}
                            </td>
                            <td class="px-4 py-3 hidden xl:table-cell">
                                <span class="text-xs text-zinc-400 font-mono">
                                    {{ $donation->paypal_order_id }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($donations->hasPages())
                <div class="px-4 py-3 border-t border-zinc-100">
                    {{ $donations->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
