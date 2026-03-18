<x-layouts::public title="Inicio">

{{-- ===================== HERO ===================== --}}
<section class="relative bg-linear-to-br from-primary-700 to-primary-600 text-white overflow-hidden">
    {{-- Fondo decorativo --}}
    <div class="absolute inset-0 opacity-10 pointer-events-none select-none"
         aria-hidden="true"
         style="background-image: radial-gradient(circle at 70% 40%, white 1px, transparent 1px); background-size: 30px 30px;">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-36">
        <div class="max-w-2xl">
            <span class="inline-block text-xs font-semibold uppercase tracking-widest bg-white/20 text-white px-3 py-1 rounded-full mb-5">
                Portal de Becarios
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Impulsando el futuro de <span class="text-secondary-300">Honduras</span>
            </h1>
            <p class="text-lg sm:text-xl text-primary-100 leading-relaxed mb-8">
                ASONOG acompaña a jóvenes y organizaciones en el desarrollo humano integral a través de programas de becas, capacitación y oportunidades.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('programs') }}"
                   class="inline-block bg-secondary-400 hover:bg-secondary-300 text-zinc-900 font-semibold px-6 py-3 rounded-lg transition-colors">
                    Ver programas
                </a>
                <a href="{{ route('about') }}"
                   class="inline-block border border-white/40 hover:border-white text-white font-medium px-6 py-3 rounded-lg transition-colors">
                    Conocer más
                </a>
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
                    La Asociación de Organismos No Gubernamentales de Honduras (ASONOG) es una red de organizaciones de la sociedad civil comprometida con el desarrollo humano, la justicia social y la defensa de los derechos de las comunidades más vulnerables.
                </p>
                <p class="mt-3 text-zinc-600 leading-relaxed">
                    Nuestro Portal de Becarios conecta a jóvenes con oportunidades educativas y de crecimiento personal, haciendo seguimiento a su proceso de manera transparente y eficiente.
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
            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Programas y Oportunidades</h2>
            <p class="mt-3 text-zinc-500 max-w-xl mx-auto">
                Conoce las iniciativas de ASONOG pensadas para transformar vidas y fortalecer comunidades.
            </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 7l-9-5 9-5 9 5-9 5z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Becas Educativas</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Apoyo económico para jóvenes de escasos recursos que desean continuar sus estudios universitarios o técnicos.
                </p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 rounded-lg bg-secondary-100 text-secondary-600 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Capacitación y Formación</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Talleres, cursos y diplomados orientados al fortalecimiento de capacidades humanas y profesionales.
                </p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-zinc-100 hover:shadow-md transition-shadow">
                <div class="w-10 h-10 rounded-lg bg-green-100 text-green-700 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-zinc-900 mb-2">Desarrollo Comunitario</h3>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Iniciativas de impacto local que vinculan a los becarios con sus comunidades de origen.
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
