<div class="p-4 sm:p-6 max-w-2xl mx-auto space-y-6">

    <div>
        <a href="{{ route('admin.becarios.index') }}" wire:navigate class="text-sm text-primary-600 hover:underline">
            ← Volver a becarios
        </a>
        <h1 class="text-2xl font-bold text-zinc-900 mt-2">Nuevo Becario</h1>
        <p class="text-zinc-500 text-sm mt-1">Crea una cuenta de becario. Se enviará un correo de invitación con un enlace para establecer su contraseña.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-zinc-200 rounded-xl p-6">
        <form wire:submit="save" class="space-y-4">

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo *</label>
                <input wire:model="name" type="text" placeholder="Nombre y apellido del becario"
                    class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico *</label>
                <input wire:model="email" type="email" placeholder="becario@ejemplo.com"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-zinc-300' }} rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="bg-zinc-50 border border-zinc-200 rounded-lg p-3 text-xs text-zinc-600">
                <p class="font-medium text-zinc-700 mb-1">¿Qué sucede al crear la cuenta?</p>
                <ul class="list-disc list-inside space-y-0.5">
                    <li>Se crea la cuenta con rol de becario</li>
                    <li>Se envía un correo con un enlace seguro para que establezca su contraseña</li>
                    <li>El enlace expira en 60 minutos</li>
                </ul>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition"
                    wire:loading.attr="disabled" wire:target="save">
                    <span wire:loading.remove wire:target="save">Crear y enviar invitación</span>
                    <span wire:loading wire:target="save">Creando...</span>
                </button>
                <a href="{{ route('admin.becarios.index') }}" wire:navigate
                    class="px-5 py-2.5 bg-zinc-100 text-zinc-700 text-sm font-semibold rounded-lg hover:bg-zinc-200 transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
