@extends('layouts.app')

@section('title', 'SMK Negeri 8 Batam - Akademik Kesehatan')

@section('content')

    @include('partials.header')
    {{-- COVER --}}
    <img src="{{ asset('images/jurusan/ak/cover.jpg') }}" alt="Akademik Kesehatan"
        class="w-screen h-[75vh] object-cover brightness-75 duration-500" id="cover">

    <h1 class="py-4 pl-4 text-3xl font-semibold text-center text-white duration-500 -translate-y-full" id="major">
        Asisten Keperawatan</h1>
    <p class="max-w-screen-md px-6 mx-auto text-justify font-outfit">
        <img src="/icons/ak.png" alt="Akademik Kesehatan" class="float-left mr-6 size-[15vw]">
        Jurusan asisten keperawatan merupakan program yang bertujuan untuk menghasilkan tenaga ahli dalam asistensi
        keperawatan yang terampil dan kompeten di bidang pelayanan dasar keperawatan khususnya pemenuhan kebutuhan dasar
        manusia. Lulusan dari jurusan keperawatan diharapkan dapat memfasilitasi perawatan individu, keluarga,
        masyarakat, sehingga mereka dapat mencapai, mempertahankan, dan memulihkan kondisi kesehatan yang optimal dan
        kualitas hidup yang prima.
    </p>

    <div class="w-full max-w-screen-md mx-auto">
        <div class="p-3 mx-6 mt-4 rounded-md bg-primary w-fit">
            <h3 class="font-semibold text-neutral">Peluang Kerja - Asisten Keperawatan</h3>
            <hr class="my-2 border-neutral">
            <ol class="*:text-neutral">
                <li>Karyawan Rumah Sakit</li>
                <li>Karyawan Industri</li>
                <li>Karyawan Swasta</li>
                <li>Perawat Rumah Sakit</li>
                <li>Perawat Industri</li>
                <li>Perawat Rumah Sakit</li>
                <li>Perawat Industri</li>
                <li>Perawat Rumah Sakit</li>
            </ol>
        </div>
    </div>

    {{-- GALLERY --}}
    <div class="container px-6 mx-auto mt-6" x-data="gallery()">
        <h1 class="text-3xl font-semibold text-center uppercase ">Galeri Jurusan</h1>
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 gap-4 mt-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-2">
            <template x-for="(image, index) in images" :key="index">
                <div class="relative">
                    <img :src="'/storage/' + image"
                        class="object-cover w-full transition duration-300 ease-in-out rounded-lg cursor-pointer aspect-video hover:scale-105"
                        x-on:click="openModal($event, index)" :alt="'Gallery image ' + (index + 1)">
                </div>
            </template>
        </div>

        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm"
            @click.self="closeModal()" @keydown.escape.window="closeModal()" @keydown.arrow-left.window="previousImage()"
            @keydown.arrow-right.window="nextImage()">
            <div class="relative max-w-[70vw] max-h-[75vh] overflow-hidden">
                <img :src="'/storage/' + images[currentImageIndex]" class="rounded-lg shadow-xl" alt="Modal image">

                <!-- Navigation Buttons -->
                <button x-on:click="previousImage()"
                    class="absolute p-2 transition duration-300 -translate-y-1/2 rounded-full left-4 top-1/2 bg-white/80 hover:bg-white"
                    x-show="images.length > 1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button x-on:click="nextImage()"
                    class="absolute p-2 transition duration-300 -translate-y-1/2 rounded-full right-4 top-1/2 bg-white/80 hover:bg-white"
                    x-show="images.length > 1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Close Button -->
                <button x-on:click="closeModal()"
                    class="absolute p-2 transition duration-300 rounded-full top-4 right-4 bg-white/80 hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- VIDEO --}}
    <h1 class="px-6 mt-6 mb-3 text-3xl font-semibold text-center uppercase">Video Jurusan</h1>
    <div class="pt-4 mt-2 shadow-2xl bg-secondary backdrop-blur-md">

        <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar -gap-4">
            @forelse ($videos as $video)
                <div
                    class="flex-none transition-all duration-300 ease-in-out scale-90 w-80 shrink-0 snap-center hover:scale-100">
                    <iframe class="w-full rounded-lg shadow-lg aspect-video" src="{{ $video->url }}"></iframe>
                </div>
            @empty
                <div class="w-full mb-4 text-center">
                    Tidak ada video
                </div>
            @endforelse
        </div>

        <x-running-text text="Video Jurusan" delimeter=" • " />
    </div>

    @include('partials.footer')

    <script>
        document.addEventListener('scroll', function() {
            if (window.scrollY > 1) {
                document.querySelector('#cover').classList.add('!brightness-100', '!h-[50vh]');
                document.querySelector('#major').classList.remove('-translate-y-full', 'text-white');
                document.querySelector('#hamburger').classList.add('*:!bg-black');
            } else {
                document.querySelector('#cover').classList.remove('!brightness-100', '!h-[50vh]');
                document.querySelector('#major').classList.add('-translate-y-full', 'text-white');
                document.querySelector('#hamburger').classList.remove('*:!bg-black');
            }
        })

        function gallery() {
            return {
                images: @json($galleries->pluck('image')),
                isModalOpen: false,
                currentImageIndex: 0,

                openModal(event, index) {
                    this.currentImageIndex = index;
                    this.isModalOpen = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.isModalOpen = false;
                    document.body.style.overflow = 'auto';
                },

                nextImage() {
                    this.currentImageIndex = (this.currentImageIndex + 1) % this.images.length;
                },

                previousImage() {
                    this.currentImageIndex = (this.currentImageIndex - 1 + this.images.length) % this.images.length;
                }
            }
        }
    </script>
@endsection
