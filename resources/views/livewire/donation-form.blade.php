<div>
    @if($paid)
        <div class="bg-green-50 border border-green-200 rounded-xl p-8 text-center">
            <svg class="w-14 h-14 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h3 class="text-xl font-bold text-green-800 mb-2">¡Donación completada!</h3>
            <p class="text-green-600 text-sm">Gracias por tu generosidad. Tu pago ha sido procesado exitosamente.</p>
        </div>
    @else
        <div class="space-y-6" x-data="donationPaypal()" x-init="init()">

            {{-- Montos sugeridos --}}
            @php
            $presets = [
                '5'  => ['label' => 'Útiles escolares',    'sub' => 'para un alumno'],
                '10' => ['label' => 'Transporte diario',   'sub' => 'de un becario'],
                '25' => ['label' => 'Matrícula universi.', 'sub' => 'un semestre'],
                '50' => ['label' => 'Beca completa',       'sub' => 'un período'],
            ];
            @endphp
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-3">Selecciona un monto (USD)</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach($presets as $value => $info)
                    <button type="button" wire:click="selectAmount('{{ $value }}')"
                        class="border-2 rounded-xl py-3 px-2 text-sm transition flex flex-col items-center gap-0.5
                            {{ $amount === $value
                                ? 'border-primary-600 bg-primary-600 text-white'
                                : 'border-zinc-200 text-zinc-700 hover:border-primary-300 hover:bg-primary-50' }}">
                        <span class="font-extrabold text-base">${{ $value }}</span>
                        <span class="font-semibold text-xs leading-tight">{{ $info['label'] }}</span>
                        <span class="text-xs leading-tight opacity-75">{{ $info['sub'] }}</span>
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- Monto personalizado --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">O ingresa un monto personalizado (USD)</label>
                <div class="relative">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-sm font-semibold">$</span>
                    <input type="number" wire:model="amount" min="1" step="0.01" placeholder="Otro monto"
                        class="w-full border {{ $errors->has('amount') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg pl-8 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>
                @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <hr class="border-zinc-100">

            {{-- Datos del donante --}}
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo</label>
                    <input type="text" wire:model="donor_name" placeholder="Tu nombre" {{ $anonymous ? 'disabled' : '' }}
                        class="w-full border {{ $errors->has('donor_name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition disabled:bg-zinc-100 disabled:text-zinc-400">
                    @error('donor_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico * </label>
                    <input type="email" wire:model="donor_email" placeholder="tucorreo@ejemplo.com"
                        class="w-full border {{ $errors->has('donor_email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    @error('donor_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-start gap-3">
                <input type="checkbox" wire:model.live="anonymous" id="anonymous" class="mt-0.5 rounded border-zinc-300 text-primary-600 focus:ring-primary-500">
                <label for="anonymous" class="text-sm text-zinc-600">Quiero que mi donación sea anónima</label>
            </div>

            {{-- PayPal Button Container --}}
            <div wire:ignore>
                <div id="paypal-button-container"></div>
            </div>
            <p x-show="paypalError" x-cloak class="text-red-500 text-sm mt-2 text-center" x-text="paypalError"></p>

            <p class="text-xs text-zinc-400 text-center">
                Pago procesado de forma segura por PayPal.
                Tu información está protegida.
            </p>
        </div>

        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency={{ config('services.paypal.currency', 'USD') }}&intent=capture&disable-funding=credit,card" data-page-type="checkout"></script>
        <script>
        function donationPaypal() {
            return {
                paypalError: '',
                paypalRendered: false,

                init() {
                    this.renderPayPalButtons();
                },

                renderPayPalButtons() {
                    if (this.paypalRendered) return;
                    const container = document.getElementById('paypal-button-container');
                    if (!container || typeof paypal === 'undefined') {
                        setTimeout(() => this.renderPayPalButtons(), 200);
                        return;
                    }
                    this.paypalRendered = true;

                    const wire = this.$wire;
                    const self = this;
                    const csrfToken = '{{ csrf_token() }}';

                    paypal.Buttons({
                        style: {
                            layout: 'vertical',
                            color: 'gold',
                            shape: 'rect',
                            label: 'donate',
                        },

                        async createOrder() {
                            self.paypalError = '';

                            const amount = wire.amount;
                            const donor_name = wire.anonymous ? null : wire.donor_name;
                            const donor_email = wire.donor_email;
                            const anonymous = wire.anonymous;

                            if (!amount || parseFloat(amount) < 1) {
                                self.paypalError = 'Ingresa un monto válido (mínimo $1).';
                                throw new Error(self.paypalError);
                            }
                            if (!donor_email || !donor_email.includes('@')) {
                                self.paypalError = 'Ingresa un correo electrónico válido.';
                                throw new Error(self.paypalError);
                            }
                            if (!anonymous && !donor_name) {
                                self.paypalError = 'Ingresa tu nombre o marca la donación como anónima.';
                                throw new Error(self.paypalError);
                            }

                            const response = await fetch('{{ route("paypal.create-order") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({ amount, donor_name, donor_email, anonymous }),
                            });

                            const result = await response.json();

                            if (!response.ok) {
                                const msg = result.errors
                                    ? Object.values(result.errors).flat().join(' ')
                                    : (result.error || 'Error al crear la orden.');
                                self.paypalError = msg;
                                throw new Error(msg);
                            }

                            return result.id;
                        },

                        async onApprove(data) {
                            self.paypalError = '';

                            const response = await fetch('{{ route("paypal.capture-order") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({ order_id: data.orderID }),
                            });

                            const result = await response.json();

                            if (!response.ok) {
                                self.paypalError = result.error || 'Error al procesar el pago.';
                                return;
                            }

                            wire.call('markAsPaid');
                        },

                        onError(err) {
                            console.error('PayPal error:', err);
                            self.paypalError = 'Ocurrió un error con PayPal. Intenta de nuevo.';
                        },

                        onCancel() {
                            self.paypalError = 'Pago cancelado. Puedes intentarlo de nuevo.';
                        }
                    }).render('#paypal-button-container');
                }
            };
        }
        </script>
    @endif
</div>
