<x-layouts::public title="Donar" description="Tu donación hace posible que más jóvenes hondureños accedan a educación de calidad.">

    {{-- Hero --}}
    <section class="relative py-28 sm:py-36 overflow-hidden">
        <img src="{{ asset('img/donar-hero.webp') }}" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/85"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Etiqueta superior --}}
            <div data-aos="fade-down" class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-primary-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 animate-pulse"></span>
                Apoya a un becario
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-5 text-white">
                Tu donación<br class="hidden sm:block">cambia vidas
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg leading-relaxed text-left sm:text-center">
                Cada aporte —grande o pequeño— permite que un joven hondureño tenga acceso a educación
                de calidad y construya un mejor futuro para sí mismo y su comunidad.
            </p>

            {{-- CTAs --}}
            <div data-aos="fade-up" data-aos-delay="300" class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="#formulario-donar"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                    Donar ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a href="#impacto"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium rounded-xl transition-all duration-200">
                    Ver el impacto
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-8 inset-x-0 flex justify-center" aria-hidden="true">
            <a href="#impacto" class="flex flex-col items-center gap-1.5 text-white/40 hover:text-white/70 transition-colors">
                <span class="text-xs tracking-widest uppercase font-medium">Descubre más</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- Impacto de la Donación --}}
    <section class="py-16 bg-white" id="impacto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Tu impacto</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">¿Qué logra tu donación?</h2>
                <p class="mt-3 text-zinc-500">Así es como cada aporte impacta directamente en los becarios.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-aos="fade-up" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl">
                    <div class="text-4xl font-extrabold text-primary-600 mb-3">130 L</div>
                    <p class="text-zinc-500 text-sm">Tu apoyo ayuda a cubrir la compra de útiles escolares de un alumno</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl">
                    <div class="text-4xl font-extrabold text-green-600 mb-3">300 L </div>
                    <p class="text-zinc-500 text-sm">Tu colaboración permite que un becario llegue a su centro de estudio cada día</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl">
                    <div class="text-4xl font-extrabold text-purple-600 mb-3">600 L</div>
                    <p class="text-zinc-500 text-sm">Su contribución permite financiar la matrícula universitaria de un becario</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl">
                    <div class="text-4xl font-extrabold text-secondary-600 mb-3">1,300 L</div>
                    <p class="text-zinc-500 text-sm">Con tu colaboración contribuyes al patrocinio de una beca para un becario</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Formulario de Donación --}}
    <section class="py-20 bg-zinc-50" id="formulario-donar">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-primary-600 text-white p-8 text-center">
                    <h2 class="text-2xl font-bold mb-2">Hacer una donación</h2>
                    <p class="text-primary-200 text-sm flex items-center justify-center gap-1.5">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Proceso seguro · 100% del dinero va a los becarios
                    </p>
                </div>

                <div class="p-8">
                    <livewire:donation-page />
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonios --}}
    <x-historias-exito :limite="3" :inicio="4" bg="bg-white" />

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
                <span class="inline-block text-primary-200 text-xs font-bold uppercase tracking-widest mb-4">Haz la diferencia hoy</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    ¿Listo para cambiar<br class="hidden sm:block"> una vida?
                </h2>
                <p class="mt-5 text-primary-100 text-lg max-w-xl mx-auto leading-relaxed">
                    Cada donación, por pequeña que sea, abre puertas para un joven hondureño.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="600" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#formulario-donar"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-primary-50 transition-colors text-base">
                    Donar ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('programs') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium px-8 py-4 rounded-xl transition-all duration-200 text-base">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Ver programas de becas
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
