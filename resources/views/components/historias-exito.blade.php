@props([
    'limite'   => null,
    'inicio'   => 0,
    'bg'       => 'bg-zinc-50',
    'flechas'  => false,
    'progreso' => false,
    'cta'      => false,
])

@php
$todasLasHistorias = [
    ['nombre' => 'Jacky',    'depto' => 'La Paz',        'carrera' => 'Lic. en Desarrollo Social',  'avatar' => 'JA', 'imagen' => 'Yakelin_Matinez.webp',  'tag' => 'Primera generación',   'historia' => 'Joven de origen Lenca, fue la primera de su familia en llegar a la universidad. Su camino representa la esperanza de toda una comunidad que hoy la ve como ejemplo de que la educación transforma vidas.'],
    ['nombre' => 'Franklin', 'depto' => 'Ocotepeque',    'carrera' => 'Lic. en Pedagogía',          'avatar' => 'FR', 'imagen' => 'Franklin_Bajurto.webp', 'tag' => 'Resiliencia',           'historia' => 'Perdió una mano en un accidente, pero su determinación es más fuerte que cualquier obstáculo. Con perseverancia y valentía sigue adelante en sus estudios, demostrando que ninguna barrera es insuperable.'],
    ['nombre' => 'Pamela',   'depto' => 'La Paz',        'carrera' => 'Lic. en Derecho',            'avatar' => 'PA', 'imagen' => 'Pamela_Avila.webp',    'tag' => 'Defensora de derechos', 'historia' => 'Superó la violencia doméstica y, como madre soltera, estudia Derecho para defender los derechos de las mujeres. Su historia es un acto de valentía que inspira a quienes la rodean.'],
    ['nombre' => 'Luis',     'depto' => 'Copán',         'carrera' => 'Estudios en curso',          'avatar' => 'LU', 'imagen' => 'Luis_Garcia.webp',     'tag' => 'Pueblo indígena',       'historia' => 'Líder Maya Chortí y defensor de los bienes comunes de su comunidad. La educación es para él una herramienta de lucha y de preservación de su identidad cultural.'],
    ['nombre' => 'Josué',    'depto' => 'Lempira',       'carrera' => 'Lic. en Enfermería',         'avatar' => 'JO', 'imagen' => 'Josue_Murillo.webp',   'tag' => 'Comunidad rural',       'historia' => 'Creció en una comunidad rural donde la universidad era un sueño lejano. Hoy estudia Enfermería con la determinación de regresar a cuidar a quienes más lo necesitan.'],
    ['nombre' => 'Tatiana',  'depto' => 'Ocotepeque',    'carrera' => 'Lic. en Derecho',            'avatar' => 'TA', 'imagen' => 'Tatiana_Hernandez.webp','tag' => 'Emprendedora social',   'historia' => 'Lidera un grupo de mujeres emprendedoras en su municipio y estudia Derecho para darles respaldo legal. Combina el activismo comunitario con su formación profesional cada día.'],
    ['nombre' => 'Erika',    'depto' => 'Santa Bárbara', 'carrera' => 'Lic. en Derecho',            'avatar' => 'ES', 'imagen' => 'Erika_Caballero.webp', 'tag' => 'Lideresa municipal',    'historia' => 'Lideresa en la red de mujeres de su municipio, combina el trabajo y el estudio con esfuerzo y dedicación. Es referente de que la persistencia abre puertas que parecían cerradas.'],
    ['nombre' => 'Erika',    'depto' => 'La Paz',        'carrera' => 'Lic. en Educación Primaria', 'avatar' => 'EL', 'imagen' => 'Erika_Benitez.webp',   'tag' => 'Pueblo indígena',       'historia' => 'Lideresa del Consejo Indígena Lenca y promotora de la educación en su comunidad. Estudia para formar a las nuevas generaciones Lencas con orgullo por su identidad.'],
    ['nombre' => 'Carlos',   'depto' => 'Copán',         'carrera' => 'Lic. en Desarrollo Social',  'avatar' => 'CA', 'imagen' => null,                   'tag' => 'Inclusión',             'historia' => 'Nació con una condición que le impide caminar, pero eso no detuvo su impulso. Promueve la inclusión y los derechos de las personas con discapacidad desde la educación digital.'],
    ['nombre' => 'Xiomara',  'depto' => 'Santa Bárbara', 'carrera' => 'Técnico en Administración',  'avatar' => 'XI', 'imagen' => null,                   'tag' => 'Primera generación',   'historia' => 'Primera mujer de su familia en acceder a la universidad, abriendo un camino que sus hermanas menores ahora también sueñan con recorrer.'],
    ['nombre' => 'Mariela',  'depto' => 'Copán',         'carrera' => 'Técnico en Laboratorio',     'avatar' => 'MA', 'imagen' => null,                   'tag' => 'Perseverancia',         'historia' => 'Superó barreras económicas para ejercer su derecho a formarse. Su esfuerzo diario es la prueba de que cuando hay voluntad, siempre hay un camino hacia adelante.'],
];

$becarios = array_slice($todasLasHistorias, $inicio, $limite);
@endphp

<section class="py-20 {{ $bg }}" id="historias-de-exito">
    <style>.stories-track::-webkit-scrollbar{display:none}</style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         @if($flechas)
         x-data="{
             scrollBy(dir) {
                 const t = this.$refs.track;
                 const card = t.querySelector('[data-card]');
                 t.scrollBy({ left: dir * (card.offsetWidth + 20), behavior: 'smooth' });
             }
         }"
         @endif>

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

            @if($flechas)
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
            @endif

            {{-- Track --}}
            <div @if($flechas) x-ref="track" @endif
                 class="stories-track flex gap-5 overflow-x-auto snap-x snap-mandatory pb-4"
                 style="scrollbar-width:none;-ms-overflow-style:none;">

                @foreach($becarios as $b)
                <div data-card
                     class="snap-start shrink-0 w-[82vw] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)]
                            bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden flex flex-col
                            hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                    {{-- Accent bar --}}
                    <div class="h-1 bg-primary-600"></div>

                    <div class="p-5 flex flex-col flex-1 gap-4">

                        {{-- Persona --}}
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary-50 border border-primary-100
                                        flex items-center justify-center shrink-0 overflow-hidden">
                                @if($b['imagen'])
                                    <img src="{{ asset('img/historias-exito/' . $b['imagen']) }}"
                                         alt="Foto de {{ $b['nombre'] }}"
                                         class="w-full h-full object-cover object-top">
                                @else
                                    <span class="text-primary-700 font-bold text-xs tracking-wide">{{ $b['avatar'] }}</span>
                                @endif
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

            @if($flechas)
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
            @endif

        </div>

        {{-- Hint --}}
        <p class="mt-5 text-center text-xs text-zinc-400 flex items-center justify-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4M8 15l4 4 4-4"/>
            </svg>
            Desliza para ver las {{ count($becarios) }} historias
        </p>

        @if($progreso)
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
        @endif

        @if($cta)
        {{-- CTA para mostrar más historias --}}
        <div class="text-center mt-10">
            <a href="{{ route('programs') }}"
               class="inline-block border border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white font-medium px-6 py-3 rounded-lg transition-colors">
                Ver más historias
            </a>
        </div>
        @endif

    </div>
</section>
