<x-layouts::public title="Galería" description="Galería fotográfica institucional de ASONOG: becarios, voluntarios y comunidades que construyen el futuro de Honduras.">

    {{-- ===================== HERO ===================== --}}
    <section class="relative py-28 sm:py-36 overflow-hidden">
        <img src="{{ asset('img/aboutus-hero.webp') }}"
             alt=""
             class="absolute inset-0 w-full h-full object-cover"
             aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/85"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-down" class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-primary-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 animate-pulse"></span>
                Galería fotográfica
            </div>

            <h1 data-aos="fade-up" data-aos-delay="100"
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-5 text-white">
                Momentos que<br class="hidden sm:block">transforman vidas
            </h1>

            <p data-aos="fade-up" data-aos-delay="200" class="text-zinc-300 max-w-2xl mx-auto text-lg leading-relaxed">
                Imágenes de becarios, voluntarios y comunidades que construyen el futuro de Honduras.
            </p>

            {{-- CTAs --}}
            <div data-aos="fade-up" data-aos-delay="300" class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('programs') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl shadow-lg hover:bg-primary-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                    Ver programas de becas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('donate') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium rounded-xl transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Apoyar la causa
                </a>
            </div>
        </div>

        {{-- Indicador de scroll --}}
        <div class="absolute bottom-8 inset-x-0 flex justify-center" aria-hidden="true">
            <a href="#galeria" class="flex flex-col items-center gap-1.5 text-white/40 hover:text-white/70 transition-colors group">
                <span class="text-xs tracking-widest uppercase font-medium">Ver galería</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- ===================== GALERÍA ===================== --}}
    @php
        $photos = \App\Models\GalleryPhoto::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($p) => [
                'src'   => $p->image_url,
                'title' => $p->title,
                'desc'  => $p->description ?? '',
                'cat'   => $p->category,
                'size'  => $p->size,
            ])
            ->values()
            ->toArray();
    @endphp

    <section class="py-16 bg-white" id="galeria" x-data="gallery()" @keydown.escape.window="closeLightbox()">

        {{-- Filtros --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
            <div data-aos="fade-up" class="flex flex-wrap justify-center gap-2">
                @foreach(['todos' => 'Todos', 'becarios' => 'Becarios', 'voluntariados' => 'Voluntariados', 'eventos' => 'Eventos', 'comunidades' => 'Comunidades'] as $key => $label)
                    <button
                        @click="filter = '{{ $key }}'"
                        :class="filter === '{{ $key }}'
                            ? 'bg-primary-600 text-white shadow-sm'
                            : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200'"
                        class="px-5 py-2 rounded-full text-sm font-medium transition-colors">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Galería Masonry --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4" data-aos="fade-up" data-aos-delay="100">
                @foreach($photos as $i => $photo)
                    <div
                        x-show="filter === 'todos' || filter === '{{ $photo['cat'] }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="break-inside-avoid group relative rounded-xl overflow-hidden cursor-pointer"
                        @click="openLightbox({{ $i }})">
                        <img
                            src="{{ $photo['src'] }}"
                            alt="{{ $photo['title'] }}"
                            class="w-full block"
                            @if($photo['size'] === 'portrait') style="aspect-ratio: 2/3" @elseif($photo['size'] === 'landscape-lg') style="aspect-ratio: 16/10" data-parallax @else style="aspect-ratio: 3/2" @endif
                            loading="lazy">

                        {{-- Hover overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/80 via-zinc-900/30 to-transparent
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300
                                    flex flex-col justify-end p-5">
                            <span class="inline-block self-start text-xs font-semibold uppercase tracking-wider text-primary-300 bg-primary-900/50 px-2.5 py-1 rounded-full mb-2">
                                {{ ucfirst($photo['cat']) }}
                            </span>
                            <h3 class="text-white font-bold text-base leading-snug">{{ $photo['title'] }}</h3>
                            <div class="absolute top-4 right-4">
                                <svg class="w-6 h-6 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ===================== LIGHTBOX MODAL ===================== --}}
        <template x-teleport="body">
            <div
                x-show="lightboxOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-8"
                style="display: none;"
                @click.self="closeLightbox()">

                {{-- Backdrop --}}
                <div class="absolute inset-0 bg-black/85 backdrop-blur-sm" @click="closeLightbox()"></div>

                {{-- Content --}}
                <div class="relative z-10 max-w-5xl w-full max-h-[90vh] flex flex-col items-center" @click.stop>

                    {{-- Close --}}
                    <button @click="closeLightbox()" class="absolute -top-2 -right-2 sm:top-0 sm:right-0 z-20 w-10 h-10 flex items-center justify-center rounded-full bg-zinc-800/80 text-white hover:bg-zinc-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    {{-- Navigation prev --}}
                    <button @click="prevPhoto()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 sm:-translate-x-14 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-zinc-800/80 text-white hover:bg-zinc-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    {{-- Navigation next --}}
                    <button @click="nextPhoto()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 sm:translate-x-14 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-zinc-800/80 text-white hover:bg-zinc-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- Image --}}
                    <img
                        :src="currentPhoto?.src"
                        :alt="currentPhoto?.title"
                        class="max-h-[65vh] w-auto max-w-full rounded-xl object-contain shadow-2xl">

                    {{-- Info --}}
                    <div class="mt-4 text-center max-w-lg">
                        <span class="inline-block text-xs font-semibold uppercase tracking-wider text-primary-400 bg-primary-900/40 px-2.5 py-1 rounded-full mb-2" x-text="currentPhoto?.catLabel"></span>
                        <h3 class="text-white font-bold text-lg leading-snug" x-text="currentPhoto?.title"></h3>
                        <p class="text-zinc-400 text-sm mt-1" x-text="currentPhoto?.desc"></p>
                    </div>
                </div>
            </div>
        </template>
    </section>

    {{-- ===================== CTA FINAL ===================== --}}
    <section class="relative py-24 overflow-hidden bg-primary-700">
        {{-- Decorative circles --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-primary-600/50 blur-3xl pointer-events-none" aria-hidden="true"></div>
        <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-primary-800/60 blur-3xl pointer-events-none" aria-hidden="true"></div>
        {{-- Grid texture overlay --}}
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
             style="background-image: repeating-linear-gradient(0deg,#fff 0,#fff 1px,transparent 1px,transparent 40px), repeating-linear-gradient(90deg,#fff 0,#fff 1px,transparent 1px,transparent 40px);"
             aria-hidden="true"></div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-up" data-aos-duration="700">
                <span class="inline-block text-primary-200 text-xs font-bold uppercase tracking-widest mb-4">Da el siguiente paso</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    Las imágenes cuentan<br class="hidden sm:block"> nuestra historia
                </h2>
                <p class="mt-5 text-primary-100 text-lg max-w-xl mx-auto leading-relaxed">
                    Detrás de cada foto hay un joven con sueños. Sé parte del cambio: aplica a una beca o apoya a quienes más lo necesitan.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="600" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('programs') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white text-primary-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-primary-50 transition-colors text-base">
                    Ver programas de becas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('donate') }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white/60 bg-white/10 hover:bg-white/15 backdrop-blur-sm text-white font-medium px-8 py-4 rounded-xl transition-all duration-200 text-base">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Apoyar la causa
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== ALPINE + PARALLAX JS ===================== --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gallery', () => ({
                filter: 'todos',
                lightboxOpen: false,
                currentIndex: 0,
                photos: @json($photos),

                get filteredPhotos() {
                    if (this.filter === 'todos') return this.photos;
                    return this.photos.filter(p => p.cat === this.filter);
                },

                get currentPhoto() {
                    const photo = this.filteredPhotos[this.currentIndex];
                    if (!photo) return null;
                    return {
                        ...photo,
                        catLabel: photo.cat.charAt(0).toUpperCase() + photo.cat.slice(1)
                    };
                },

                openLightbox(globalIndex) {
                    const photo = this.photos[globalIndex];
                    const idx = this.filteredPhotos.findIndex(p => p.src === photo.src);
                    this.currentIndex = idx >= 0 ? idx : 0;
                    this.lightboxOpen = true;
                    document.body.style.overflow = 'hidden';
                },

                closeLightbox() {
                    this.lightboxOpen = false;
                    document.body.style.overflow = '';
                },

                nextPhoto() {
                    this.currentIndex = (this.currentIndex + 1) % this.filteredPhotos.length;
                },

                prevPhoto() {
                    this.currentIndex = (this.currentIndex - 1 + this.filteredPhotos.length) % this.filteredPhotos.length;
                }
            }));
        });

        // Parallax on scroll
        (function() {
            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(() => {
                        const scrollY = window.scrollY;
                        document.querySelectorAll('[data-parallax]').forEach(el => {
                            const rect = el.getBoundingClientRect();
                            const center = rect.top + rect.height / 2;
                            const viewH = window.innerHeight;
                            const offset = ((center - viewH / 2) / viewH) * -30;
                            el.style.transform = 'translateY(' + offset + 'px)';
                        });
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        })();
    </script>

</x-layouts::public>
