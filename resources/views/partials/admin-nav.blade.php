<div
    class="sticky top-0 left-0 z-10 flex flex-row items-center justify-between px-4 py-3 shadow-xl md:h-screen bg-secondary/70 backdrop-blur-md md:flex-col md:items-start">
    <div class="md:h-[20vh] mt-0">
        <x-application-logo />
    </div>

    {{-- MOBILE NAV --}}
    <nav x-data="{ open: false }" class="md:hidden">
        <div x-on:click="open = !open" id="hamburger"
            class="relative z-50 flex flex-col items-end justify-center gap-1 cursor-pointer {{ request()->is('/') ? '*:bg-secondary' : '*:bg-black' }}">
            <div class="w-8 h-1 duration-300 rounded-lg" :class="open ? '!bg-black -rotate-45 origin-top-right' : 'abc'">
            </div>
            <div class="w-6 h-1 duration-300 rounded-lg" :class="open ? 'rotate-45 opacity-0' : ''"></div>
            <div class="w-4 h-1 duration-300 rounded-lg"
                :class="open ? '!bg-black rotate-45 origin-bottom-right w-8 translate-y-1' :
                    ''">
            </div>
        </div>
        <div x-cloak x-show="open" x-transition.opacity.duration.300
            class="absolute top-0 left-0 w-screen h-screen gap-4 backdrop-blur-sm bg-black/50">
            <div x-cloak x-on:click.away="open = false"
                class="absolute right-0 w-4/5 h-full transition-all duration-300 z bg-neutral"
                :class="open ? 'right-0' : '-right-80'">
                <div class="relative flex flex-col gap-0.5 items-center justify-center size-full">
                    <div class="absolute left-3 *:*:!text-black top-3">
                        <x-application-logo />
                    </div>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    {{-- BERITA --}}
                    <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        {{ __('Berita') }}
                    </x-nav-link>

                    {{-- GALERI --}}
                    <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        {{ __('Galeri') }}
                    </x-nav-link>

                    {{-- VIDEO --}}
                    <x-nav-link :href="route('videos.index')" :active="request()->routeIs('videos.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        {{ __('Video') }}
                    </x-nav-link>

                    {{-- KERJASAMA PERUSAHAAN --}}
                    <x-nav-link :href="route('cooperations.index')" :active="request()->routeIs('cooperations.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                        {{ __('Kerjasama') }}
                    </x-nav-link>

                    {{-- GURU --}}
                    <x-nav-link :href="route('teachers.index')" :active="request()->routeIs('teachers.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        {{ __('Guru') }}
                    </x-nav-link>

                    {{-- ROLE GURU --}}
                    <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        {{ __('Role') }}
                    </x-nav-link>

                    {{-- DATA USER --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" active_class="bg-primary text-white"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ __('Pengguna') }}
                    </x-nav-link>

                    {{-- logout --}}
                    <x-alert message="Anda yakin ingin logout?" class="absolute bottom-2">
                        <span
                            class="font-bold text-red-500 duration-300 border-red-500 hover:text-white py-1.5 px-4 hover:bg-red-500 rounded-lg text-sm active:bg-red-600 cursor-pointer flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>

                            Logout
                        </span>

                        <x-slot name="action">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="font-semibold  duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">Logout</button>
                            </form>
                        </x-slot>
                    </x-alert>
                </div>
            </div>
        </div>
    </nav>

    <nav class="relative flex-col flex-1 hidden w-full gap-1 md:flex">
        {{-- BERANDA DASHBOARD --}}
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            {{ __('Dashboard') }}
        </x-nav-link>

        {{-- BERITA --}}
        <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
            {{ __('Berita') }}
        </x-nav-link>

        {{-- GALERI --}}
        <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            {{ __('Galeri') }}
        </x-nav-link>

        {{-- VIDEO --}}
        <x-nav-link :href="route('videos.index')" :active="request()->routeIs('videos.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
            {{ __('Video') }}
        </x-nav-link>

        {{-- KERJASAMA PERUSAHAAN --}}
        <x-nav-link :href="route('cooperations.index')" :active="request()->routeIs('cooperations.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
            </svg>
            {{ __('Kerjasama') }}
        </x-nav-link>

        {{-- GURU --}}
        <x-nav-link :href="route('teachers.index')" :active="request()->routeIs('teachers.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
            {{ __('Guru') }}
        </x-nav-link>

        {{-- ROLE GURU --}}
        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
            {{ __('Role') }}
        </x-nav-link>

        {{-- DATA SISWA --}}
        <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
            </svg>
            {{ __('Siswa') }}
        </x-nav-link>

        {{-- DATA USER --}}
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" active_class="bg-primary text-white"
            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[95%] duration-300 active:bg-primary active:brightness-90 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            {{ __('Pengguna') }}
        </x-nav-link>

        {{-- logout --}}
        <x-alert message="Anda yakin ingin logout?" class="absolute bottom-0">
            <span
                class="font-bold text-red-500 duration-300 border-red-500 hover:text-white py-1.5 px-4 hover:bg-red-500 rounded-lg text-sm active:bg-red-600 cursor-pointer flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>

                Logout
            </span>

            <x-slot name="action">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="font-semibold  duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">Logout</button>
                </form>
            </x-slot>
        </x-alert>
    </nav>

</div>
