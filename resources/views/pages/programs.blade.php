<x-layouts::public title="Becas"
    description="Conoce el objetivo, población meta, tipos de becas e historias de éxito del programa de becas de ASONOG.">

    {{-- Hero --}}
    <section class="relative py-28 sm:py-36 overflow-hidden">
        {{-- Imagen de fondo --}}
        <img src="{{ asset('img/becas-hero.webp') }}" alt="" class="absolute inset-0 w-full h-full object-cover"
            aria-hidden="true">
        {{-- Overlay con degradado para dar más profundidad --}}
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/85"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Etiqueta superior --}}
            <div data-aos="fade-down" class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-primary-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 animate-pulse"></span>
                Programas de Becas
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-5 text-white">
                Más que becas,<br class="hidden sm:block">transformamos vidas
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg leading-relaxed text-left sm:text-center">
                Conoce a los jóvenes que, gracias a nuestras becas universitarias, están construyendo un futuro lleno de
                oportunidades y dejando huella en sus comunidades.
            </p>

            {{-- CTAs agrupados en fila --}}
            <div data-aos="fade-up" data-aos-delay="300" class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') . '#contacto' }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                    Postular ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="#historias-de-exito"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium rounded-xl transition-all duration-200">
                    Historias de éxito
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-8 inset-x-0 flex justify-center" aria-hidden="true">
            <a href="#objetivo" class="flex flex-col items-center gap-1.5 text-white/40 hover:text-white/70 transition-colors group">
                <span class="text-xs tracking-widest uppercase font-medium">Descubre más</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- Objetivo del Programa --}}
    <section class="py-20 bg-white" id="objetivo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Nuestras becas</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900 leading-tight">Nuestro propósito</h2>
                    <p class="mt-4 text-zinc-600 leading-relaxed">
                        Nuestro programa de becas universitarias apoya a jóvenes y mujeres con necesidad económica,
                        brindándoles educación, acompañamiento integral y herramientas para que lideren cambios
                        sociales, políticos y ecológicos en sus comunidades.
                    </p>

                </div>
                <div data-aos="fade-left"
                    class="rounded-2xl bg-linear-to-br from-primary-50 to-primary-100 p-8 flex flex-col gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Acceso educativo</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Eliminar barreras económicas que impiden el ingreso
                                al sistema educativo.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Permanencia y graduación</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Acompañar a los becarios hasta la culminación
                                exitosa de sus estudios.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Impacto comunitario</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Formar agentes de cambio comprometidos con el
                                desarrollo de sus comunidades.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Población Meta --}}
    <section class="py-20 bg-zinc-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">¿A quién va
                    dirigido?</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Población Meta</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto text-left md:text-center">
                    Nuestras becas están diseñadas para apoyar a quienes más lo necesitan, priorizando la equidad y la
                    inclusión.
                </p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-aos="fade-up" class="bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Juventud</h4>
                    <p class="text-sm text-zinc-500">Programa orientado a jóvenes de 18 a 35 años en situación de
                        vulnerabilidad económica, comprometidos con su desarrollo académico y personal.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Equidad de género</h4>
                    <p class="text-sm text-zinc-500">Fomentamos la participación de mujeres en el programa, priorizando
                        su acceso a oportunidades educativas que fortalezcan su desarrollo integral.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Educación sin barreras</h4>
                    <p class="text-sm text-zinc-500">El programa promueve la participación de personas con
                        discapacidad, garantizando su acceso a oportunidades educativas en condiciones de igualdad.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Raíces que inspiran futuro</h4>
                    <p class="text-sm text-zinc-500">Apoyamos a jóvenes de pueblos indígenas para que, a través de la
                        educación, fortalezcan su identidad, alcancen sus metas y generen cambios en sus comunidades.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Iniciativas Transversales --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Formación
                    integral</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Más que una beca</h2>
                <p class="mt-4 text-zinc-500 max-w-2xl mx-auto text-left md:text-center">
                    Nos enfocamos en acompañar a los becarios en su <strong
                        class="text-zinc-700 font-semibold">formación integral</strong>,
                    brindando herramientas que les permitan maximizar su talento y potenciar sus habilidades y
                    competencias a través de <strong class="text-zinc-700 font-semibold">iniciativas
                        transversales</strong>.
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-y-12 gap-x-6">

                {{-- 1. Talleres de habilidades blandas --}}
                <div data-aos="fade-up" data-aos-delay="0" class="flex flex-col items-center text-center group">
                    <div
                        class="w-28 h-28 rounded-full bg-sky-100 flex items-center justify-center mb-5 shadow-sm ring-4 ring-sky-50 group-hover:ring-sky-100 group-hover:scale-105 transition-all duration-300">
                        <svg class="w-12 h-12 text-sky-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-primary-600 text-sm leading-snug">Talleres de<br>habilidades blandas
                    </h3>
                    <p class="text-xs text-zinc-400 mt-2 leading-relaxed max-w-[140px]">Comunicación, liderazgo y
                        trabajo en equipo.</p>
                </div>

                {{-- 2. Labor social --}}
                <div data-aos="fade-up" data-aos-delay="75" class="flex flex-col items-center text-center group">
                    <div
                        class="w-28 h-28 rounded-full bg-amber-100 flex items-center justify-center mb-5 shadow-sm ring-4 ring-amber-50 group-hover:ring-amber-100 group-hover:scale-105 transition-all duration-300">
                        <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-primary-600 text-sm leading-snug">Labor social</h3>
                    <p class="text-xs text-zinc-400 mt-2 leading-relaxed max-w-[140px]">Servicio comunitario y
                        compromiso con la sociedad.</p>
                </div>

                {{-- 3. Atención Psicosocial --}}
                <div data-aos="fade-up" data-aos-delay="150" class="flex flex-col items-center text-center group">
                    <div
                        class="w-28 h-28 rounded-full bg-rose-100 flex items-center justify-center mb-5 shadow-sm ring-4 ring-rose-50 group-hover:ring-rose-100 group-hover:scale-105 transition-all duration-300">
                        <svg class="w-12 h-12 text-rose-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-primary-600 text-sm leading-snug">Atención<br>Psicosocial</h3>
                    <p class="text-xs text-zinc-400 mt-2 leading-relaxed max-w-[140px]">Acompañamiento emocional y
                        bienestar integral.</p>
                </div>

                {{-- 4. Empoderamiento en derechos humanos --}}
                <div data-aos="fade-up" data-aos-delay="225" class="flex flex-col items-center text-center group">
                    <div
                        class="w-28 h-28 rounded-full bg-violet-100 flex items-center justify-center mb-5 shadow-sm ring-4 ring-violet-50 group-hover:ring-violet-100 group-hover:scale-105 transition-all duration-300">
                        <svg class="w-12 h-12 text-violet-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-primary-600 text-sm leading-snug">Empoderamiento en<br>derechos
                        humanos</h3>
                    <p class="text-xs text-zinc-400 mt-2 leading-relaxed max-w-[140px]">Formación en derechos y
                        ciudadanía activa.</p>
                </div>

                {{-- 5. Incidencia --}}
                <div data-aos="fade-up" data-aos-delay="300"
                    class="flex flex-col items-center text-center group col-span-2 sm:col-span-1">
                    <div
                        class="w-28 h-28 rounded-full bg-emerald-100 flex items-center justify-center mb-5 shadow-sm ring-4 ring-emerald-50 group-hover:ring-emerald-100 group-hover:scale-105 transition-all duration-300">
                        <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-primary-600 text-sm leading-snug">Incidencia</h3>
                    <p class="text-xs text-zinc-400 mt-2 leading-relaxed max-w-[140px]">Participación y promoción del
                        cambio social.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Rostros del Programa --}}
    <section class="py-24 bg-zinc-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-5 gap-8 lg:gap-12 items-start">

                {{-- Columna izquierda: imagen principal vertical --}}
                <div data-aos="fade-right" data-aos-duration="900" class="lg:col-span-2">
                    <div class="relative overflow-hidden rounded-3xl aspect-[3/4] bg-zinc-200 shadow-xl">
                        <img src="{{ asset('img/becario-1.webp') }}" alt="Becario ASONOG"
                            class="absolute inset-0 w-full h-full object-cover">
                        {{-- Degradado inferior --}}
                        <div
                            class="absolute inset-x-0 bottom-0 h-2/5 bg-gradient-to-t from-zinc-900/80 via-zinc-900/30 to-transparent">
                        </div>
                        {{-- Badge superior --}}
                        <div class="absolute top-5 left-5">
                            <span
                                class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm text-primary-700 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-500 animate-pulse"></span>
                                Becario ASONOG
                            </span>
                        </div>
                        {{-- Cita sobre la imagen --}}
                        <div class="absolute bottom-6 left-6 right-6">
                            <svg class="w-5 h-5 text-white/50 mb-1.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <p class="text-white font-semibold text-sm leading-snug">Una oportunidad que cambió el
                                rumbo de mi vida.</p>
                            <p class="text-zinc-300 text-xs mt-1.5">Programa universitario · Honduras</p>
                        </div>
                    </div>
                </div>

                {{-- Columna derecha: texto + dos imágenes escalonadas + pullquote --}}
                <div class="lg:col-span-3 flex flex-col gap-8 lg:pt-4">

                    {{-- Encabezado y estadísticas --}}
                    <div data-aos="fade-left" data-aos-delay="150" data-aos-duration="800">
                        <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Rostros del
                            programa</span>
                        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900 leading-tight">
                            Cada beca,<br class="hidden sm:block"> una historia real
                        </h2>
                        <p class="mt-4 text-zinc-500 leading-relaxed max-w-md">
                            Detrás de cada beca hay una persona con sueños, con familia y con esfuerzo.
                            No solo cubrimos costos educativos — acompañamos, formamos y transformamos vidas.
                        </p>
                        {{-- Estadísticas --}}
                        <div class="mt-7 flex gap-0 divide-x divide-zinc-200 border-t border-zinc-200 pt-6">
                            <div class="pr-7">
                                <span class="block text-3xl font-extrabold text-zinc-900">+500</span>
                                <span
                                    class="text-xs text-zinc-400 mt-0.5 block leading-tight">Becarios<br>apoyados</span>
                            </div>
                            <div class="px-7">
                                <span class="block text-3xl font-extrabold text-zinc-900">15+</span>
                                <span class="text-xs text-zinc-400 mt-0.5 block leading-tight">Años
                                    de<br>trayectoria</span>
                            </div>
                            <div class="pl-7">
                                <span class="block text-3xl font-extrabold text-zinc-900">85%</span>
                                <span class="text-xs text-zinc-400 mt-0.5 block leading-tight">Tasa
                                    de<br>graduación</span>
                            </div>
                        </div>
                    </div>

                    {{-- Dos imágenes escalonadas --}}
                    <div class="grid grid-cols-2 gap-4 items-end">
                        <div data-aos="fade-up" data-aos-delay="280" data-aos-duration="700"
                            class="relative overflow-hidden rounded-2xl aspect-[4/3] bg-zinc-300 shadow-md group">
                            <img src="{{ asset('img/becario-2.webp') }}" alt="Becarios en formación"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div
                                class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-zinc-900/65 via-zinc-900/20 to-transparent">
                            </div>

                        </div>
                        {{-- Segunda imagen con desplazamiento para efecto editorial --}}
                        <div data-aos="fade-up" data-aos-delay="420" data-aos-duration="700"
                            class="relative overflow-hidden rounded-2xl aspect-[4/3] bg-zinc-300 shadow-md group mt-10">
                            <img src="{{ asset('img/becario-3.webp') }}" alt="Labor comunitaria"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div
                                class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-zinc-900/65 via-zinc-900/20 to-transparent">
                            </div>

                        </div>
                    </div>

                    {{-- Pull-quote institucional --}}
                    <div data-aos="fade-up" data-aos-delay="540" data-aos-duration="600"
                        class="flex items-start gap-4 bg-white border border-zinc-100 rounded-2xl px-6 py-5 shadow-sm">
                        <svg class="w-7 h-7 text-primary-300 shrink-0 mt-0.5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <div>
                            <p class="text-sm text-zinc-600 leading-relaxed italic">
                                "No solo les damos acceso a la educación — les brindamos las herramientas para que
                                se conviertan en líderes de sus propias comunidades."
                            </p>
                            <p class="text-xs text-primary-600 font-semibold mt-2.5 uppercase tracking-wide">Equipo
                                ASONOG</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Historias de Éxito --}}
    <section class="py-20 bg-zinc-50" id="historias-de-exito">
        <style>.stories-track::-webkit-scrollbar{display:none}</style>

        @php
        $becarios = [
            ['nombre' => 'Jacky',    'depto' => 'La Paz',        'carrera' => 'Lic. en Desarrollo Social',  'avatar' => 'JA', 'tag' => 'Primera generación',   'historia' => 'Joven de origen Lenca, fue la primera de su familia en llegar a la universidad. Su camino representa la esperanza de toda una comunidad que hoy la ve como ejemplo de que la educación transforma vidas.'],
            ['nombre' => 'Franklin', 'depto' => 'Ocotepeque',    'carrera' => 'Lic. en Pedagogía',          'avatar' => 'FR', 'tag' => 'Resiliencia',           'historia' => 'Perdió una mano en un accidente, pero su determinación es más fuerte que cualquier obstáculo. Con perseverancia y valentía sigue adelante en sus estudios, demostrando que ninguna barrera es insuperable.'],
            ['nombre' => 'Pamela',   'depto' => 'La Paz',        'carrera' => 'Lic. en Derecho',            'avatar' => 'PA', 'tag' => 'Defensora de derechos', 'historia' => 'Superó la violencia doméstica y, como madre soltera, estudia Derecho para defender los derechos de las mujeres. Su historia es un acto de valentía que inspira a quienes la rodean.'],
            ['nombre' => 'Luis',     'depto' => 'Copán',         'carrera' => 'Estudios en curso',          'avatar' => 'LU', 'tag' => 'Pueblo indígena',       'historia' => 'Líder Maya Chortí y defensor de los bienes comunes de su comunidad. La educación es para él una herramienta de lucha y de preservación de su identidad cultural.'],
            ['nombre' => 'Josué',    'depto' => 'Lempira',       'carrera' => 'Lic. en Enfermería',         'avatar' => 'JO', 'tag' => 'Comunidad rural',       'historia' => 'Creció en una comunidad rural donde la universidad era un sueño lejano. Hoy estudia Enfermería con la determinación de regresar a cuidar a quienes más lo necesitan.'],
            ['nombre' => 'Tatiana',  'depto' => 'Ocotepeque',    'carrera' => 'Lic. en Derecho',            'avatar' => 'TA', 'tag' => 'Emprendedora social',   'historia' => 'Lidera un grupo de mujeres emprendedoras en su municipio y estudia Derecho para darles respaldo legal. Combina el activismo comunitario con su formación profesional cada día.'],
            ['nombre' => 'Erika',    'depto' => 'Santa Bárbara', 'carrera' => 'Lic. en Derecho',            'avatar' => 'ES', 'tag' => 'Lideresa municipal',    'historia' => 'Lideresa en la red de mujeres de su municipio, combina el trabajo y el estudio con esfuerzo y dedicación. Es referente de que la persistencia abre puertas que parecían cerradas.'],
            ['nombre' => 'Erika',    'depto' => 'La Paz',        'carrera' => 'Lic. en Educación Primaria', 'avatar' => 'EL', 'tag' => 'Pueblo indígena',       'historia' => 'Lideresa del Consejo Indígena Lenca y promotora de la educación en su comunidad. Estudia para formar a las nuevas generaciones Lencas con orgullo por su identidad.'],
            ['nombre' => 'Carlos',   'depto' => 'Copán',         'carrera' => 'Lic. en Desarrollo Social',  'avatar' => 'CA', 'tag' => 'Inclusión',             'historia' => 'Nació con una condición que le impide caminar, pero eso no detuvo su impulso. Promueve la inclusión y los derechos de las personas con discapacidad desde la educación digital.'],
            ['nombre' => 'Xiomara',  'depto' => 'Santa Bárbara', 'carrera' => 'Técnico en Administración',  'avatar' => 'XI', 'tag' => 'Primera generación',   'historia' => 'Primera mujer de su familia en acceder a la universidad, abriendo un camino que sus hermanas menores ahora también sueñan con recorrer.'],
            ['nombre' => 'Mariela',  'depto' => 'Copán',         'carrera' => 'Técnico en Laboratorio',     'avatar' => 'MA', 'tag' => 'Perseverancia',         'historia' => 'Superó barreras económicas para ejercer su derecho a formarse. Su esfuerzo diario es la prueba de que cuando hay voluntad, siempre hay un camino hacia adelante.'],
        ];
        @endphp

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
             x-data="{
                 scrollBy(dir) {
                     const t = this.$refs.track;
                     const card = t.querySelector('[data-card]');
                     t.scrollBy({ left: dir * (card.offsetWidth + 20), behavior: 'smooth' });
                 }
             }">

            {{-- Header --}}
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Testimonios</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Historias de Éxito</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto text-left md:text-center">
                    Voces reales de becarios que, con esfuerzo y determinación, están construyendo un futuro diferente para sí mismos y para sus comunidades.
                </p>
            </div>

            {{-- Carousel --}}
            <div class="relative" data-aos="fade-up" data-aos-delay="100">

                {{-- Prev arrow --}}
                <button @click="scrollBy(-1)" aria-label="Anterior"
                        class="hidden sm:flex absolute -left-5 lg:-left-6 top-1/2 -translate-y-1/2 z-10
                               w-10 h-10 rounded-full bg-white border border-zinc-200 shadow-md
                               items-center justify-center text-zinc-400
                               hover:text-primary-600 hover:border-primary-300 hover:shadow-lg
                               transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                {{-- Track --}}
                <div x-ref="track"
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

                {{-- Next arrow --}}
                <button @click="scrollBy(1)" aria-label="Siguiente"
                        class="hidden sm:flex absolute -right-5 lg:-right-6 top-1/2 -translate-y-1/2 z-10
                               w-10 h-10 rounded-full bg-white border border-zinc-200 shadow-md
                               items-center justify-center text-zinc-400
                               hover:text-primary-600 hover:border-primary-300 hover:shadow-lg
                               transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

            </div>

            {{-- Hint --}}
            <p class="mt-5 text-center text-xs text-zinc-400 flex items-center justify-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4M8 15l4 4 4-4"/>
                </svg>
                Desliza para ver las {{ count($becarios) }} historias
            </p>

            {{-- Scroll progress bar (mobile) --}}
            <div class="sm:hidden mt-4 flex justify-center">
                <div class="w-24 h-1 rounded-full bg-zinc-200 overflow-hidden">
                    <div class="h-full rounded-full bg-primary-500 transition-all duration-200"
                         x-data="{ progress: 0 }"
                         x-init="
                             const track = $refs.track;
                             const update = () => {
                                 const max = track.scrollWidth - track.clientWidth;
                                 progress = max > 0 ? (track.scrollLeft / max) * 100 : 0;
                             };
                             track.addEventListener('scroll', update, { passive: true });
                             update();
                         "
                         :style="'width: ' + Math.max(15, progress) + '%'">
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
                <span class="inline-block text-primary-200 text-xs font-bold uppercase tracking-widest mb-4">Tu futuro comienza aquí</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    Una beca puede<br class="hidden sm:block"> cambiar tu historia
                </h2>
                <p class="mt-5 text-primary-100 text-lg max-w-xl mx-auto leading-relaxed">
                    No dejes que los recursos económicos sean un obstáculo. Da el primer paso y únete a cientos de jóvenes que ya están construyendo su futuro con ASONOG.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="600" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-primary-50 transition-colors text-base">
                    Postular ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('donate') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium px-8 py-4 rounded-xl transition-all duration-200 text-base">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Apoyar el programa
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
