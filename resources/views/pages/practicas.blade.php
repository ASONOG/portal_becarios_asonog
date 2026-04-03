<x-layouts::public title="Prácticas, Pasantías y Voluntariados" description="Oportunidades de vinculación formativa: prácticas profesionales, pasantías y voluntariados con ASONOG.">

    {{-- Hero --}}
    <section class="relative py-28 sm:py-36 overflow-hidden">
        <img src="{{ asset('img/practicas-hero.webp') }}" class="absolute inset-0 w-full h-full object-cover" alt="" aria-hidden="true">
        {{-- Overlay con degradado para profundidad --}}
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/85"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">

            {{-- Etiqueta superior --}}
            <div data-aos="fade-down" class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-primary-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 animate-pulse"></span>
                Convocatoria permanente
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-5">
                Prácticas, Pasantías<br class="hidden sm:block"> y Voluntariados
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg leading-relaxed text-left sm:text-center">
                Gana experiencia real en proyectos de impacto social y comunitario junto a ASONOG.
                Aplica según tu perfil y da el siguiente paso en tu formación profesional.
            </p>

            {{-- Badges de las 3 modalidades --}}
            <div data-aos="fade-up" data-aos-delay="260" class="mt-6 flex flex-wrap items-center justify-center gap-2">
                <a href="#tipos" class="inline-flex items-center gap-1.5 bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full transition-colors">
                    <svg class="w-3.5 h-3.5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Prácticas Profesionales
                </a>
                <a href="#tipos" class="inline-flex items-center gap-1.5 bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full transition-colors">
                    <svg class="w-3.5 h-3.5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Pasantías
                </a>
                <a href="#tipos" class="inline-flex items-center gap-1.5 bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full transition-colors">
                    <svg class="w-3.5 h-3.5 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    Voluntariados
                </a>
            </div>

            {{-- CTAs --}}
            <div data-aos="fade-up" data-aos-delay="320" class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3">
                <a href="#inscripcion"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-primary-700 font-bold rounded-xl shadow-lg hover:bg-primary-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                    Inscribirme ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#tipos"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium rounded-xl transition-all duration-200">
                    Ver modalidades
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
            </div>

        </div>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-8 inset-x-0 flex justify-center" aria-hidden="true">
            <a href="#objetivo" class="flex flex-col items-center gap-1.5 text-white/40 hover:text-white/70 transition-colors">
                <span class="text-xs tracking-widest uppercase font-medium">Descubre más</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- Descripción / Objetivo --}}
    <section class="py-20 bg-white" id="objetivo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Sobre este programa</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900 leading-tight">Formación a través de la experiencia</h2>
                    <p class="mt-4 text-zinc-600 leading-relaxed">
                        ASONOG facilita oportunidades de vinculación formativa orientadas a complementar la formación
                        académica de estudiantes y profesionales, permitiéndoles adquirir experiencia práctica en entornos
                        reales de trabajo dentro del ámbito del desarrollo comunitario y la gestión social.
                    </p>
                    <p class="mt-3 text-zinc-600 leading-relaxed">
                        A través de convenios con universidades, centros de formación técnica e instituciones aliadas,
                        ofrecemos espacios donde los participantes pueden aplicar sus conocimientos, desarrollar nuevas
                        habilidades y contribuir al bienestar de las comunidades más vulnerables de Honduras.
                    </p>
                </div>
                <div data-aos="fade-left" class="bg-zinc-50 rounded-2xl bg-linear-to-br from-primary-50 to-primary-100 p-8 flex flex-col gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Experiencia real</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Trabajo en proyectos reales de impacto social y comunitario.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Desarrollo profesional</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Fortalecimiento de competencias técnicas y habilidades blandas.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Red de contactos</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Conexión con organizaciones y profesionales del sector social.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tipos de Oportunidades --}}
    <section class="py-20 bg-zinc-50" id="tipos">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-14">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Oportunidades disponibles</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Tipos de Vinculación</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto text-left md:text-center">
                    Elige la modalidad que mejor se adapte a tu perfil académico y profesional.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                {{-- Prácticas Profesionales --}}
                <div data-aos="fade-up" class="bg-white border border-zinc-200 rounded-2xl overflow-hidden">
                    <div class="h-2 bg-primary-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Convocatoria permanente</h3>
                                <span class="text-xs font-medium text-primary-700 bg-primary-50 px-2 py-0.5 rounded-full">3–6 meses</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Espacios de práctica supervisada para estudiantes universitarios que necesitan completar su
                            requisito de práctica profesional. Participación en proyectos de desarrollo comunitario,
                            gestión organizacional y trabajo de campo.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Carta de aceptación institucional</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Supervisor asignado</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Certificado al finalizar</li>
                        </ul>
   
                    </div>
                </div>

                {{-- Pasantías --}}
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white border border-zinc-200 rounded-2xl overflow-hidden relative">
                    {{-- Badge destacada --}}
                    <div class="absolute top-4 right-4 z-10">
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-primary-700 bg-primary-50 border border-primary-200 px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            Más solicitada
                        </span>
                    </div>
                    <div class="h-2 bg-primary-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-primary-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Pasantías</h3>
                                <span class="text-xs font-medium text-green-700 bg-green-50 px-2 py-0.5 rounded-full">1–3 meses</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Programa de inmersión corta para estudiantes o recién egresados que desean conocer de cerca
                            el funcionamiento de una organización de desarrollo. Ideal para explorar áreas de interés
                            profesional y adquirir experiencia inicial.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Horarios flexibles</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Mentoría personalizada</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Carta de recomendación</li>
                        </ul>
                      
                    </div>
                </div>

                {{-- Voluntariados --}}
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white border border-zinc-200 rounded-2xl overflow-hidden">
                    <div class="h-2 bg-orange-500"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Voluntariados</h3>
                                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-0.5 rounded-full">Flexible</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Oportunidades para personas comprometidas que desean contribuir de forma voluntaria a proyectos
                            de impacto social. Áreas como educación, género, inclusión, medio ambiente, comunicación y
                            fortalecimiento organizacional.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-2">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Sin requisito de carrera específica</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Trabajo de campo comunitario</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Constancia de servicio social</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Requisitos --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Qué necesitas</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Requisitos para Participar</h2>
                <p class="mt-3 text-zinc-500">Verifica que cumples con los requisitos antes de iniciar tu solicitud.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'title' => 'Ser estudiante o egresado', 'desc' => 'Estar inscrito en una universidad, centro técnico o haber egresado en los últimos 2 años.'],
                    ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'title' => 'Carta de la institución', 'desc' => 'Carta de solicitud o aval de la institución educativa de procedencia.'],
                    ['icon' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0', 'title' => 'Disponibilidad horaria', 'desc' => 'Cumplir con el horario y la duración establecida según el tipo de vinculación.'],
                    ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'title' => 'Documentación personal', 'desc' => 'DNI vigente, hoja de vida actualizada y fotografía reciente.'],
                    ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Compromiso ético', 'desc' => 'Aceptar el código de conducta y los valores institucionales de ASONOG.'],
                    ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Edad mínima', 'desc' => 'Tener al menos 18 años cumplidos al momento de la solicitud.'],
                ] as $req)
                <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}" class="bg-white border border-zinc-100 rounded-xl p-6 flex gap-5">
                    <div class="w-12 h-12 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $req['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-zinc-900">{{ $req['title'] }}</h4>
                        <p class="text-sm text-zinc-500 mt-1">{{ $req['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Mecanismo de Inscripción --}}
    @php $form_url = 'https://forms.gle/BRgEWw3ZpVq24R7JA'; @endphp

    <section class="py-20 bg-zinc-50" id="inscripcion">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div data-aos="fade-up" class="text-center mb-10">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Inscripción</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">¿Cómo aplicar?</h2>
                <p class="mt-3 text-zinc-500 max-w-xl mx-auto text-left md:text-center">
                    El proceso es sencillo: completa el formulario en línea con tus datos y documentos,
                    y nuestro equipo se pondrá en contacto contigo.
                </p>
            </div>

            {{-- Steps inline --}}
            <div data-aos="fade-up" data-aos-delay="80" class="flex flex-col sm:flex-row items-start sm:items-center justify-center gap-3 sm:gap-0 mb-10">
                @foreach([
                    ['n' => '1', 'label' => 'Llena el formulario'],
                    ['n' => '2', 'label' => 'Revisamos tu solicitud'],
                    ['n' => '3', 'label' => 'Te contactamos'],
                ] as $step)
                <div class="flex items-center gap-2 sm:gap-3">
                    <span class="w-7 h-7 rounded-full bg-primary-600 text-white text-xs font-bold flex items-center justify-center shrink-0">{{ $step['n'] }}</span>
                    <span class="text-sm font-medium text-zinc-700">{{ $step['label'] }}</span>
                </div>
                @if(!$loop->last)
                <div class="hidden sm:block w-10 h-px bg-zinc-300 mx-3"></div>
                @endif
                @endforeach
            </div>

            {{-- Form card --}}
            <div data-aos="fade-up" data-aos-delay="160"
                 class="bg-white border border-zinc-200 rounded-2xl p-8 shadow-sm text-center">

                <div class="w-14 h-14 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-zinc-900 mb-1">Formulario de Inscripción</h3>
                <p class="text-sm text-zinc-500 mb-6 max-w-sm mx-auto">
                    Tendrás que indicar el tipo de vinculación que te interesa, tu carrera, disponibilidad
                    y adjuntar tu hoja de vida.
                </p>

                <a href="{{ $form_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-7 py-3 rounded-xl transition-colors shadow-sm">
                    Llenar formulario
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>

                <p class="mt-4 text-xs text-zinc-400">
                    El formulario abre en una nueva pestaña &middot; Respuesta en un plazo de 5 días hábiles
                </p>
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
                <span class="inline-block text-primary-200 text-xs font-bold uppercase tracking-widest mb-4">Tu experiencia comienza aquí</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    Da el siguiente paso<br class="hidden sm:block"> en tu formación
                </h2>
                <p class="mt-5 text-primary-100 text-lg max-w-xl mx-auto leading-relaxed">
                    Aplica ahora y únete a quienes ya están generando impacto real en las comunidades de Honduras.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="600"
                 class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3">
                <a href="{{ $form_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-primary-50 hover:-translate-y-0.5 hover:shadow-xl transition-all duration-200 text-base">
                    Llenar formulario
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium px-8 py-4 rounded-xl transition-all duration-200 text-base">
                    Contactar a ASONOG
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
