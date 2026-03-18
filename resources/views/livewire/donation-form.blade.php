<div>
    @if($sent)
        <div class="bg-green-50 border border-green-200 rounded-xl p-8 text-center">
            <svg class="w-14 h-14 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <h3 class="text-xl font-bold text-green-800 mb-2">¡Gracias por tu interés en donar!</h3>
            <p class="text-green-600 text-sm">Hemos recibido tu solicitud. Te contactaremos pronto con los detalles para completar tu donación.</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-6">

            {{-- Montos sugeridos --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-3">Selecciona un monto (Lempiras)</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach(['200', '500', '1000', '2000'] as $preset)
                    <button type="button" wire:click="selectAmount('{{ $preset }}')"
                        class="border-2 rounded-xl py-3 font-bold text-sm transition {{ $amount === $preset ? 'border-primary-600 bg-primary-50 text-primary-600' : 'border-zinc-200 text-zinc-700 hover:border-primary-300' }}">
                        L. {{ number_format((int)$preset) }}
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- Monto personalizado --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">O ingresa un monto personalizado</label>
                <div class="relative">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-sm font-semibold">L.</span>
                    <input type="number" wire:model="amount" min="50" step="1" placeholder="Otro monto"
                        class="w-full border {{ $errors->has('amount') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>
                @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Frecuencia --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-3">Frecuencia de donación</label>
                <div class="grid grid-cols-3 gap-3">
                    @foreach(['Única vez' => 'once', 'Mensual' => 'monthly', 'Anual' => 'yearly'] as $label => $value)
                    <label class="cursor-pointer">
                        <input type="radio" wire:model="frequency" value="{{ $value }}" class="sr-only peer">
                        <div class="text-center border-2 border-zinc-200 rounded-xl py-3 text-sm font-medium text-zinc-700 peer-checked:border-primary-600 peer-checked:bg-primary-50 peer-checked:text-primary-600 transition">
                            {{ $label }}
                        </div>
                    </label>
                    @endforeach
                </div>
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
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                    <input type="email" wire:model="donor_email" placeholder="pararecibo@correo.com"
                        class="w-full border {{ $errors->has('donor_email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                    @error('donor_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-start gap-3">
                <input type="checkbox" wire:model.live="anonymous" id="anonymous" class="mt-0.5 rounded border-zinc-300 text-primary-600 focus:ring-primary-500">
                <label for="anonymous" class="text-sm text-zinc-600">Quiero que mi donación sea anónima</label>
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-sm disabled:opacity-50">
                <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <svg wire:loading class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <span wire:loading.remove>Confirmar donación</span>
                <span wire:loading>Enviando...</span>
            </button>

            <p class="text-xs text-zinc-400 text-center">
                Al confirmar, aceptas nuestros
                <a href="#" class="underline hover:text-zinc-600">términos y condiciones</a>.
                Tu información está segura y protegida.
            </p>
        </form>
    @endif
</div>
