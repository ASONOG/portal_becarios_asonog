<x-layouts::public title="Donar" description="Tu donación hace posible que más jóvenes hondureños accedan a educación de calidad.">

    {{-- Hero --}}
    <section class="relative py-20 overflow-hidden">
        <img src="{{ asset('img/donar-hero.webp') }}" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
        <div class="absolute inset-0 bg-zinc-900/75"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <p data-aos="fade-down" class="text-primary-200 font-semibold uppercase tracking-widest text-sm mb-3">Apoya Nuestra Causa</p>
            <h1 data-aos="fade-up" data-aos-delay="100" class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Tu donación cambia vidas</h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-200 max-w-2xl mx-auto text-lg">
                Cada aporte —grande o pequeño— permite que un joven hondureño tenga acceso a educación
                de calidad y construya un mejor futuro para sí mismo y su comunidad.
            </p>
        </div>
    </section>

    {{-- Impacto de la Donación --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Tu impacto</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">¿Qué logra tu donación?</h2>
                <p class="mt-3 text-zinc-500">Así es como cada aporte impacta directamente en los becarios.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-aos="fade-up" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl hover:shadow-md transition">
                    <div class="text-4xl font-extrabold text-primary-600 mb-3">130 L</div>
                    <p class="text-zinc-500 text-sm">Tu apoyo ayuda a cubrir la compra de útiles escolares de un alumno</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl hover:shadow-md transition">
                    <div class="text-4xl font-extrabold text-green-600 mb-3">300 L </div>
                    <p class="text-zinc-500 text-sm">Tu colaboración permite que un becario llegue a su centro de estudio cada día</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl hover:shadow-md transition">
                    <div class="text-4xl font-extrabold text-purple-600 mb-3">600 L</div>
                    <p class="text-zinc-500 text-sm">Su contribución permite financiar la matrícula universitaria de un becario</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-zinc-50 text-center p-8 border border-zinc-100 rounded-2xl hover:shadow-md transition">
                    <div class="text-4xl font-extrabold text-secondary-600 mb-3">1,300 L</div>
                    <p class="text-zinc-500 text-sm">Con tu colaboración contribuyes al patrocinio de una beca para un becario</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Formulario de Donación --}}
    <section class="py-20 bg-zinc-50" id ="formulario-donar">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-primary-600 text-white p-8 text-center">
                    <h2 class="text-2xl font-bold mb-2">Hacer una donación</h2>
                    <p class="text-primary-200 text-sm">Proceso seguro vía PayPal · 100% del dinero va a los becarios</p>
                </div>

                <div class="p-8">
                    <livewire:donation-form />
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonios --}}
    <section class="py-20 bg-white" id="historias-de-exito">
        <style>.stories-track::-webkit-scrollbar{display:none}</style>

        @php
        $becarios = [
             ['nombre' => 'Carlos',   'depto' => 'Copán',         'carrera' => 'Lic. en Desarrollo Social',  'avatar' => 'CA', 'tag' => 'Inclusión',             'historia' => 'Nació con una condición que le impide caminar, pero eso no detuvo su impulso. Promueve la inclusión y los derechos de las personas con discapacidad desde la educación digital.'],
            ['nombre' => 'Xiomara',  'depto' => 'Santa Bárbara', 'carrera' => 'Técnico en Administración',  'avatar' => 'XI', 'tag' => 'Primera generación',   'historia' => 'Primera mujer de su familia en acceder a la universidad, abriendo un camino que sus hermanas menores ahora también sueñan con recorrer.'],
            ['nombre' => 'Mariela',  'depto' => 'Copán',         'carrera' => 'Técnico en Laboratorio',     'avatar' => 'MA', 'tag' => 'Perseverancia',         'historia' => 'Superó barreras económicas para ejercer su derecho a formarse. Su esfuerzo diario es la prueba de que cuando hay voluntad, siempre hay un camino hacia adelante.']
        ];
        @endphp

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Testimonios</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Historias de Éxito</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto">
                    Voces reales de becarios que, con esfuerzo y determinación, están construyendo un futuro diferente para sí mismos y para sus comunidades.
                </p>
            </div>

            <div class="relative" data-aos="fade-up" data-aos-delay="100">

                {{-- Track --}}
                <div 
                    class="stories-track flex gap-5 overflow-x-auto snap-x snap-mandatory pb-4"
                     style="scrollbar-width:none;-ms-overflow-style:none;">

                    @foreach($becarios as $b)
                    <div data-card
                         class="snap-start flex-shrink-0 w-[82vw] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)]
                                bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden flex flex-col
                                hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                        {{-- Accent bar --}}
                        <div class="h-1 bg-primary-600"></div>

                        <div class="p-5 flex flex-col flex-1 gap-4">

                            {{-- Persona --}}
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary-50 border border-primary-100
                                            flex items-center justify-center shrink-0">
                                    <span class="text-primary-700 font-bold text-xs tracking-wide">{{ $b['avatar'] }}</span>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-zinc-900 text-sm leading-tight">{{ $b['nombre'] }}</h4>
                                    <p class="text-xs text-zinc-400 mt-0.5 flex items-center gap-1">
                                        <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $b['depto'] }}, Honduras
                                    </p>
                                    <p class="text-xs text-primary-600 font-medium mt-0.5">{{ $b['carrera'] }}</p>
                                </div>
                            </div>

                            {{-- Historia --}}
                            <blockquote class="flex-1 text-sm text-zinc-600 leading-relaxed border-l-2 border-primary-100 pl-3.5 italic">
                                "{{ $b['historia'] }}"
                            </blockquote>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-3 border-t border-zinc-100">
                                <span class="inline-flex items-center text-xs font-medium text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-full">
                                    {{ $b['tag'] }}
                                </span>
                                <span class="text-xs text-zinc-400">Becario/a ASONOG</span>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Final --}}
    <section class="py-16 bg-zinc-50 border-t border-zinc-100">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-up">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Haz la diferencia hoy</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">¿Listo para cambiar una vida?</h2>
                <p class="mt-3 text-zinc-500 max-w-xl mx-auto leading-relaxed">
                    Cada donación, por pequeña que sea, abre puertas para un joven hondureño.
                </p>
                <div class="mt-8">
                    <a href="#formulario-donar"
                       class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-3.5 rounded-lg transition-colors">
                        Donar ahora
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts::public>
