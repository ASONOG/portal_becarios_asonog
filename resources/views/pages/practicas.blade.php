<x-layouts::public title="Prácticas, Pasantías y Voluntariados" description="Oportunidades de vinculación formativa: prácticas profesionales, pasantías y voluntariados con ASONOG.">

    {{-- Hero --}}
    <section class="bg-linear-to-br from-green-700 to-green-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-green-200 font-semibold uppercase tracking-widest text-sm mb-3">Vinculación Formativa</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Prácticas Profesionales,<br>Pasantías y Voluntariados</h1>
            <p class="text-green-100 max-w-2xl mx-auto text-lg">
                Conectamos a estudiantes y profesionales con oportunidades de vinculación formativa
                que fortalecen sus competencias y generan impacto en las comunidades hondureñas.
            </p>
            <div class="mt-8">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-green-700 font-bold rounded-xl shadow-lg hover:bg-green-50 transition">
                    Inscribirme ahora
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Descripción / Objetivo --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-widest text-green-600">Sobre este programa</span>
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
                <div class="rounded-2xl bg-linear-to-br from-green-50 to-green-100 p-8 flex flex-col gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Experiencia real</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Trabajo en proyectos reales de impacto social y comunitario.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-zinc-900">Desarrollo profesional</h4>
                            <p class="text-sm text-zinc-600 mt-0.5">Fortalecimiento de competencias técnicas y habilidades blandas.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center shrink-0">
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
    <section class="py-20 bg-zinc-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-xs font-semibold uppercase tracking-widest text-green-600">Oportunidades disponibles</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Tipos de Vinculación</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto">
                    Elige la modalidad que mejor se adapte a tu perfil académico y profesional.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                {{-- Prácticas Profesionales --}}
                <div class="bg-white border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-2 bg-green-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Prácticas Profesionales</h3>
                                <span class="text-xs font-medium text-green-700 bg-green-50 px-2 py-0.5 rounded-full">3–6 meses</span>
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
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Convocatoria semestral</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-green-700 hover:text-green-800 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Pasantías --}}
                <div class="bg-white border-2 border-green-600 rounded-2xl overflow-hidden hover:shadow-xl transition-shadow relative">
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">⭐ Popular</span>
                    </div>
                    <div class="h-2 bg-green-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-green-600 flex items-center justify-center shrink-0">
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
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Convocatoria permanente</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-green-700 hover:text-green-800 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Voluntariados --}}
                <div class="bg-white border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
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
                            de impacto social. Áreas como educación, salud, medio ambiente, comunicación y
                            fortalecimiento organizacional.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Sin requisito de carrera específica</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Trabajo de campo comunitario</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Constancia de servicio social</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Inscripción abierta</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Requisitos --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-zinc-900 mb-3">Requisitos para Participar</h2>
                <p class="text-zinc-500">Verifica que cumples con los requisitos antes de iniciar tu solicitud.</p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach([
                    ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'title' => 'Ser estudiante o egresado', 'desc' => 'Estar inscrito en una universidad, centro técnico o haber egresado en los últimos 2 años.'],
                    ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'title' => 'Carta de la institución', 'desc' => 'Carta de solicitud o aval de la institución educativa de procedencia.'],
                    ['icon' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0', 'title' => 'Disponibilidad horaria', 'desc' => 'Cumplir con el horario y la duración establecida según el tipo de vinculación.'],
                    ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'title' => 'Documentación personal', 'desc' => 'DNI vigente, hoja de vida actualizada y fotografía reciente.'],
                    ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Compromiso ético', 'desc' => 'Aceptar el código de conducta y los valores institucionales de ASONOG.'],
                    ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Edad mínima', 'desc' => 'Tener al menos 18 años cumplidos al momento de la solicitud.'],
                ] as $req)
                <div class="bg-zinc-50 border border-zinc-100 rounded-xl p-5 flex gap-4">
                    <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $req['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-zinc-900 text-sm">{{ $req['title'] }}</h4>
                        <p class="text-xs text-zinc-500 mt-0.5">{{ $req['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Mecanismo de Inscripción --}}
    <section class="py-20 bg-zinc-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-green-600">Paso a paso</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Mecanismo de Inscripción</h2>
                <p class="mt-3 text-zinc-500 max-w-2xl mx-auto">
                    Sigue estos pasos para aplicar a cualquiera de nuestras oportunidades de vinculación formativa.
                </p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white flex items-center justify-center mx-auto mb-4 font-bold text-lg">1</div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Crea tu cuenta</h4>
                    <p class="text-sm text-zinc-500">Regístrate en el portal con tu correo electrónico y datos personales.</p>
                </div>
                <div class="relative bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white flex items-center justify-center mx-auto mb-4 font-bold text-lg">2</div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Completa tu solicitud</h4>
                    <p class="text-sm text-zinc-500">Llena el formulario de inscripción y adjunta los documentos requeridos.</p>
                </div>
                <div class="relative bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white flex items-center justify-center mx-auto mb-4 font-bold text-lg">3</div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Revisión y selección</h4>
                    <p class="text-sm text-zinc-500">Nuestro equipo evalúa las solicitudes y selecciona a los candidatos idóneos.</p>
                </div>
                <div class="relative bg-white rounded-xl p-6 border border-zinc-100 text-center">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white flex items-center justify-center mx-auto mb-4 font-bold text-lg">4</div>
                    <h4 class="font-semibold text-zinc-900 mb-1">Asignación e inicio</h4>
                    <p class="text-sm text-zinc-500">Recibirás la asignación a un proyecto o área y comenzarás tu experiencia formativa.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Final --}}
    <section class="py-20 bg-green-700 text-white text-center">
        <div class="max-w-2xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">¡Forma parte de nuestra red!</h2>
            <p class="text-green-100 mb-8">Inscríbete y accede a oportunidades de crecimiento profesional mientras generas impacto positivo en Honduras.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-7 py-3.5 bg-white text-green-700 font-bold rounded-xl shadow hover:bg-green-50 transition">
                    Crear cuenta gratis
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-7 py-3.5 border border-green-400 text-white font-semibold rounded-xl hover:bg-green-600 transition">
                    Ya tengo cuenta
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
