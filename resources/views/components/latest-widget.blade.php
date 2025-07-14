@props(['type', 'data'])

<div class="relative p-6 shadow-md rounded-xl">
    <img src="{{ asset('images/home.jpg') }}" alt="Trending"
        class="absolute inset-0 object-cover w-full h-full rounded-xl brightness-50">

    <div class="relative z-10 flex gap-[5%] flex-col md:flex-row">
        <div class="flex md:w-1/3">
            <h2 class="text-xl font-semibold text-white">{{ $type == 'news' ? 'Berita Terbaru' : 'Kegiatan Terbaru' }}</h2>
            <x-share-widget class="absolute bottom-0 left-0 hidden cursor-pointer md:block" />
        </div>

        <div class="flex w-full gap-4 mt-3 overflow-x-scroll no-scrollbar snap-mandatory snap-x md:mb-0">
            @forelse ($data as $item)
                <a href="{{ route('news.show', $item->title) }}"
                    class="block rounded-md snap-start cursor-pointer bg-[#574f8d] w-1/2 lg:w-1/3 flex-shrink-0">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                        class="object-cover w-full rounded-md aspect-video">
                    <h3 class="px-2 text-white py-1.5 line-clamp-2">{{ $item->title }}</h3>
                </a>
            @empty
            @endforelse
        </div>
    </div>
</div>
