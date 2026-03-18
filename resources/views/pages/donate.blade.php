<x-layouts::public title="Donar" description="Tu donación hace posible que más jóvenes hondureños accedan a educación de calidad.">

    {{-- Hero --}}
    <section class="bg-linear-to-br from-primary-700 to-primary-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-primary-200 font-semibold uppercase tracking-widest text-sm mb-3">Apoya Nuestra Causa</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Tu donación cambia vidas</h1>
            <p class="text-primary-100 max-w-2xl mx-auto text-lg">
                Cada aporte —grande o pequeño— permite que un joven hondureño tenga acceso a educación
                de calidad y construya un mejor futuro para sí mismo y su comunidad.
            </p>
        </div>
    </section>

    {{-- Impacto de la Donación --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-zinc-900 mb-3">¿Qué logra tu donación?</h2>
                <p class="text-zinc-500">Así es como el dinero impacta directamente en los becarios.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['amount' => 'L. 200', 'desc' => 'Cubre útiles escolares de un alumno por un mes', 'color' => 'blue'],
                    ['amount' => 'L. 500', 'desc' => 'Paga la mensualidad de educación media', 'color' => 'green'],
                    ['amount' => 'L. 1,500', 'desc' => 'Financia matrícula universitaria por un semestre', 'color' => 'purple'],
                    ['amount' => 'L. 5,000', 'desc' => 'Patrocina una beca técnica completa de 6 meses', 'color' => 'orange'],
                ] as $tier)
                <div class="text-center p-6 border border-zinc-100 rounded-2xl hover:shadow-md transition">
                    <div class="text-3xl font-extrabold text-{{ $tier['color'] }}-700 mb-3">{{ $tier['amount'] }}</div>
                    <p class="text-zinc-500 text-sm">{{ $tier['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Formulario de Donación --}}
    <section class="py-20 bg-zinc-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-primary-600 text-white p-8 text-center">
                    <h2 class="text-2xl font-bold mb-2">Hacer una donación</h2>
                    <p class="text-primary-200 text-sm">Proceso seguro · 100% del dinero va a los becarios</p>
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
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-zinc-900 mb-3">Historias que inspiran</h2>
                <p class="text-zinc-500">Lo que dicen nuestros becarios sobre el impacto del programa.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['name' => 'María Hernández', 'program' => 'Beca Universitaria · UNAH', 'quote' => '"La beca de ASONOG me permitió terminar mi carrera de Medicina cuando mi familia no podía costearla. Hoy soy médica rural en Intibucá."'],
                    ['name' => 'Carlos Mejía', 'program' => 'Beca Técnica · INFOP', 'quote' => '"Gracias al programa técnico aprendí electricidad industrial. Hoy tengo mi propio taller y empleo a tres personas más de mi comunidad."'],
                    ['name' => 'Yesenia Rivera', 'program' => 'Beca Media · San Pedro Sula', 'quote' => '"Pude terminar el bachillerato sin preocuparme por los gastos. ASONOG no solo paga libros, también da seguimiento y apoyo emocional."'],
                ] as $t)
                <div class="bg-zinc-50 border border-zinc-100 rounded-2xl p-7">
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

</x-layouts::public>
