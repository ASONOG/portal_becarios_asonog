<x-layouts::public title="Donar" description="Tu donación hace posible que más jóvenes hondureños accedan a educación de calidad.">

    {{-- Hero --}}
    <section class="relative py-20 overflow-hidden">
        <img src="{{ asset('img/donar-hero.jpeg') }}" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
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
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-12">
                <span class="text-xs font-semibold uppercase tracking-widest text-primary-600">Testimonios</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-zinc-900">Historias que inspiran</h2>
                <p class="mt-3 text-zinc-500">Lo que dicen nuestros becarios sobre el impacto del programa.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['name' => 'María Hernández', 'program' => 'Beca Universitaria · UNAH', 'quote' => '"La beca de ASONOG me permitió terminar mi carrera de Medicina cuando mi familia no podía costearla. Hoy soy médica rural en Intibucá."', 'delay' => '0'],
                    ['name' => 'Carlos Mejía', 'program' => 'Beca Técnica · INFOP', 'quote' => '"Gracias al programa técnico aprendí electricidad industrial. Hoy tengo mi propio taller y empleo a tres personas más de mi comunidad."', 'delay' => '100'],
                    ['name' => 'Yesenia Rivera', 'program' => 'Beca Media · San Pedro Sula', 'quote' => '"Pude terminar el bachillerato sin preocuparme por los gastos. ASONOG no solo paga libros, también da seguimiento y apoyo emocional."', 'delay' => '200'],
                ] as $t)
                <div data-aos="fade-up" data-aos-delay="{{ $t['delay'] }}" class="bg-zinc-50 border border-zinc-100 rounded-2xl p-7">
                    <p class="text-zinc-700 italic leading-relaxed mb-5">{{ $t['quote'] }}</p>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-primary-200 flex items-center justify-center text-primary-600 font-bold text-sm">
                            {{ substr($t['name'], 0, 1) }}
                        </div>
                        <div>
                            <p class="font-semibold text-zinc-900 text-sm">{{ $t['name'] }}</p>
                            <p class="text-xs text-zinc-400">{{ $t['program'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
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
