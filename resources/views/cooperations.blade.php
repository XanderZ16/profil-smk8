<x-main title="Tenaga Pendidik">
    <div class="w-full my-8 *:max-w-screen-lg *:mx-auto">
        <div class="w-full p-6 rounded-md bg-secondary">
            <h1 class="text-2xl font-semibold text-center uppercase">Kerjasama Industri</h1>
            <p class="mt-4">
                SMKN 8 Batam telah menjalin sejumlah kerjasama dengan beberapa pihak industri ataupun instansi dengan
                upaya untuk meningkatkan kompetensi dan keterampilan siswa SMKN 8 Batam pada masa PKL (Praktik Kerja
                Lapangan) nantinya. Dengan harapan membuka lebih banyak pilihan tempat pkl kepada para siswa SMKN 8
                Batam
            </p>
            <br>
            <p>Berikut adalah daftar instansi yang telah menjalin kerjasama dengan SMKN 8 Batam :</p>
        </div>
        <hr class="my-4 border-black">
        <div class="grid grid-cols-1 gap-4 px-4 mt-4 md:grid-cols-2 md:gap-2">
            @forelse ($cooperations as $cooperation)
                <div class="group">
                    <h3 class="text-lg font-semibold">{{ $loop->index + 1 }}. {{ $cooperation->name }}</h3>
                    <div class="relative overflow-hidden *:rounded-md">
                        <img src="{{ asset('storage/' . $cooperation->image) }}" alt="{{ $cooperation->name }}"
                            class="object-cover w-full mt-2 aspect-video">
                        <p
                            class="absolute bottom-0 right-0 px-3 py-2 text-white duration-300 translate-y-1/2 opacity-0 bg-black/50 backdrop-blur-sm group-hover:opacity-100 group-hover:translate-y-0">
                            {{ $cooperation->created_at }}</p>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center flex-1 w-full mt-12 col-span-full">Tidak ada kerjasama terdaftar</div>
            @endforelse
        </div>
    </div>
</x-main>
