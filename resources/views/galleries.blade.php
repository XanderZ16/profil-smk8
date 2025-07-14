<x-main title="Galeri">
    <div class="px-4 my-8 md:px-8">
        <h1 class="text-3xl font-semibold text-center">Galeri</h1>

        <div class="grid grid-cols-2 gap-2 mt-4 md:grid-cols-3 md:gap-2 xl:grid-cols-4">
            @forelse ($galleries as $gallery)
                <div x-data="{ open: false }" class="relative group hover:cursor-pointer">
                    <!-- Gambar dengan klik untuk membuka popup -->
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" x-on:click="open = true"
                        class="duration-300 rounded-md group-hover:blur-[2px] aspect-square object-cover">

                    <!-- Judul -->
                    <h3
                        class="absolute bottom-0 text-lg font-semibold text-white duration-300 opacity-0 left-2 group-hover:bottom-2 group-hover:opacity-100 font-outfit">
                        {{ $gallery->title }}
                    </h3>

                    <!-- Popup -->
                    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="fixed inset-0 z-50 flex items-center justify-center w-screen h-screen backdrop-blur-sm bg-black/50">
                        <div x-on:click.away="open = false" class="p-4 bg-white rounded-md">
                            <!-- Tombol Close -->
                            <button x-on:click="open = false"
                                class="absolute text-red-500 top-4 right-4 hover:text-red-600">
                                &times;
                            </button>

                            <!-- Konten Popup -->
                            <h4 class="mb-2 text-lg font-semibold">{{ $gallery->title }}</h4>
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                class="rounded-md max-w-full max-h-[80vh]">
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 py-40 text-center">Tidak ada data</div>
            @endforelse
        </div>

    </div>
</x-main>
