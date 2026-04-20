<div>
    {{-- Selector de método --}}
    <div class="mb-8">
        <h3 class="text-sm font-semibold text-zinc-500 uppercase tracking-wider mb-4 text-center">¿Cómo quieres donar?</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            {{-- PayPal --}}
            <button wire:click="selectTab('paypal')" type="button"
                class="relative flex flex-col items-center gap-2 p-4 rounded-xl border-2 transition-all duration-200
                    {{ $tab === 'paypal'
                        ? 'border-primary-600 bg-primary-50 shadow-sm'
                        : 'border-zinc-200 bg-white hover:border-primary-300 hover:bg-primary-50/50' }}">
                @if($tab === 'paypal')
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-primary-600"></span>
                @endif
                <svg class="w-7 h-7 {{ $tab === 'paypal' ? 'text-primary-600' : 'text-zinc-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                <span class="font-semibold text-sm {{ $tab === 'paypal' ? 'text-primary-700' : 'text-zinc-700' }}">PayPal</span>
                <span class="text-xs {{ $tab === 'paypal' ? 'text-primary-500' : 'text-zinc-400' }}">Pago en línea seguro</span>
            </button>

            {{-- Transferencia --}}
            <button wire:click="selectTab('transfer')" type="button"
                class="relative flex flex-col items-center gap-2 p-4 rounded-xl border-2 transition-all duration-200
                    {{ $tab === 'transfer'
                        ? 'border-primary-600 bg-primary-50 shadow-sm'
                        : 'border-zinc-200 bg-white hover:border-primary-300 hover:bg-primary-50/50' }}">
                @if($tab === 'transfer')
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-primary-600"></span>
                @endif
                <svg class="w-7 h-7 {{ $tab === 'transfer' ? 'text-primary-600' : 'text-zinc-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span class="font-semibold text-sm {{ $tab === 'transfer' ? 'text-primary-700' : 'text-zinc-700' }}">Transferencia</span>
                <span class="text-xs {{ $tab === 'transfer' ? 'text-primary-500' : 'text-zinc-400' }}">Depósito bancario</span>
            </button>

            {{-- Interés --}}
            <button wire:click="selectTab('interest')" type="button"
                class="relative flex flex-col items-center gap-2 p-4 rounded-xl border-2 transition-all duration-200
                    {{ $tab === 'interest'
                        ? 'border-primary-600 bg-primary-50 shadow-sm'
                        : 'border-zinc-200 bg-white hover:border-primary-300 hover:bg-primary-50/50' }}">
                @if($tab === 'interest')
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-primary-600"></span>
                @endif
                <svg class="w-7 h-7 {{ $tab === 'interest' ? 'text-primary-600' : 'text-zinc-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <span class="font-semibold text-sm {{ $tab === 'interest' ? 'text-primary-700' : 'text-zinc-700' }}">Quiero donar</span>
                <span class="text-xs {{ $tab === 'interest' ? 'text-primary-500' : 'text-zinc-400' }}">Necesito más info</span>
            </button>
        </div>
    </div>

    {{-- Contenido por tab --}}

    {{-- ═══ PAYPAL ═══ --}}
    @if($tab === 'paypal')
        <livewire:donation-form />
    @endif

    {{-- ═══ TRANSFERENCIA BANCARIA ═══ --}}
    @if($tab === 'transfer')
        @if($bankSent)
            <div class="bg-green-50 border border-green-200 rounded-xl p-8 text-center">
                <svg class="w-14 h-14 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-xl font-bold text-green-800 mb-2">¡Comprobante recibido!</h3>
                <p class="text-green-600 text-sm">Gracias por tu donación. Verificaremos tu transferencia y te confirmaremos pronto.</p>
            </div>
        @else
            <div class="space-y-6">
                {{-- Datos bancarios --}}
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                    <h4 class="font-semibold text-blue-800 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Datos para transferencia
                    </h4>
                    <div class="space-y-2 text-sm text-blue-700">
                        <div class="flex justify-between items-center bg-white/60 rounded-lg px-3 py-2">
                            <span class="font-medium">Banco:</span>
                            <span>Banco de Occidente</span>
                        </div>
                        <div class="flex justify-between items-center bg-white/60 rounded-lg px-3 py-2">
                            <span class="font-medium">Cuenta (Lempiras):</span>
                            <span>11-101-003738-3</span>
                        </div>
                        <div class="flex justify-between items-center bg-white/60 rounded-lg px-3 py-2">
                            <span class="font-medium">A nombre de:</span>
                            <span>ASONOG</span>
                        </div>
                    </div>
                </div>

                <hr class="border-zinc-100">

                <p class="text-sm text-zinc-500 text-center">Una vez realizada la transferencia, completa el siguiente formulario para que podamos verificarla.</p>

                {{-- Formulario de confirmación --}}
                <form wire:submit="submitBankTransfer" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo *</label>
                        <input type="text" wire:model="bank_donor_name" placeholder="Tu nombre completo"
                            class="w-full border {{ $errors->has('bank_donor_name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        @error('bank_donor_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Monto donado *</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-sm font-semibold">L</span>
                                <input type="number" wire:model="bank_amount" min="1" step="0.01" placeholder="0.00"
                                    class="w-full border {{ $errors->has('bank_amount') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg pl-8 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            </div>
                            @error('bank_amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Banco desde donde transfirió *</label>
                            <input type="text" wire:model="bank_name" placeholder="Ej: Banco Atlántida"
                                class="w-full border {{ $errors->has('bank_name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            @error('bank_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 mb-1.5">Comprobante de transferencia *</label>
                        <div class="relative">
                            <input type="file" wire:model="bank_receipt" accept=".jpg,.jpeg,.png,.pdf"
                                class="w-full border {{ $errors->has('bank_receipt') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        </div>
                        <p class="text-xs text-zinc-400 mt-1">JPG, PNG o PDF — máximo 5 MB</p>
                        @error('bank_receipt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2"
                        wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-wait" wire:target="submitBankTransfer,bank_receipt">
                        <svg wire:loading wire:target="submitBankTransfer,bank_receipt" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="submitBankTransfer">Enviar comprobante</span>
                        <span wire:loading wire:target="submitBankTransfer">Enviando...</span>
                    </button>
                </form>
            </div>
        @endif
    @endif

    {{-- ═══ FORMULARIO DE INTERÉS ═══ --}}
    @if($tab === 'interest')
        @if($interestSent)
            <div class="bg-green-50 border border-green-200 rounded-xl p-8 text-center">
                <svg class="w-14 h-14 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-xl font-bold text-green-800 mb-2">¡Mensaje enviado!</h3>
                <p class="text-green-600 text-sm">Gracias por tu interés. Nos pondremos en contacto contigo pronto para orientarte sobre cómo donar.</p>
            </div>
        @else
            <div class="space-y-6">
                <p class="text-sm text-zinc-500 text-center">
                    ¿Quieres donar pero necesitas más información o no tienes el método disponible? Déjanos tus datos y te contactaremos.
                </p>

                <form wire:submit="submitInterest" class="space-y-5">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo *</label>
                            <input type="text" wire:model="interest_name" placeholder="Tu nombre"
                                class="w-full border {{ $errors->has('interest_name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            @error('interest_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico *</label>
                            <input type="email" wire:model="interest_email" placeholder="tucorreo@ejemplo.com"
                                class="w-full border {{ $errors->has('interest_email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            @error('interest_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 mb-1.5">Teléfono <span class="text-zinc-400">(opcional)</span></label>
                        <input type="tel" wire:model="interest_phone" placeholder="+504 0000-0000"
                            class="w-full border {{ $errors->has('interest_phone') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        @error('interest_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 mb-1.5">Mensaje / motivo de interés *</label>
                        <textarea wire:model="interest_message" rows="4" placeholder="Cuéntanos cómo te gustaría ayudar..."
                            class="w-full border {{ $errors->has('interest_message') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition resize-none"></textarea>
                        @error('interest_message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2"
                        wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-wait" wire:target="submitInterest">
                        <svg wire:loading wire:target="submitInterest" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span wire:loading.remove wire:target="submitInterest">Enviar mensaje</span>
                        <span wire:loading wire:target="submitInterest">Enviando...</span>
                    </button>
                </form>
            </div>
        @endif
    @endif
</div>
