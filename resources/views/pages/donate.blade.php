<x-layouts::public title="Donar" description="Tu donación hace posible que más jóvenes hondureños accedan a educación de calidad.">

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-blue-800 to-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-blue-200 font-semibold uppercase tracking-widest text-sm mb-3">Apoya Nuestra Causa</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Tu donación cambia vidas</h1>
            <p class="text-blue-100 max-w-2xl mx-auto text-lg">
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
                <div class="bg-blue-700 text-white p-8 text-center">
                    <h2 class="text-2xl font-bold mb-2">Hacer una donación</h2>
                    <p class="text-blue-200 text-sm">Proceso seguro · 100% del dinero va a los becarios</p>
                </div>

                <div class="p-8">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        {{-- Montos sugeridos --}}
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-3">Selecciona un monto (Lempiras)</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3" x-data="{ selected: null }">
                                @foreach(['200', '500', '1000', '2000'] as $amount)
                                <button type="button"
                                    @click="selected = '{{ $amount }}'; $refs.amount.value = '{{ $amount }}'"
                                    :class="selected === '{{ $amount }}' ? 'border-blue-700 bg-blue-50 text-blue-700' : 'border-zinc-200 text-zinc-700 hover:border-blue-300'"
                                    class="border-2 rounded-xl py-3 font-bold text-sm transition">
                                    L. {{ number_format((int)$amount) }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Monto personalizado --}}
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">O ingresa un monto personalizado</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-sm font-semibold">L.</span>
                                <input type="number" name="amount" x-ref="amount" min="50" step="1" placeholder="Otro monto"
                                    class="w-full border border-zinc-300 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                        </div>

                        {{-- Frecuencia --}}
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-3">Frecuencia de donación</label>
                            <div class="grid grid-cols-3 gap-3">
                                @foreach(['Única vez' => 'once', 'Mensual' => 'monthly', 'Anual' => 'yearly'] as $label => $value)
                                <label class="cursor-pointer">
                                    <input type="radio" name="frequency" value="{{ $value }}" class="sr-only peer" {{ $value === 'once' ? 'checked' : '' }}>
                                    <div class="text-center border-2 border-zinc-200 rounded-xl py-3 text-sm font-medium text-zinc-700 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 transition">
                                        {{ $label }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <hr class="border-zinc-100">

                        {{-- Datos del donante --}}
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre completo</label>
                                <input type="text" name="donor_name" placeholder="Tu nombre"
                                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                                <input type="email" name="donor_email" placeholder="pararecibo@correo.com"
                                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <input type="checkbox" id="anonymous" name="anonymous" class="mt-0.5 rounded border-zinc-300 text-blue-600 focus:ring-blue-500">
                            <label for="anonymous" class="text-sm text-zinc-600">Quiero que mi donación sea anónima</label>
                        </div>

                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl transition shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            Confirmar donación
                        </button>

                        <p class="text-xs text-zinc-400 text-center">
                            Al confirmar, aceptas nuestros
                            <a href="#" class="underline hover:text-zinc-600">términos y condiciones</a>.
                            Tu información está segura y protegida.
                        </p>
                    </form>
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
                        <div class="w-9 h-9 rounded-full bg-blue-200 flex items-center justify-center text-blue-700 font-bold text-sm">
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
