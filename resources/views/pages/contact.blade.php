<x-layouts::public title="Contacto" description="¿Tienes dudas? Contáctanos y te responderemos a la brevedad posible.">

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-blue-800 to-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-blue-200 font-semibold uppercase tracking-widest text-sm mb-3">Estamos para Ayudarte</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Contáctanos</h1>
            <p class="text-blue-100 max-w-xl mx-auto text-lg">
                ¿Tienes preguntas sobre los programas de becas? Escríbenos o visítanos.
            </p>
        </div>
    </section>

    {{-- Contacto Main --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-14 items-start">

                {{-- Formulario --}}
                <div>
                    <h2 class="text-2xl font-bold text-zinc-900 mb-2">Envíanos un mensaje</h2>
                    <p class="text-zinc-500 mb-8">Te responderemos en un plazo de 2 a 3 días hábiles.</p>

                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Nombre</label>
                                <input type="text" name="name" required placeholder="Tu nombre"
                                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-zinc-700 mb-1.5">Apellido</label>
                                <input type="text" name="last_name" required placeholder="Tu apellido"
                                    class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Correo electrónico</label>
                            <input type="email" name="email" required placeholder="tucorreo@ejemplo.com"
                                class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Asunto</label>
                            <select name="subject"
                                class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                <option value="">Selecciona un asunto</option>
                                <option>Información sobre becas</option>
                                <option>Estado de mi solicitud</option>
                                <option>Documentación requerida</option>
                                <option>Registro de organización</option>
                                <option>Otro</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-zinc-700 mb-1.5">Mensaje</label>
                            <textarea name="message" rows="5" required placeholder="Escribe tu mensaje aquí..."
                                class="w-full border border-zinc-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            Enviar mensaje
                        </button>
                    </form>
                </div>

                {{-- Información de contacto --}}
                <div class="space-y-8">

                    <div>
                        <h2 class="text-2xl font-bold text-zinc-900 mb-6">Información de contacto</h2>
                        <div class="space-y-5">

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Dirección</p>
                                    <p class="text-zinc-500 text-sm">Col. Lomas del Guijarro, Calle Principal,<br>Tegucigalpa, Honduras</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Teléfono</p>
                                    <p class="text-zinc-500 text-sm">+504 2237-0000</p>
                                    <p class="text-zinc-400 text-xs">Lunes a viernes, 8:00 AM – 5:00 PM</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-zinc-900">Correo electrónico</p>
                                    <p class="text-zinc-500 text-sm">becas@asonog.hn</p>
                                    <p class="text-zinc-400 text-xs">Para consultas sobre becas</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Horarios --}}
                    <div class="bg-zinc-50 border border-zinc-100 rounded-2xl p-6">
                        <h3 class="font-semibold text-zinc-900 mb-4">Horarios de atención</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Lunes – Viernes</span>
                                <span class="font-medium text-zinc-900">8:00 AM – 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Sábado</span>
                                <span class="font-medium text-zinc-900">9:00 AM – 12:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Domingo</span>
                                <span class="text-zinc-400">Cerrado</span>
                            </div>
                        </div>
                    </div>

                    {{-- Redes Sociales --}}
                    <div>
                        <h3 class="font-semibold text-zinc-900 mb-4">Síguenos en redes</h3>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition" aria-label="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-lg bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 transition" aria-label="Twitter">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-lg bg-blue-700 text-white flex items-center justify-center hover:bg-blue-800 transition" aria-label="LinkedIn">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-layouts::public>
