<x-layouts::public title="Programas de Becas" description="Descubre los programas de becas disponibles ofrecidos por ASONOG para jóvenes hondureños.">

    {{-- Hero --}}
    <section class="bg-linear-to-br from-primary-700 to-primary-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-primary-200 font-semibold uppercase tracking-widest text-sm mb-3">Programas de Becas</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Invirtiendo en el<br>Futuro de Honduras</h1>
            <p class="text-primary-100 max-w-2xl mx-auto text-lg">
                Ofrecemos distintos tipos de becas para apoyar a jóvenes talentosos con necesidad económica
                en su trayectoria educativa, desde básica hasta educación superior.
            </p>
            <div class="mt-8">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 transition">
                    Solicitar una beca
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Programas --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-zinc-900 mb-3">Nuestros Programas</h2>
                <p class="text-zinc-500">Selecciona el programa que mejor se adapte a tu situación académica.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Beca Educación Básica --}}
                <div class="border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-2 bg-primary-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-primary-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Beca Educación Básica</h3>
                                <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-0.5 rounded-full">Niveles 1–9</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Apoyo a niñas y niños en situación de vulnerabilidad para garantizar el acceso y la permanencia
                            en la educación básica en zonas rurales y urbano-marginales.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Útiles escolares cubiertos</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Apoyo alimentario</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Seguimiento académico</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Plazo: Anual</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Beca Educación Media --}}
                <div class="border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-2 bg-green-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Beca Educación Media</h3>
                                <span class="text-xs font-medium text-green-700 bg-green-50 px-2 py-0.5 rounded-full">Bachillerato</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Programa para jóvenes de bachillerato con alto rendimiento académico y escasos recursos,
                            priorizando carreras técnicas y científicas con proyección laboral.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Matrícula y mensualidad</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Materiales textiles y laboratorio</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Mentoría vocacional</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Plazo: Anual renovable</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-green-700 hover:text-green-800 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Beca Universitaria --}}
                <div class="border-2 border-primary-600 rounded-2xl overflow-hidden hover:shadow-xl transition-shadow relative">
                    <div class="absolute top-4 right-4">
                        <span class="bg-primary-600 text-white text-xs font-bold px-3 py-1 rounded-full">⭐ Destacada</span>
                    </div>
                    <div class="h-2 bg-primary-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-primary-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Beca Universitaria</h3>
                                <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-0.5 rounded-full">Educación Superior</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Financiamiento completo o parcial para estudios universitarios en Honduras.
                            Prioriza carreras STEM, ciencias de la salud, educación y trabajo social.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Pago de matrícula y carrera</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Estipendio mensual de vida</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Acceso a red de mentores</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Plazo: Duración de carrera</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Beca Técnica --}}
                <div class="border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-2 bg-orange-500"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Beca Técnica-Vocacional</h3>
                                <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-0.5 rounded-full">Formación Técnica</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Formación técnica acelerada en oficios de alta demanda laboral: tecnología,
                            electricidad, mecánica, enfermería auxiliar, gastronomía y más.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Cursos certificados por el INFOP</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Kit de herramientas incluido</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Inserción laboral asistida</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Plazo: 6–12 meses</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- Beca Posgrado --}}
                <div class="border border-zinc-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-2 bg-purple-600"></div>
                    <div class="p-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-xl bg-purple-50 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900">Beca de Posgrado</h3>
                                <span class="text-xs font-medium text-purple-700 bg-purple-50 px-2 py-0.5 rounded-full">Maestría / Doctorado</span>
                            </div>
                        </div>
                        <p class="text-zinc-500 text-sm leading-relaxed mb-5">
                            Para profesionales hondureños que deseen especializarse a nivel de maestría o doctorado,
                            tanto en Honduras como en el extranjero mediante convenios internacionales.
                        </p>
                        <ul class="text-sm text-zinc-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Matrícula y aranceles cubiertos</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Apoyo para investigación</li>
                            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Convenios internacionales</li>
                        </ul>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                            <span class="text-xs text-zinc-400">Plazo: Duración del programa</span>
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-purple-700 hover:text-purple-800 transition">Aplicar →</a>
                        </div>
                    </div>
                </div>

                {{-- CTA Card --}}
                <div class="bg-primary-50 border border-primary-100 rounded-2xl p-7 flex flex-col justify-center items-center text-center">
                    <svg class="w-12 h-12 text-primary-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h3 class="font-bold text-zinc-900 mb-2">¿No encuentras tu programa?</h3>
                    <p class="text-zinc-500 text-sm mb-5">Escríbenos y te ayudaremos a encontrar la opción más adecuada para tu perfil.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-5 py-2.5 bg-primary-600 text-white font-semibold text-sm rounded-lg hover:bg-primary-700 transition">
                        Contáctanos
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- Requisitos generales --}}
    <section class="py-20 bg-zinc-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-zinc-900 mb-3">Requisitos Generales</h2>
                <p class="text-zinc-500">Para aplicar a cualquier programa de beca ASONOG necesitas:</p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach([
                    ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'title' => 'Ser hondureño/a', 'desc' => 'Ciudadanía o residencia permanente en Honduras.'],
                    ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'title' => 'Documentación completa', 'desc' => 'DNI, constancias de estudio y documentos de ingresos familiares.'],
                    ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Necesidad económica', 'desc' => 'Ingresos familiares por debajo del umbral establecido por el programa.'],
                    ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'title' => 'Rendimiento académico', 'desc' => 'Promedio mínimo según tipo de beca (generalmente 70/100 o superior).'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Carta de recomendación', 'desc' => 'Al menos una carta de maestro, director o líder comunitario.'],
                    ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'title' => 'Inscripción en línea', 'desc' => 'Completar el formulario de solicitud antes de la fecha límite de convocatoria.'],
                ] as $req)
                <div class="bg-white border border-zinc-100 rounded-xl p-5 flex gap-4">
                    <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    {{-- CTA Final --}}
    <section class="py-20 bg-primary-600 text-white text-center">
        <div class="max-w-2xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">¡Da el primer paso hoy!</h2>
            <p class="text-primary-100 mb-8">Crea tu cuenta gratuita y completa tu solicitud de beca en minutos.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow hover:bg-primary-50 transition">
                    Crear cuenta gratis
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-7 py-3.5 border border-primary-400 text-white font-semibold rounded-xl hover:bg-primary-600 transition">
                    Ya tengo cuenta
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
