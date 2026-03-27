<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-zinc-50">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-white">
            <flux:sidebar.header class="border-b border-zinc-100 py-4">
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2 px-1">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-600 text-white font-bold text-sm">A</div>
                    <span class="font-semibold text-zinc-800 text-sm">ASONOG Becas</span>
                </a>
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                @auth
                    @if (auth()->user()->isAdmin())
                        {{-- Nav: Administrador --}}
                        <flux:sidebar.group heading="Administración" class="grid">
                            <flux:sidebar.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')" wire:navigate>
                                Dashboard
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="users" :href="route('admin.becarios.index')" :current="request()->routeIs('admin.becarios.*')" wire:navigate>
                                Becarios
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="document-text" :href="route('admin.documents.index')" :current="request()->routeIs('admin.documents.*')" wire:navigate>
                                Documentos
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="clipboard-document-list" :href="route('admin.assignments.index')" :current="request()->routeIs('admin.assignments.*')" wire:navigate>
                                Solicitudes
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="photo" :href="route('admin.gallery.index')" :current="request()->routeIs('admin.gallery.*')" wire:navigate>
                                Galería
                            </flux:sidebar.item>
                        </flux:sidebar.group>
                        <flux:sidebar.group heading="Cuenta" class="grid">
                            <flux:sidebar.item icon="user" :href="route('profile.edit')" :current="request()->routeIs('profile.edit')" wire:navigate>
                                Mi Perfil
                            </flux:sidebar.item>
                        </flux:sidebar.group>
                    @else
                        {{-- Nav: Becario --}}
                        <flux:sidebar.group heading="Mi Portal" class="grid">
                            <flux:sidebar.item icon="home" :href="route('becario.dashboard')" :current="request()->routeIs('becario.dashboard')" wire:navigate>
                                Inicio
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="document-arrow-up" :href="route('becario.documents')" :current="request()->routeIs('becario.documents')" wire:navigate>
                                Mis Documentos
                            </flux:sidebar.item>
                        </flux:sidebar.group>
                        <flux:sidebar.group heading="Cuenta" class="grid">
                            <flux:sidebar.item icon="user" :href="route('profile.edit')" :current="request()->routeIs('profile.edit')" wire:navigate>
                                Mi Perfil
                            </flux:sidebar.item>
                            <flux:sidebar.item icon="cog-6-tooth" :href="route('profile.edit')" :current="request()->routeIs('profile.edit')" wire:navigate>
                                Configuración
                            </flux:sidebar.item>
                        </flux:sidebar.group>
                    @endif
                @endauth
            </flux:sidebar.nav>

            <flux:spacer />

            <div class="px-3 pb-3">
                <div class="rounded-lg bg-primary-50 border border-primary-100 p-3 text-xs text-primary-600">
                    <p class="font-semibold mb-0.5">¿Necesitas ayuda?</p>
                    <p class="text-primary-600">Contáctanos en <a href="mailto:becas@asonog.hn" class="underline">becas@asonog.hn</a></p>
                </div>
            </div>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Configuración') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Cerrar sesión') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
