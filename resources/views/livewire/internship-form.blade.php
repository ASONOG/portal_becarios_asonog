<div
    x-data="{
        open: false,
        academicLevel: @entangle('academic_level'),
        requiresAgreement: @entangle('requires_agreement'),
        internshipType: @entangle('internship_type'),
        availabilityVal: @entangle('availability'),
        estimatedDuration: @entangle('estimated_duration'),
        hasCommunityExperience: @entangle('has_community_experience'),
        sourceVal: @entangle('source'),
    }"
    x-effect="document.body.style.overflow = open ? 'hidden' : ''"
    @keydown.escape.window="if (open) open = false"
>
    {{-- ═══════════════════════════════════════════════════
         ESTADO: SOLICITUD ENVIADA
    ═══════════════════════════════════════════════════ --}}
    @if ($sent)
        <div x-init="open = false; $nextTick(() => $el.scrollIntoView({ behavior: 'smooth', block: 'center' }))"
             class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="h-1 bg-gradient-to-r from-green-400 via-emerald-500 to-green-400"></div>
            <div class="px-8 py-10 text-center">
                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-green-800 mb-2">¡Solicitud enviada con éxito!</h3>
                <p class="text-green-600 text-sm max-w-md mx-auto leading-relaxed">
                    Hemos recibido tu solicitud correctamente. Nuestro equipo la revisará y
                    se pondrá en contacto contigo en un plazo de <strong>5 días hábiles</strong>.
                </p>
            </div>
        </div>

    {{-- ═══════════════════════════════════════════════════
         ESTADO: FORMULARIO (CTA + MODAL)
    ═══════════════════════════════════════════════════ --}}
    @else
        {{-- ── CTA Card (visible cuando el modal está cerrado) ── --}}
        <div x-show="!open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="bg-white border border-zinc-200 rounded-2xl shadow-sm p-8 text-center">

            <div class="w-14 h-14 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center mx-auto mb-5">
                <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>

            <h3 class="text-lg font-bold text-zinc-900 mb-1">Formulario de Inscripción</h3>
            <p class="text-sm text-zinc-500 mb-6 max-w-sm mx-auto">
                Completa el formulario con tus datos, información académica y adjunta tu hoja de vida.
            </p>

            <button
                @click="open = true"
                class="group inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 active:bg-primary-800 text-white font-semibold px-7 py-3 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200"
            >
                Llenar formulario
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </button>

            <p class="mt-4 text-xs text-zinc-400">Respuesta en un plazo de 5 días hábiles</p>
        </div>

        {{-- ── MODAL (teleported to body to escape AOS stacking context) ── --}}
        <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 z-50 flex items-start justify-center overflow-y-auto overscroll-contain py-4 sm:py-8 px-4"
            role="dialog"
            aria-modal="true"
            aria-labelledby="form-modal-title"
        >
            {{-- Backdrop --}}
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="open = false"
                class="fixed inset-0 bg-zinc-900/60 backdrop-blur-sm"
                aria-hidden="true"
            ></div>

            {{-- Panel --}}
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full max-w-3xl"
            >
                <div class="bg-white rounded-2xl shadow-2xl ring-1 ring-zinc-900/5 flex flex-col max-h-[calc(100vh-4rem)]">

                    {{-- ── Header ── --}}
                    <div class="shrink-0 flex items-center justify-between gap-4 px-6 py-4 border-b border-zinc-100">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-primary-100 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div>
                                <h2 id="form-modal-title" class="font-bold text-zinc-900">Solicitud de Prácticas</h2>
                                <p class="text-xs text-zinc-500">Los campos con <span class="text-red-500">*</span> son obligatorios</p>
                            </div>
                        </div>
                        <button
                            @click="open = false"
                            class="p-2 -m-2 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 transition"
                            aria-label="Cerrar formulario"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    {{-- ── Form (scrollable body + sticky footer) ── --}}
                    <form wire:submit="submit" class="flex flex-col flex-1 min-h-0">
                        <div class="flex-1 overflow-y-auto overscroll-contain">

                            {{-- Error summary --}}
                            @if ($errors->any())
                                <div class="px-6 pt-5">
                                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.834-1.964-.834-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        <p class="text-sm font-medium text-red-800">
                                            Por favor corrige {{ $errors->count() }} {{ $errors->count() === 1 ? 'error' : 'errores' }} antes de continuar.
                                        </p>
                                    </div>
                                </div>
                            @endif

                            {{-- ==================== Sección 1: Datos Personales ==================== --}}
                            <fieldset class="px-6 py-6 space-y-5">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">1</span>
                                    <div>
                                        <h3 class="font-semibold text-zinc-900 text-sm">Datos Personales</h3>
                                        <p class="text-xs text-zinc-500">Información básica de contacto</p>
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="full_name" class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo <span class="text-red-500">*</span></label>
                                        <input id="full_name" type="text" wire:model="full_name" placeholder="Tu nombre completo"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('full_name') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('full_name') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico <span class="text-red-500">*</span></label>
                                        <input id="email" type="email" wire:model="email" placeholder="tucorreo@ejemplo.com"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('email') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('email') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-3 gap-4">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-zinc-700 mb-1.5">Teléfono <span class="text-red-500">*</span></label>
                                        <input id="phone" type="text" wire:model="phone" placeholder="9999-9999"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('phone') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('phone') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="department" class="block text-sm font-medium text-zinc-700 mb-1.5">Departamento <span class="text-red-500">*</span></label>
                                        <select id="department" wire:model="department"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 appearance-none {{ $errors->has('department') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                            <option value="">Selecciona</option>
                                            @foreach(\App\Models\InternshipApplication::DEPARTMENTS as $dept)
                                                <option value="{{ $dept }}">{{ $dept }}</option>
                                            @endforeach
                                        </select>
                                        @error('department') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="municipality" class="block text-sm font-medium text-zinc-700 mb-1.5">Municipio <span class="text-red-500">*</span></label>
                                        <input id="municipality" type="text" wire:model="municipality" placeholder="Tu municipio"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('municipality') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('municipality') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <div class="border-t border-zinc-100"></div>

                            {{-- ==================== Sección 2: Perfil Académico ==================== --}}
                            <fieldset class="px-6 py-6 space-y-5">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">2</span>
                                    <div>
                                        <h3 class="font-semibold text-zinc-900 text-sm">Perfil Académico</h3>
                                        <p class="text-xs text-zinc-500">Tu formación e institución educativa</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-zinc-700 mb-2.5">Nivel académico actual <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                        @foreach(\App\Models\InternshipApplication::ACADEMIC_LEVELS as $value => $label)
                                            <label :class="academicLevel === '{{ $value }}'
                                                    ? 'border-primary-500 bg-primary-50/50 ring-1 ring-primary-500/20'
                                                    : 'border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50'"
                                                class="relative flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="academicLevel" name="academic_level" value="{{ $value }}" class="sr-only">
                                                <div :class="academicLevel === '{{ $value }}' ? 'border-primary-500 bg-primary-500' : 'border-zinc-300'"
                                                    class="w-4 h-4 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors">
                                                    <div x-show="academicLevel === '{{ $value }}'" class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                                </div>
                                                <span :class="academicLevel === '{{ $value }}' ? 'font-medium text-primary-900' : 'text-zinc-700'" class="text-sm">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('academic_level') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div x-show="academicLevel === 'otro'" x-cloak>
                                    <label for="academic_level_other" class="block text-sm font-medium text-zinc-700 mb-1.5">Especifica tu nivel académico <span class="text-red-500">*</span></label>
                                    <input id="academic_level_other" type="text" wire:model="academic_level_other" placeholder="Describe tu nivel académico"
                                        class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('academic_level_other') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                    @error('academic_level_other') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="institution" class="block text-sm font-medium text-zinc-700 mb-1.5">Universidad o institución <span class="text-red-500">*</span></label>
                                        <input id="institution" type="text" wire:model="institution" placeholder="Nombre de tu centro de estudios"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('institution') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('institution') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="field_of_study" class="block text-sm font-medium text-zinc-700 mb-1.5">Carrera o área de formación <span class="text-red-500">*</span></label>
                                        <input id="field_of_study" type="text" wire:model="field_of_study" placeholder="Ej. Trabajo Social, Ingeniería..."
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('field_of_study') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('field_of_study') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="semester" class="block text-sm font-medium text-zinc-700 mb-1.5">Semestre o año <span class="text-xs text-zinc-400">(si aplica)</span></label>
                                        <input id="semester" type="text" wire:model="semester" placeholder="Ej. 8vo semestre"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20 transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-zinc-700 mb-2">¿Requiere convenio institucional?</label>
                                        <div class="inline-flex rounded-xl border border-zinc-200 p-1 bg-zinc-50">
                                            <label :class="requiresAgreement === '1' ? 'bg-white text-primary-700 shadow-sm' : 'text-zinc-500 hover:text-zinc-700'"
                                                class="px-5 py-2 rounded-lg text-sm font-medium cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="requiresAgreement" name="requires_agreement" value="1" class="sr-only"> Sí
                                            </label>
                                            <label :class="requiresAgreement === '0' ? 'bg-white text-primary-700 shadow-sm' : 'text-zinc-500 hover:text-zinc-700'"
                                                class="px-5 py-2 rounded-lg text-sm font-medium cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="requiresAgreement" name="requires_agreement" value="0" class="sr-only"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="border-t border-zinc-100"></div>

                            {{-- ==================== Sección 3: Modalidad de Interés ==================== --}}
                            <fieldset class="px-6 py-6 space-y-5">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">3</span>
                                    <div>
                                        <h3 class="font-semibold text-zinc-900 text-sm">Modalidad de Interés</h3>
                                        <p class="text-xs text-zinc-500">Tipo de vinculación y disponibilidad</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-zinc-700 mb-2.5">Tipo de vinculación <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                        @foreach(\App\Models\InternshipApplication::TYPES as $value => $label)
                                            <label :class="internshipType === '{{ $value }}'
                                                    ? 'border-primary-500 bg-primary-50/50 ring-1 ring-primary-500/20'
                                                    : 'border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50'"
                                                class="relative flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="internshipType" name="internship_type" value="{{ $value }}" class="sr-only">
                                                <div :class="internshipType === '{{ $value }}' ? 'border-primary-500 bg-primary-500' : 'border-zinc-300'"
                                                    class="w-4 h-4 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors">
                                                    <div x-show="internshipType === '{{ $value }}'" class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                                </div>
                                                <span :class="internshipType === '{{ $value }}' ? 'font-medium text-primary-900' : 'text-zinc-700'" class="text-sm">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('internship_type') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-zinc-700 mb-2.5">Disponibilidad horaria <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                                        @foreach(\App\Models\InternshipApplication::AVAILABILITY as $value => $label)
                                            <label :class="availabilityVal === '{{ $value }}'
                                                    ? 'border-primary-500 bg-primary-50/50 ring-1 ring-primary-500/20'
                                                    : 'border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50'"
                                                class="relative flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="availabilityVal" name="availability" value="{{ $value }}" class="sr-only">
                                                <div :class="availabilityVal === '{{ $value }}' ? 'border-primary-500 bg-primary-500' : 'border-zinc-300'"
                                                    class="w-4 h-4 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors">
                                                    <div x-show="availabilityVal === '{{ $value }}'" class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                                </div>
                                                <span :class="availabilityVal === '{{ $value }}' ? 'font-medium text-primary-900' : 'text-zinc-700'" class="text-sm">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('availability') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="available_from" class="block text-sm font-medium text-zinc-700 mb-1.5">Fecha aproximada de inicio</label>
                                        <input id="available_from" type="date" wire:model="available_from"
                                            class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 {{ $errors->has('available_from') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                        @error('available_from') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-zinc-700 mb-2.5">Duración estimada <span class="text-red-500">*</span></label>
                                        <div class="grid grid-cols-3 gap-2.5">
                                            @foreach(\App\Models\InternshipApplication::DURATION as $value => $label)
                                                <label :class="estimatedDuration === '{{ $value }}'
                                                        ? 'border-primary-500 bg-primary-50/50 ring-1 ring-primary-500/20'
                                                        : 'border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50'"
                                                    class="relative flex items-center justify-center px-3 py-3 rounded-xl border-2 cursor-pointer transition-all duration-150 text-center">
                                                    <input type="radio" x-model="estimatedDuration" name="estimated_duration" value="{{ $value }}" class="sr-only">
                                                    <span :class="estimatedDuration === '{{ $value }}' ? 'font-medium text-primary-900' : 'text-zinc-700'" class="text-sm">{{ $label }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        @error('estimated_duration') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <div class="border-t border-zinc-100"></div>

                            {{-- ==================== Sección 4: Motivación ==================== --}}
                            <fieldset class="px-6 py-6 space-y-5">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">4</span>
                                    <div>
                                        <h3 class="font-semibold text-zinc-900 text-sm">Motivación</h3>
                                        <p class="text-xs text-zinc-500">Cuéntanos sobre ti y tu interés</p>
                                    </div>
                                </div>

                                <div>
                                    <label for="motivation" class="block text-sm font-medium text-zinc-700 mb-1.5">¿Por qué deseas participar en este programa? <span class="text-red-500">*</span></label>
                                    <textarea id="motivation" wire:model="motivation" rows="4" placeholder="Cuéntanos tu motivación..."
                                        class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 resize-none {{ $errors->has('motivation') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}"></textarea>
                                    @error('motivation') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-zinc-700 mb-2">¿Experiencia en trabajo comunitario o social?</label>
                                    <div class="inline-flex rounded-xl border border-zinc-200 p-1 bg-zinc-50">
                                        <label :class="hasCommunityExperience === '1' ? 'bg-white text-primary-700 shadow-sm' : 'text-zinc-500 hover:text-zinc-700'"
                                            class="px-5 py-2 rounded-lg text-sm font-medium cursor-pointer transition-all duration-150">
                                            <input type="radio" x-model="hasCommunityExperience" name="has_community_experience" value="1" class="sr-only"> Sí
                                        </label>
                                        <label :class="hasCommunityExperience === '0' ? 'bg-white text-primary-700 shadow-sm' : 'text-zinc-500 hover:text-zinc-700'"
                                            class="px-5 py-2 rounded-lg text-sm font-medium cursor-pointer transition-all duration-150">
                                            <input type="radio" x-model="hasCommunityExperience" name="has_community_experience" value="0" class="sr-only"> No
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-zinc-700 mb-2.5">¿Cómo te enteraste de esta oportunidad?</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                        @foreach(\App\Models\InternshipApplication::SOURCES as $value => $label)
                                            <label :class="sourceVal === '{{ $value }}'
                                                    ? 'border-primary-500 bg-primary-50/50 ring-1 ring-primary-500/20'
                                                    : 'border-zinc-200 hover:border-zinc-300 hover:bg-zinc-50'"
                                                class="relative flex items-center gap-3 px-4 py-3 rounded-xl border-2 cursor-pointer transition-all duration-150">
                                                <input type="radio" x-model="sourceVal" name="source" value="{{ $value }}" class="sr-only">
                                                <div :class="sourceVal === '{{ $value }}' ? 'border-primary-500 bg-primary-500' : 'border-zinc-300'"
                                                    class="w-4 h-4 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors">
                                                    <div x-show="sourceVal === '{{ $value }}'" class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                                </div>
                                                <span :class="sourceVal === '{{ $value }}' ? 'font-medium text-primary-900' : 'text-zinc-700'" class="text-sm">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div x-show="sourceVal === 'otro'" x-cloak>
                                    <label for="source_other" class="block text-sm font-medium text-zinc-700 mb-1.5">Especifica cómo te enteraste <span class="text-red-500">*</span></label>
                                    <input id="source_other" type="text" wire:model="source_other" placeholder="Describe cómo te enteraste"
                                        class="w-full rounded-xl px-4 py-3 text-sm bg-white border transition-all duration-200 focus:outline-none focus:ring-2 placeholder:text-zinc-400 {{ $errors->has('source_other') ? 'border-red-300 focus:border-red-500 focus:ring-red-500/20' : 'border-zinc-200 hover:border-zinc-300 focus:border-primary-500 focus:ring-primary-500/20' }}">
                                    @error('source_other') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </fieldset>

                            <div class="border-t border-zinc-100"></div>

                            {{-- ==================== Sección 5: Documento Adjunto ==================== --}}
                            <fieldset class="px-6 py-6 space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">5</span>
                                    <div>
                                        <h3 class="font-semibold text-zinc-900 text-sm">Documento Adjunto</h3>
                                        <p class="text-xs text-zinc-500">CV o carta de presentación (opcional)</p>
                                    </div>
                                </div>

                                <div>
                                    <label class="flex flex-col items-center justify-center py-8 px-6 border-2 border-dashed rounded-xl cursor-pointer transition-all duration-200
                                        {{ $cv
                                            ? 'border-primary-300 bg-primary-50/30'
                                            : ($errors->has('cv') ? 'border-red-300 bg-red-50/30' : 'border-zinc-300 hover:border-primary-400 hover:bg-primary-50/20') }}">
                                        <input type="file" wire:model="cv" accept=".pdf" class="sr-only">

                                        <div wire:loading.remove wire:target="cv">
                                            @if($cv)
                                                <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center mx-auto mb-3">
                                                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-sm font-medium text-primary-700">{{ $cv->getClientOriginalName() }}</span>
                                                <span class="text-xs text-zinc-400 mt-1">Haz clic para cambiar el archivo</span>
                                            @else
                                                <div class="w-12 h-12 rounded-full bg-zinc-100 flex items-center justify-center mx-auto mb-3">
                                                    <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                    </svg>
                                                </div>
                                                <span class="text-sm font-medium text-zinc-700">Haz clic para subir tu CV</span>
                                                <span class="text-xs text-zinc-400 mt-1">PDF · Máximo 10 MB</span>
                                            @endif
                                        </div>

                                        <div wire:loading wire:target="cv" class="flex flex-col items-center">
                                            <svg class="w-8 h-8 text-primary-500 animate-spin mb-2" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                            </svg>
                                            <span class="text-sm text-primary-600 font-medium">Subiendo archivo...</span>
                                        </div>
                                    </label>
                                    @error('cv') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </fieldset>

                        </div>{{-- end scrollable body --}}

                        {{-- ── Footer ── --}}
                        <div class="shrink-0 border-t border-zinc-100 px-6 py-4 bg-zinc-50/50 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                            <button
                                type="button"
                                @click="open = false"
                                class="w-full sm:w-auto px-5 py-2.5 text-sm font-medium text-zinc-600 hover:text-zinc-800 bg-white border border-zinc-200 hover:border-zinc-300 rounded-xl transition-all duration-200"
                            >
                                Cancelar
                            </button>
                            <button
                                type="submit"
                                wire:loading.attr="disabled"
                                wire:loading.class="opacity-70 cursor-wait"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-primary-600 text-white font-semibold text-sm rounded-xl hover:bg-primary-700 active:bg-primary-800 shadow-sm hover:shadow transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span wire:loading.remove wire:target="submit">Enviar solicitud</span>
                                <span wire:loading wire:target="submit" class="inline-flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                    </svg>
                                    Enviando...
                                </span>
                            </button>
                        </div>
                    </form>

                </div>{{-- end modal card --}}
            </div>{{-- end panel --}}
        </div>{{-- end modal --}}
        </template>
    @endif
</div>
