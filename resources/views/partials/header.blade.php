<header
    class="{{ request()->is('/') ? 'fixed h-20' : 'bg-secondary shadow-lg h-16' }} fixed z-40 flex items-center justify-between shadow-xl w-screen px-3 duration-300">
    <x-application-logo />

    {{-- MOBILE NAVBAR --}}
    <nav x-data="{ open: false }" class="z-50 mr-2 md:hidden">
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
                class="absolute right-0 w-4/5 h-full transition-all duration-300 bg-neutral"
                :class="open ? 'right-0' : '-right-80'">
                <div class="relative flex flex-col gap-0.5 items-center justify-center size-full">
                    <div class="absolute left-3 *:*:!text-black top-3">
                        <x-application-logo />
                    </div>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    @admin
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            active_class="text-secondary bg-primary hover:bg-primary/90"
                            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endadmin
                    <x-nav-link :href="route('dapo')" :active="request()->routeIs('dapo')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Data Pokok') }}
                    </x-nav-link>

                    {{-- DROPDOWN JURUSAN --}}
                    <div x-data="{ open: false }" x-on:click="open = true" x-on:click.away="open = false"
                        x-on:mouseover="open = true" x-on:mouseleave="open = false"
                        class="relative px-4 py-2 rounded-md w-[90%] cursor-pointer hover:bg-primary hover:text-white duration-300 {{ request()->routeIs('majors.*') ? 'bg-primary text-white' : '' }}"
                        :class="open ? 'bg-primary text-white' : ''">
                        Kompotensi Keahlian
                        <div x-cloak x-show="open" x-transition.opacity.duration.300
                            class="absolute right-0 rounded-md w-[90%] shadow-xl top-full *:text-black">
                            <x-nav-link :href="route('majors.ak')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Asisten Keperawatan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('majors.fkk')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Farmasi Klinis dan Komunitas') }}
                            </x-nav-link>
                            <x-nav-link :href="route('majors.im')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Intrumentasi Medik') }}
                            </x-nav-link>
                            <x-nav-link :href="route('majors.tlm')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Teknologi Laboratorium Medik') }}
                            </x-nav-link>
                            <x-nav-link :href="route('majors.tkj')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Teknik Komputer Jaringan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('majors.ps')"
                                class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                {{ __('Pekerjaan Sosial') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <x-nav-link :href="route('news')" :active="request()->routeIs('news')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Berita') }}
                    </x-nav-link>
                    <x-nav-link :href="route('activities')" :active="request()->routeIs('activities')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Kegiatan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('galleries')" :active="request()->routeIs('galleries')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Galeri') }}
                    </x-nav-link>
                    <x-nav-link :href="route('videos')" :active="request()->routeIs('videos')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Video') }}
                    </x-nav-link>
                    <x-nav-link :href="route('cooperations')" :active="request()->routeIs('cooperations')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Kerjasama IDUKA') }}
                    </x-nav-link>
                    <x-nav-link :href="route('teachers')" :active="request()->routeIs('teachers')"
                        active_class="text-secondary bg-primary hover:bg-primary/90"
                        class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                        {{ __('Guru') }}
                    </x-nav-link>

                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="absolute left-4 bottom-4">
                            @csrf
                            <button
                                class="flex items-center gap-2 px-3 py-1 text-red-500 duration-300 rounded-md cursor-pointer text-md hover:bg-red-500 hover:text-secondary">
                                {{ __('Logout') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')"
                            class="px-4 py-2 rounded-md text-neutral bg-primary hover:bg-primary/90 w-[90%]">
                            {{ __('Login') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- DESKTOP NAVBAR --}}
    <nav id="nav-big" class="hidden relative px-2 z-50 gap-2 md:flex {{ request()->routeIs('home') ? '*:text-white' : '' }}">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-4 py-2 font-semibold duration-300">
            {{ __('Beranda') }}
        </x-nav-link>
        <div x-data="{ open: false }" x-on:click="open = true" x-on:click.away="open = false"
            x-on:mouseover="open = true" x-on:mouseleave="open = false"
            class="relative px-4 py-2 font-semibold duration-300 cursor-pointer">
            Profil
            <div x-cloak x-show="open" x-transition.opacity.duration.300
                class="absolute left-0 overflow-hidden rounded-md shadow-xl top-full *:text-black">
                <x-nav-link :href="route('history')" :active="request()->routeIs('history')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Sejarah') }}
                </x-nav-link>
                <x-nav-link :href="route('visimisi')" :active="request()->routeIs('visimisi')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Visi & Misi') }}
                </x-nav-link>
                <x-nav-link :href="route('kepsek')" :active="request()->routeIs('kepsek')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Kepala Sekolah') }}
                </x-nav-link>
                <x-nav-link :href="route('cooperations')" :active="request()->routeIs('cooperations')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Kerjasama IDUKA') }}
                </x-nav-link>
            </div>
        </div>
        <x-nav-link :href="route('dapo')" :active="request()->routeIs('dapo')" class="px-4 py-2 font-semibold duration-300">
            {{ __('Data Pokok') }}
        </x-nav-link>
        <div x-data="{ open: false }" x-on:click="open = true" x-on:click.away="open = false"
            x-on:mouseover="open = true" x-on:mouseleave="open = false"
            class="relative px-4 py-2 font-semibold duration-300 cursor-pointer">
            Informasi
            <div x-cloak x-show="open" x-transition.opacity.duration.300
                class="absolute left-0 overflow-hidden rounded-md shadow-xl top-full *:text-black">
                <x-nav-link :href="route('news')" :active="request()->routeIs('news')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Berita') }}
                </x-nav-link>
                <x-nav-link :href="route('activities')" :active="request()->routeIs('activities')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Kegiatan') }}
                </x-nav-link>
            </div>
        </div>

        {{-- THE REST WILL SHOW IN XL --}}
        <div x-data="{ open: false }" x-on:click="open = true" x-on:click.away="open = false"
            x-on:mouseover="open = true" x-on:mouseleave="open = false"
            class="relative hidden px-4 py-2 font-semibold duration-300 cursor-pointer xl:block">
            Jurusan
            <div x-cloak x-show="open" x-transition.opacity.duration.300
                class="absolute left-0 overflow-hidden rounded-md shadow-xl top-full *:text-black">
                <x-nav-link :href="route('majors.ak')" :active="request()->routeIs('majors.ak')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Asisten Keperawatan') }}
                </x-nav-link>
                <x-nav-link :href="route('majors.fkk')" :active="request()->routeIs('majors.fkk')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Farmasi Klinis dan Komunitas') }}
                </x-nav-link>
                <x-nav-link :href="route('majors.im')" :active="request()->routeIs('majors.im')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Intrumentasi Medik') }}
                </x-nav-link>
                <x-nav-link :href="route('majors.tlm')" :active="request()->routeIs('majors.tlm')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Teknologi Laboratorium Medik') }}
                </x-nav-link>
                <x-nav-link :href="route('majors.tkj')" :active="request()->routeIs('majors.tkj')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Teknik Komputer Jaringan') }}
                </x-nav-link>
                <x-nav-link :href="route('majors.ps')" :active="request()->routeIs('majors.ps')"
                    class="block w-full px-4 py-2 duration-150 bg-slate-100 hover:bg-secondary active:brightness-90 whitespace-nowrap">
                    {{ __('Pekerjaan Sosial') }}
                </x-nav-link>
            </div>
        </div>
        <x-nav-link :href="route('galleries')" :active="request()->routeIs('galleries')" class="hidden px-4 py-2 font-semibold duration-300 xl:block">
            {{ __('Galeri') }}
        </x-nav-link>
        <x-nav-link :href="route('videos')" :active="request()->routeIs('videos')" class="hidden px-4 py-2 font-semibold duration-300 xl:block">
            {{ __('Video') }}
        </x-nav-link>
        <x-nav-link :href="route('teachers')" :active="request()->routeIs('teachers')" class="hidden px-4 py-2 font-semibold duration-300 xl:block">
            {{ __('Guru') }}
        </x-nav-link>
        @admin
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hidden px-4 py-2 font-semibold duration-300 xl:block">
                {{ __('Dashboard') }}
            </x-nav-link>
        @endadmin
        @auth
        @else
            <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="hidden px-4 py-2 font-semibold duration-300 xl:block">
                {{ __('Login') }}
            </x-nav-link>
        @endauth

        {{-- BEFORE XL INSIDE SIDEBAR --}}
        <div x-data="{ open: false }" class="flex items-center mr-2 xl:hidden">
            <div x-on:click="open = !open" id="hamburger-2"
                class="relative z-50 flex flex-col items-end justify-center gap-1 cursor-pointer {{ request()->is('/') ? '*:bg-secondary' : '*:bg-black' }}">
                <div class="w-8 h-1 duration-300 rounded-lg"
                    :class="open ? '!bg-black -rotate-45 origin-top-right' : 'abc'">
                </div>
                <div class="w-6 h-1 duration-300 rounded-lg" :class="open ? 'rotate-45 opacity-0' : ''"></div>
                <div class="w-4 h-1 duration-300 rounded-lg"
                    :class="open ? '!bg-black rotate-45 origin-bottom-right w-8 translate-y-1' :
                        ''">
                </div>
            </div>
            <div x-cloak x-show="open" x-transition.opacity.duration.300
                class="fixed inset-0 w-screen h-screen gap-4 backdrop-blur-sm bg-black/50">
                <div x-cloak x-on:click.away="open = false"
                    class="absolute right-0 w-1/4 h-full transition-all duration-300 bg-neutral"
                    :class="open ? 'right-0' : '-right-80'">
                    <div class="relative flex flex-col gap-0.5 items-center justify-center size-full *:text-black">
                        @admin
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        @endadmin

                        {{-- DROPDOWN JURUSAN --}}
                        <div x-data="{ open: false }" x-on:click="open = true" x-on:click.away="open = false"
                            x-on:mouseover="open = true" x-on:mouseleave="open = false"
                            class="relative px-4 py-2 rounded-md w-[90%] cursor-pointer hover:bg-primary hover:text-white duration-300"
                            :class="open ? 'bg-primary text-white' : ''">
                            Kompotensi Keahlian
                            <div x-cloak x-show="open" x-transition.opacity.duration.300
                                class="absolute right-0 rounded-md w-[90%] shadow-xl top-full *:text-black">
                                <x-nav-link :href="route('majors.ak')" :active="request()->routeIs('majors.ak')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Asisten Keperawatan') }}
                                </x-nav-link>
                                <x-nav-link :href="route('majors.fkk')" :active="request()->routeIs('majors.fkk')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Farmasi Klinis dan Komunitas') }}
                                </x-nav-link>
                                <x-nav-link :href="route('majors.im')" :active="request()->routeIs('majors.im')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Intrumentasi Medik') }}
                                </x-nav-link>
                                <x-nav-link :href="route('majors.tlm')" :active="request()->routeIs('majors.tlm')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Teknologi Laboratorium Medik') }}
                                </x-nav-link>
                                <x-nav-link :href="route('majors.tkj')" :active="request()->routeIs('majors.tkj')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Teknik Komputer Jaringan') }}
                                </x-nav-link>
                                <x-nav-link :href="route('majors.ps')" :active="request()->routeIs('majors.ps')"
                                    class="block w-full px-4 py-2 duration-150 rounded-md bg-slate-50 hover:bg-primary hover:text-white active:brightness-90">
                                    {{ __('Pekerjaan Sosial') }}
                                </x-nav-link>
                            </div>
                        </div>
                        <x-nav-link :href="route('galleries')" :active="request()->routeIs('galleries')"
                            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                            {{ __('Galeri') }}
                        </x-nav-link>
                        <x-nav-link :href="route('videos')" :active="request()->routeIs('videos')"
                            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                            {{ __('Video') }}
                        </x-nav-link>
                        <x-nav-link :href="route('teachers')" :active="request()->routeIs('teachers')"
                            class="px-4 py-2 hover:bg-primary hover:text-white rounded-md w-[90%] duration-300 active:bg-primary active:brightness-90">
                            {{ __('Guru') }}
                        </x-nav-link>

                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="absolute left-4 bottom-4">
                                @csrf
                                <button
                                    class="flex items-center gap-2 px-3 py-1 text-red-500 duration-300 rounded-md cursor-pointer text-md hover:bg-red-500 hover:text-secondary">
                                    {{ __('Logout') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')"
                                class="px-4 py-2 rounded-md bg-secondary w-[90%]">
                                {{ __('Login') }}
                            </x-nav-link>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div x-data="{ open: false }" class="absolute right-0 z-0 flex flex-col w-full max-w-screen-sm pr-2 translate-y-full -bottom-0">
        <div x-cloak x-show="open" x-transition.duration.300 class="w-full overflow-hidden duration-300">
            <x-search-widget/>
        </div>
        <div x-on:click="open = !open" class="px-2 py-0.5 rounded-b-md self-end bg-neutral">
            <div class="duration-300" :class="open ? 'rotate-180' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
    </div>

    @if (Route::is('home'))
        <script>
            document.addEventListener('scroll', function() {
                if (window.scrollY > screen.height / 10) {
                    document.querySelector('header').classList.add('bg-secondary', '!h-14');
                    document.querySelector('#company').classList.remove('text-white');
                    document.querySelector('#hamburger').classList.add('*:!bg-black');
                    document.querySelector('#hamburger-2').classList.add('*:!bg-black');
                    document.querySelector('#nav-big').classList.remove('*:text-white');
                } else {
                    document.querySelector('header').classList.remove('bg-secondary', '!h-14');
                    document.querySelector('#company').classList.add('text-white');
                    document.querySelector('#hamburger').classList.remove('*:!bg-black');
                    document.querySelector('#hamburger-2').classList.remove('*:!bg-black');
                    document.querySelector('#nav-big').classList.add('*:text-white');
                }
            })
        </script>
    @endif

</header>

@livewireScripts()
