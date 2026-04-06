<div class="p-4 sm:p-6 max-w-6xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-zinc-900">Registro de Donaciones</h1>
        <p class="text-zinc-500 text-sm mt-1">Historial de donaciones, transferencias y solicitudes de interés.</p>
    </div>

    {{-- Flash --}}
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats resumen --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">PayPal Completadas</p>
            <p class="text-3xl font-bold text-green-600">{{ $totalCompletadas }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Recaudado (PayPal)</p>
            <p class="text-3xl font-bold text-primary-600">${{ number_format($montoPaypal, 2) }}</p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Transferencias</p>
            <p class="text-3xl font-bold text-zinc-900">{{ $totalTransfers }}
                @if($transfersPendientes > 0)
                    <span class="text-sm font-medium text-secondary-600">({{ $transfersPendientes }} pendientes)</span>
                @endif
            </p>
        </div>
        <div class="bg-white border border-zinc-200 rounded-xl p-5">
            <p class="text-xs text-zinc-500 uppercase tracking-wide mb-1">Interesados</p>
            <p class="text-3xl font-bold text-zinc-900">{{ $totalInterest }}
                @if($interestPendientes > 0)
                    <span class="text-sm font-medium text-secondary-600">({{ $interestPendientes }} pendientes)</span>
                @endif
            </p>
        </div>
    </div>

    {{-- Tabs --}}
    <div class="border-b border-zinc-200">
        <nav class="flex gap-6 -mb-px">
            <button wire:click="$set('tab', 'paypal')"
                class="pb-3 text-sm font-medium border-b-2 transition {{ $tab === 'paypal' ? 'border-primary-600 text-primary-600' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                PayPal
                <span class="ml-1 text-xs bg-zinc-100 text-zinc-500 rounded-full px-2 py-0.5">{{ $totalPaypal }}</span>
            </button>
            <button wire:click="$set('tab', 'transfers')"
                class="pb-3 text-sm font-medium border-b-2 transition {{ $tab === 'transfers' ? 'border-primary-600 text-primary-600' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                Transferencias
                @if($transfersPendientes > 0)
                    <span class="ml-1 text-xs bg-secondary-100 text-secondary-600 rounded-full px-2 py-0.5">{{ $transfersPendientes }}</span>
                @else
                    <span class="ml-1 text-xs bg-zinc-100 text-zinc-500 rounded-full px-2 py-0.5">{{ $totalTransfers }}</span>
                @endif
            </button>
            <button wire:click="$set('tab', 'interest')"
                class="pb-3 text-sm font-medium border-b-2 transition {{ $tab === 'interest' ? 'border-primary-600 text-primary-600' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                Interesados
                @if($interestPendientes > 0)
                    <span class="ml-1 text-xs bg-secondary-100 text-secondary-600 rounded-full px-2 py-0.5">{{ $interestPendientes }}</span>
                @else
                    <span class="ml-1 text-xs bg-zinc-100 text-zinc-500 rounded-full px-2 py-0.5">{{ $totalInterest }}</span>
                @endif
            </button>
        </nav>
    </div>

    {{-- Filtros --}}
    <div class="bg-white border border-zinc-200 rounded-xl p-4">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="{{ $tab === 'paypal' ? 'Buscar por nombre, correo o ID de orden...' : ($tab === 'transfers' ? 'Buscar por nombre o banco...' : 'Buscar por nombre o correo...') }}"
                    class="w-full pl-10 pr-4 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            <select wire:model.live="status"
                class="px-3 py-2.5 border border-zinc-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 bg-white text-zinc-700">
                <option value="">Todos los estados</option>
                @if($tab === 'paypal')
                    <option value="completed">Completadas</option>
                    <option value="pending">Pendientes</option>
                    <option value="failed">Fallidas</option>
                @elseif($tab === 'transfers')
                    <option value="pendiente">Pendiente</option>
                    <option value="verificado">Verificado</option>
                    <option value="rechazado">Rechazado</option>
                @else
                    <option value="pendiente">Pendiente</option>
                    <option value="contactado">Contactado</option>
                @endif
            </select>
        </div>
    </div>

    {{-- ═══ TAB: PAYPAL ═══ --}}
    @if($tab === 'paypal')
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
    @endif

    {{-- ═══ TAB: TRANSFERENCIAS ═══ --}}
    @if($tab === 'transfers')
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
        @if ($transfers->isEmpty())
            <div class="p-10 text-center">
                <svg class="w-10 h-10 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <p class="text-zinc-500 text-sm">No se encontraron transferencias.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-zinc-50 border-b border-zinc-200">
                        <tr>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Donante</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Monto</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Banco</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden md:table-cell">Comprobante</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Estado</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide hidden lg:table-cell">Fecha</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-zinc-500 uppercase tracking-wide">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @foreach ($transfers as $transfer)
                        <tr class="hover:bg-zinc-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                                        <span class="text-xs font-semibold">{{ strtoupper(substr($transfer->donor_name, 0, 1)) }}</span>
                                    </div>
                                    <p class="font-medium text-zinc-800">{{ $transfer->donor_name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="font-semibold text-zinc-800">L {{ number_format($transfer->amount, 2) }}</span>
                            </td>
                            <td class="px-4 py-3 text-zinc-600">{{ $transfer->bank_name }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <a href="{{ asset('storage/' . $transfer->receipt_path) }}" target="_blank"
                                   class="inline-flex items-center gap-1 text-primary-600 hover:text-primary-700 text-xs font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Ver
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $badgeClass = match($transfer->status) {
                                        'verificado' => 'bg-green-100 text-green-700',
                                        'rechazado'  => 'bg-red-100 text-red-600',
                                        default      => 'bg-secondary-100 text-secondary-600',
                                    };
                                    $badgeLabel = match($transfer->status) {
                                        'verificado' => 'Verificado',
                                        'rechazado'  => 'Rechazado',
                                        default      => 'Pendiente',
                                    };
                                @endphp
                                <span class="px-2.5 py-0.5 text-xs font-medium rounded-full {{ $badgeClass }}">
                                    {{ $badgeLabel }}
                                </span>
                            </td>
                            <td class="px-4 py-3 hidden lg:table-cell text-zinc-400 text-xs">
                                {{ $transfer->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                @if($transfer->status === 'pendiente')
                                    <div class="flex gap-1">
                                        <button wire:click="updateTransferStatus({{ $transfer->id }}, 'verificado')"
                                            wire:confirm="¿Verificar esta transferencia?"
                                            class="p-1.5 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition" title="Verificar">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                        <button wire:click="updateTransferStatus({{ $transfer->id }}, 'rechazado')"
                                            wire:confirm="¿Rechazar esta transferencia?"
                                            class="p-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Rechazar">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <span class="text-xs text-zinc-400">—</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($transfers->hasPages())
                <div class="px-4 py-3 border-t border-zinc-100">
                    {{ $transfers->links() }}
                </div>
            @endif
        @endif
    </div>
    @endif

    {{-- ═══ TAB: INTERESADOS ═══ --}}
    @if($tab === 'interest')
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden">
        @if ($interests->isEmpty())
            <div class="p-10 text-center">
                <svg class="w-10 h-10 text-zinc-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <p class="text-zinc-500 text-sm">No se encontraron solicitudes de interés.</p>
            </div>
        @else
            <div class="divide-y divide-zinc-100">
                @foreach ($interests as $interest)
                <div class="p-5 hover:bg-zinc-50 transition">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 shrink-0">
                                    <span class="text-xs font-semibold">{{ strtoupper(substr($interest->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-zinc-800">{{ $interest->name }}</p>
                                    <p class="text-xs text-zinc-400">{{ $interest->email }}
                                        @if($interest->phone) · {{ $interest->phone }} @endif
                                    </p>
                                </div>
                            </div>
                            <p class="text-sm text-zinc-600 bg-zinc-50 rounded-lg p-3 mt-2">{{ $interest->message }}</p>
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            @php
                                $badgeClass = $interest->status === 'contactado'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-secondary-100 text-secondary-600';
                                $badgeLabel = $interest->status === 'contactado' ? 'Contactado' : 'Pendiente';
                            @endphp
                            <span class="px-2.5 py-0.5 text-xs font-medium rounded-full {{ $badgeClass }}">
                                {{ $badgeLabel }}
                            </span>
                            @if($interest->status === 'pendiente')
                                <button wire:click="markInterestContacted({{ $interest->id }})"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Marcar contactado
                                </button>
                            @endif
                            <span class="text-xs text-zinc-400 hidden lg:inline">{{ $interest->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if ($interests->hasPages())
                <div class="px-4 py-3 border-t border-zinc-100">
                    {{ $interests->links() }}
                </div>
            @endif
        @endif
    </div>
    @endif
</div>
