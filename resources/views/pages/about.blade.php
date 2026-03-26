<x-layouts::public title="Nosotros" description="Conoce la misión, visión y trayectoria de ASONOG y su programa de becas.">

    {{-- Hero --}}
    <section class="relative py-20 overflow-hidden">
        {{-- Imagen de fondo --}}
        <img src="{{ asset('img/aboutus-hero.jpg') }}"
             alt=""
             class="absolute inset-0 w-full h-full object-cover"
             aria-hidden="true">
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-zinc-900/75"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p data-aos="fade-down" class="text-primary-200 font-semibold uppercase tracking-widest text-sm mb-3">Quiénes Somos</p>
            <h1 data-aos="fade-up" data-aos-delay="100" class="text-4xl sm:text-5xl font-bold leading-tight mb-4 text-white">Asociación de Organismos<br>No Gubernamentales de Honduras</h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg">
                Desde 1992 articulamos y fortalecemos el trabajo de las organizaciones de la sociedad civil hondureña,
                promoviendo el desarrollo humano sostenible a través de programas de educación y becas.
            </p>
        </div>
    </section>

    {{-- Misión / Visión / Valores --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Quiénes somos</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Misión, Visión y Valores</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">

                <div data-aos="fade-up" class="bg-zinc-50 rounded-2xl p-8 border border-zinc-100 text-center">
                    <div class="w-14 h-14 rounded-2xl bg-primary-50 flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-zinc-900 mb-3">Nuestra Misión</h2>
                    <p class="text-zinc-500 leading-relaxed">
                        Articular, fortalecer y representar a las organizaciones de la sociedad civil de Honduras,
                        impulsando políticas públicas que favorezcan el desarrollo humano, la equidad y la participación ciudadana.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100" class="bg-zinc-50 rounded-2xl p-8 border border-zinc-100 text-center">
                    <div class="w-14 h-14 rounded-2xl bg-green-50 flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-zinc-900 mb-3">Nuestra Visión</h2>
                    <p class="text-zinc-500 leading-relaxed">
                        Ser la plataforma de referencia de la sociedad civil hondureña, reconocida por su capacidad
                        de incidencia, transparencia y contribución al desarrollo sostenible del país.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="bg-zinc-50 rounded-2xl p-8 border border-zinc-100 text-center">
                    <div class="w-14 h-14 rounded-2xl bg-secondary-50 flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-zinc-900 mb-3">Nuestros Valores</h2>
                    <p class="text-zinc-500 leading-relaxed">
                        Transparencia, equidad, solidaridad, participación democrática y compromiso con
                        los derechos humanos y la dignidad de todos los hondureños.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Historia / Trayectoria --}}
    <section class="py-20 bg-zinc-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="max-w-3xl mx-auto text-center mb-14">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Historia</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Nuestra Trayectoria</h2>
                <p class="mt-3 text-zinc-500">Más de 30 años trabajando por Honduras.</p>
            </div>

            <div class="relative">
                {{-- Línea central --}}
                <div class="hidden md:block absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-primary-100"></div>

                <div class="space-y-12">

                    <div class="md:flex items-start gap-8">
                        <div data-aos="fade-right" class="md:w-1/2 md:text-right md:pr-10">
                            <span class="inline-block bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">1992</span>
                            <h3 class="text-lg font-bold text-zinc-900">Fundación de ASONOG</h3>
                            <p class="text-zinc-500 text-sm mt-1">Creación de la red para articular las OSC hondureñas ante un contexto de crecimiento del sector no gubernamental en el país.</p>
                        </div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-primary-600 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10 hidden md:block"></div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:pr-10 hidden md:block"></div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-primary-600 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div data-aos="fade-left" class="md:w-1/2 md:pl-10">
                            <span class="inline-block bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">2005</span>
                            <h3 class="text-lg font-bold text-zinc-900">Programa de Becas</h3>
                            <p class="text-zinc-500 text-sm mt-1">Lanzamiento del primer programa de becas educativas para jóvenes en situación de vulnerabilidad, con el apoyo de cooperación internacional.</p>
                        </div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div data-aos="fade-right" class="md:w-1/2 md:text-right md:pr-10">
                            <span class="inline-block bg-primary-500 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">2015</span>
                            <h3 class="text-lg font-bold text-zinc-900">Expansión Nacional</h3>
                            <p class="text-zinc-500 text-sm mt-1">Ampliación del programa a los 18 departamentos del país, alcanzando comunidades rurales y poblaciones históricamente excluidas.</p>
                        </div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-primary-500 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10 hidden md:block"></div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:pr-10 hidden md:block"></div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-green-600 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div data-aos="fade-left" class="md:w-1/2 md:pl-10">
                            <span class="inline-block bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">Hoy</span>
                            <h3 class="text-lg font-bold text-zinc-900">Portal Digital</h3>
                            <p class="text-zinc-500 text-sm mt-1">Digitalización del proceso de solicitud de becas para hacer más accesible, transparente y eficiente el programa a nivel nacional.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="border-y border-zinc-100 bg-zinc-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div data-aos="fade-up">
                    <p class="text-4xl font-bold text-primary-600">+200</p>
                    <p class="text-zinc-500 text-sm mt-1">Organizaciones afiliadas</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <p class="text-4xl font-bold text-primary-600">+5,000</p>
                    <p class="text-zinc-500 text-sm mt-1">Becas otorgadas</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <p class="text-4xl font-bold text-primary-600">18</p>
                    <p class="text-zinc-500 text-sm mt-1">Departamentos cubiertos</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <p class="text-4xl font-bold text-primary-600">30+</p>
                    <p class="text-zinc-500 text-sm mt-1">Años de experiencia</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-zinc-50 border-t border-zinc-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-zinc-900">¿Deseas ser parte del cambio?</h2>
                    <p class="mt-1 text-zinc-500">Conoce nuestros programas de becas disponibles o ponte en contacto con nosotros.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                    <a href="{{ route('programs') }}" class="inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                        Ver programas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 border border-zinc-300 text-zinc-700 font-semibold rounded-lg hover:bg-white transition-colors">
                        Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts::public>
