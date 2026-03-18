<x-layouts::public title="Nosotros" description="Conoce la misión, visión y trayectoria de ASONOG y su programa de becas.">

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-blue-800 to-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-blue-200 font-semibold uppercase tracking-widest text-sm mb-3">Quiénes Somos</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Asociación de Organismos<br>No Gubernamentales de Honduras</h1>
            <p class="text-blue-100 max-w-2xl mx-auto text-lg">
                Desde 1992 articulamos y fortalecemos el trabajo de las organizaciones de la sociedad civil hondureña,
                promoviendo el desarrollo humano sostenible a través de programas de educación y becas.
            </p>
        </div>
    </section>

    {{-- Misión / Visión / Valores --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-10">

                <div class="text-center">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-zinc-900 mb-3">Nuestra Misión</h2>
                    <p class="text-zinc-500 leading-relaxed">
                        Articular, fortalecer y representar a las organizaciones de la sociedad civil de Honduras,
                        impulsando políticas públicas que favorezcan el desarrollo humano, la equidad y la participación ciudadana.
                    </p>
                </div>

                <div class="text-center">
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

                <div class="text-center">
                    <div class="w-14 h-14 rounded-2xl bg-yellow-50 flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <div class="max-w-3xl mx-auto text-center mb-14">
                <h2 class="text-3xl font-bold text-zinc-900 mb-4">Nuestra Trayectoria</h2>
                <p class="text-zinc-500">Más de 30 años trabajando por Honduras.</p>
            </div>

            <div class="relative">
                {{-- Línea central --}}
                <div class="hidden md:block absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-blue-100"></div>

                <div class="space-y-12">

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-10">
                            <span class="inline-block bg-blue-700 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">1992</span>
                            <h3 class="text-lg font-bold text-zinc-900">Fundación de ASONOG</h3>
                            <p class="text-zinc-500 text-sm mt-1">Creación de la red para articular las OSC hondureñas ante un contexto de crecimiento del sector no gubernamental en el país.</p>
                        </div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-blue-700 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10 hidden md:block"></div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:pr-10 hidden md:block"></div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-blue-600 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10">
                            <span class="inline-block bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">2005</span>
                            <h3 class="text-lg font-bold text-zinc-900">Programa de Becas</h3>
                            <p class="text-zinc-500 text-sm mt-1">Lanzamiento del primer programa de becas educativas para jóvenes en situación de vulnerabilidad, con el apoyo de cooperación internacional.</p>
                        </div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:text-right md:pr-10">
                            <span class="inline-block bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold mb-2">2015</span>
                            <h3 class="text-lg font-bold text-zinc-900">Expansión Nacional</h3>
                            <p class="text-zinc-500 text-sm mt-1">Ampliación del programa a los 18 departamentos del país, alcanzando comunidades rurales y poblaciones históricamente excluidas.</p>
                        </div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-blue-500 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10 hidden md:block"></div>
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="md:w-1/2 md:pr-10 hidden md:block"></div>
                        <div class="hidden md:flex w-8 h-8 rounded-full bg-green-600 ring-4 ring-white mt-1 shrink-0 items-center justify-center mx-auto">
                            <div class="w-3 h-3 rounded-full bg-white"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-10">
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
    <section class="py-16 bg-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold">+200</p>
                    <p class="text-blue-200 text-sm mt-1">Organizaciones afiliadas</p>
                </div>
                <div>
                    <p class="text-4xl font-bold">+5,000</p>
                    <p class="text-blue-200 text-sm mt-1">Becas otorgadas</p>
                </div>
                <div>
                    <p class="text-4xl font-bold">18</p>
                    <p class="text-blue-200 text-sm mt-1">Departamentos cubiertos</p>
                </div>
                <div>
                    <p class="text-4xl font-bold">30+</p>
                    <p class="text-blue-200 text-sm mt-1">Años de experiencia</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-white text-center">
        <div class="max-w-2xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-zinc-900 mb-4">¿Deseas ser parte del cambio?</h2>
            <p class="text-zinc-500 mb-8">Conoce nuestros programas de becas disponibles o ponte en contacto con nosotros.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('programs') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition">
                    Ver programas
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 border border-zinc-300 text-zinc-700 font-semibold rounded-lg hover:bg-zinc-50 transition">
                    Contáctanos
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
