<x-layouts::public title="Contacto" description="¿Tienes dudas? Contáctanos y te responderemos a la brevedad posible.">

    {{-- Hero --}}
    <section class="relative py-28 sm:py-36 overflow-hidden">
        <img src="{{ asset('img/hero-img.webp') }}" alt="" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/85"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Etiqueta superior --}}
            <div data-aos="fade-down" class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-primary-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 animate-pulse"></span>
                Estamos para ayudarte
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-5 text-white">
                Contáctanos
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg leading-relaxed text-left sm:text-center">
                ¿Tienes preguntas sobre los programas de Gestión del Conocimiento? Escríbenos o visítanos.
            </p>

            {{-- CTAs --}}
            <div data-aos="fade-up" data-aos-delay="300" class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="#contacto"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                    Enviar mensaje
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12 3 3l18 9-18 9 3-9Zm0 0h7"/>
                    </svg>
                </a>
                <a href="{{ route('programs') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium rounded-xl transition-all duration-200">
                    Ver programas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-8 inset-x-0 flex justify-center" aria-hidden="true">
            <a href="#contacto" class="flex flex-col items-center gap-1.5 text-white/40 hover:text-white/70 transition-colors">
                <span class="text-xs tracking-widest uppercase font-medium">Escríbenos</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- Contacto Main --}}
    <section class="py-20" id="contacto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-14 items-start">

                {{-- Formulario --}}
                <div>
                    <h2 class="text-2xl font-bold text-zinc-900 mb-2">Envíanos un mensaje</h2>
                    <p class="text-zinc-500 mb-8">Te responderemos en un plazo de 2 a 3 días hábiles.</p>

                    <livewire:contact-form />
                </div>

                {{-- Información de contacto --}}
                <div class="space-y-8">

                    <div>
                        <h2 class="text-2xl font-bold text-zinc-900 mb-6">Información de contacto</h2>
                        <div class="space-y-5">

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Dirección</p>
                                    <p class="text-zinc-500 text-sm">Barrio El Calvario, <br>Santa Rosa de Copán, Honduras</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Teléfono</p>
                                    <p class="text-zinc-500 text-sm">+504 2662-2626</p>
                                    <p class="text-zinc-400 text-xs">Lunes a viernes, 8:00 AM – 5:00 PM</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Correo electrónico</p>
                                    <p class="text-zinc-500 text-sm">talentohumano@asonog.hn</p>
                                    <p class="text-zinc-400 text-xs">Para consultas sobre gestión del conocimiento</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Horarios --}}
                    <div class="bg-zinc-50 border border-zinc-100 rounded-2xl p-6">
                        <h3 class="font-semibold text-zinc-900 mb-4">Horarios de atención</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Lunes – Viernes</span>
                                <span class="font-medium text-zinc-900">8:00 AM – 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Sábado</span>
                                <span class="text-zinc-400">Cerrado</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Domingo</span>
                                <span class="text-zinc-400">Cerrado</span>
                            </div>
                        </div>
                    </div>

                    {{-- Redes Sociales --}}
                    <div>
                        <h3 class="font-semibold text-zinc-900 mb-4">Síguenos en redes</h3>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/ASONOG" target="_blank" class="w-11 h-11 rounded-lg border border-zinc-200 text-zinc-500 flex items-center justify-center hover:border-primary-500 hover:text-primary-600 transition" aria-label="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                            </a>
                            <a href="https://www.instagram.com/asonog_honduras/" target="_blank" class="w-11 h-11 rounded-lg border border-zinc-200 text-zinc-500 flex items-center justify-center hover:border-primary-500 hover:text-primary-600 transition" aria-label="Instagram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.265.069 1.645.069 4.849s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.265.058-1.645.069-4.849.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.31-3.608C4.518 2.567 5.785 2.295 7.15 2.233 8.416 2.175 8.796 2.163 12 2.163zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98C.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/company/asonog" target="_blank" class="w-11 h-11 rounded-lg border border-zinc-200 text-zinc-500 flex items-center justify-center hover:border-primary-500 hover:text-primary-600 transition" aria-label="LinkedIn">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="https://www.youtube.com/@asonog8695" target="_blank" class="w-11 h-11 rounded-lg border border-zinc-200 text-zinc-500 flex items-center justify-center hover:border-primary-500 hover:text-primary-600 transition" aria-label="YouTube">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- CTA Final --}}
    <section class="relative py-24 overflow-hidden bg-primary-700">
        {{-- Decorative circles --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-primary-600/50 blur-3xl pointer-events-none" aria-hidden="true"></div>
        <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-primary-800/60 blur-3xl pointer-events-none" aria-hidden="true"></div>
        {{-- Grid texture overlay --}}
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
             style="background-image: repeating-linear-gradient(0deg,#fff 0,#fff 1px,transparent 1px,transparent 40px), repeating-linear-gradient(90deg,#fff 0,#fff 1px,transparent 1px,transparent 40px);"
             aria-hidden="true"></div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-up" data-aos-duration="700">
                <span class="inline-block text-primary-200 text-xs font-bold uppercase tracking-widest mb-4">Conoce más</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    Descubre cómo<br class="hidden sm:block"> transformamos vidas
                </h2>
                <p class="mt-5 text-primary-100 text-lg max-w-xl mx-auto leading-relaxed">
                    Conoce nuestros programas de becas y descubre cómo puedes ser parte del cambio en Honduras.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="600" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('programs') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-primary-50 transition-colors text-base">
                    Ver programas de becas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('donate') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium px-8 py-4 rounded-xl transition-all duration-200 text-base">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Apoyar la causa
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
