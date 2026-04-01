<div>
    @if ($sent)
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 text-center">
            <svg class="w-12 h-12 text-green-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-lg font-bold text-green-800 mb-1">¡Mensaje enviado!</h3>
            <p class="text-green-600 text-sm">Te responderemos en un plazo de 2 a 3 días hábiles.</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre</label>
                    <input type="text" wire:model="name" placeholder="Tu nombre"
                        class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Apellido</label>
                    <input type="text" wire:model="last_name" placeholder="Tu apellido"
                        class="w-full border {{ $errors->has('last_name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input type="email" wire:model="email" placeholder="tucorreo@ejemplo.com"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Asunto</label>
                <select wire:model="subject"
                    class="w-full border {{ $errors->has('subject') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                    <option value="">Selecciona un asunto</option>
                    <option>Información sobre becas</option>
                    <option>Estado de mi solicitud</option>
                    <option>Documentación requerida</option>
                    <option>Registro de organización</option>
                    <option>Otro</option>
                </select>
                @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Mensaje</label>
                <textarea wire:model="message" rows="5" placeholder="Escribe tu mensaje aquí..."
                    class="w-full border {{ $errors->has('message') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition resize-none"></textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition disabled:opacity-50">
                <!-- Ícono normal -->
                <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3 3l18 9-18 9 3-9Zm0 0h7" />
                </svg>

                <!-- Spinner loading -->
                <svg wire:loading class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                </svg>

                <span wire:loading.remove>Enviar mensaje</span>
                <span wire:loading>Enviando...</span>
            </button>
        </form>
    @endif
</div>
