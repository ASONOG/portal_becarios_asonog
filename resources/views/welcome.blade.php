<x-layouts::public title="Inicio">

{{-- ===================== HERO ===================== --}}
<section class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block text-xs font-semibold uppercase tracking-widest bg-primary-50 text-primary-600 px-3 py-1 rounded-full mb-5">
                    Portal de Becarios
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-zinc-900 mb-6">
                    Impulsamos conocimiento que <span class="text-primary-600">transforma</span>
                </h1>
                <p class="text-lg sm:text-xl text-zinc-500 leading-relaxed mb-8">
                    En ASONOG, la Unidad de Gestión del Conocimiento promueve el desarrollo humano integral a través de becas, fortalecimiento de capacidades y oportunidades de aprendizaje práctico.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('programs') }}"
                       class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                        Ver programas
                    </a>
                    <a href="{{ route('about') }}"
                       class="inline-block border border-zinc-300 hover:border-zinc-400 text-zinc-700 font-medium px-6 py-3 rounded-lg transition-colors">
                        Conocer más
                    </a>
                </div>
            </div>

            {{-- Imagen hero --}}
            <div class="hidden lg:block">
                <img src="{{ asset('img/hero-img.jpeg') }}"
                     alt="Becarios de ASONOG"
                     class="w-full rounded-2xl shadow-xl object-cover aspect-4/3">
            </div>
        </div>
    </div>
</section>

{{-- ===================== STATS ===================== --}}
<section class="bg-primary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-3xl font-bold text-secondary-300">+30</p>
                <p class="text-sm text-primary-200 mt-1">Años de experiencia</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-secondary-300">200+</p>
                <p class="text-sm text-primary-200 mt-1">Becarios activos</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-secondary-300">18</p>
                <p class="text-sm text-primary-200 mt-1">Departamentos</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-secondary-300">50+</p>
                <p class="text-sm text-primary-200 mt-1">Organizaciones aliadas</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== SOBRE ASONOG ===================== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Quiénes somos</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900 leading-tight">
                    Más de tres décadas apoyando a Honduras
                </h2>
                <p class="mt-4 text-zinc-600 leading-relaxed">
                    ASONOG ha acompañado de manera constante a sus poblaciones meta, impulsando la educación y el fortalecimiento integral como caminos para transformar vidas. A través de oportunidades de aprendizaje y crecimiento, promovemos el desarrollo de capacidades, el liderazgo y la esperanza en un futuro con más posibilidades para todas las personas.
                </p>
               
                <a href="{{ route('about') }}"
                   class="mt-6 inline-flex items-center gap-2 text-primary-600 font-medium hover:text-primary-800 transition-colors">
                    Conocer más sobre ASONOG
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            <div class="rounded-2xl bg-linear-to-br from-primary-50 to-primary-100 aspect-4/3 flex items-center justify-center">
                <svg class="w-24 h-24 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PROGRAMAS ===================== --}}
<section class="py-20 bg-zinc-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Lo que ofrecemos</span>
            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Transformando vidas juntos</h2>
            <p class="mt-3 text-zinc-500 max-w-xl mx-auto">
                Descubre las iniciativas de ASONOG diseñadas para abrir caminos, impulsar sueños y fortalecer comunidades a través del aprendizaje y el crecimiento integral.
            </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('programs') }}" class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow block">
                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 7l-9-5 9-5 9 5-9 5z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Becas Universitarias</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Cada historia comienza con un sueño. En ASONOG apoyamos a jóvenes con becas universitarias y acompañamiento integral, fortaleciendo su bienestar y compromiso con los derechos humanos. Cada paso que dan transforma sus vidas y sus comunidades.
                </p>
            </a>
            <a href="{{ route('internships') }}" class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow block">
                <div class="w-10 h-10 rounded-lg bg-green-100 text-green-700 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Prácticas y Pasantías</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Oportunidades de vinculación formativa: prácticas profesionales, pasantías y voluntariados en proyectos de desarrollo.
                </p>
            </a>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 rounded-lg bg-secondary-100 text-secondary-600 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Fortalecimiento de Capacidades</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    En ASONOG impulsamos el talento y desarrollo de jóvenes y comunidades a través de capacitación integral. Nuestro programa brinda herramientas, habilidades y conocimientos que fortalecen su liderazgo y compromiso con los derechos humanos.
                </p>
            </div>
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('programs') }}"
               class="inline-block border border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white font-medium px-6 py-3 rounded-lg transition-colors">
                Ver todos los programas
            </a>
        </div>
    </div>
</section>

{{-- ===================== CTA DONACIONES ===================== --}}
<section class="py-20 bg-secondary-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 mb-4">
            Tu apoyo transforma vidas
        </h2>
        <p class="text-zinc-700 max-w-xl mx-auto mb-8 leading-relaxed">
            Con tu donación ayudas a que más jóvenes hondureños accedan a educación y oportunidades de desarrollo.
        </p>
        <a href="{{ route('donate') }}"
           class="inline-block bg-zinc-900 hover:bg-zinc-700 text-white font-semibold px-8 py-4 rounded-lg transition-colors text-lg">
            Quiero donar
        </a>
    </div>
</section>

</x-layouts::public>
