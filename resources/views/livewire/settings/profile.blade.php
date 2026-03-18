<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">Configuración de Perfil</flux:heading>

    <x-settings.layout :heading="__('Perfil')" :subheading="__('Actualiza tu información personal y de contacto')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">

            {{-- Datos básicos --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo</label>
                <input wire:model="name" type="text" required autofocus autocomplete="name"
                    class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 ">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                <input wire:model="email" type="email" required autocomplete="email"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 ">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                @if ($this->hasUnverifiedEmail)
                    <div class="mt-2 p-3 bg-secondary-50 rounded-lg text-sm text-secondary-700">
                        Tu correo no está verificado.
                        <button type="button" wire:click.prevent="resendVerificationNotification" class="underline cursor-pointer font-medium">
                            Reenviar verificación
                        </button>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-1 font-medium text-green-700">¡Enlace enviado!</p>
                        @endif
                    </div>
                @endif
            </div>

            {{-- Datos extendidos (solo becarios) --}}
            @if (auth()->user()->isBecario())
            <hr class="border-zinc-200">
            <p class="text-sm font-semibold text-zinc-700">Datos de beca</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Teléfono</label>
                    <input wire:model="phone" type="text" placeholder="Ej: +504 9999-9999"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Número de identidad</label>
                    <input wire:model="national_id" type="text" placeholder="DNI / Identidad"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Institución educativa</label>
                    <input wire:model="institution" type="text" placeholder="Universidad / Centro educativo"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 mb-1.5">Carrera</label>
                    <input wire:model="career" type="text" placeholder="Ej: Ingeniería de Sistemas"
                        class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Sobre mí <span class="text-zinc-400 font-normal">(opcional)</span></label>
                <textarea wire:model="bio" rows="3" placeholder="Breve descripción personal..."
                    class="w-full border border-zinc-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
            </div>
            @endif

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
                    Guardar cambios
                </button>
                <x-action-message class="text-sm text-green-700" on="profile-updated">
                    ¡Guardado correctamente!
                </x-action-message>
            </div>
        </form>

        @if ($this->showDeleteUser)
            <livewire:settings.delete-user-form />
        @endif
    </x-settings.layout>
</section>

