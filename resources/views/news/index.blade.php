<x-main title="Berita">
    <div class="w-full max-w-screen-lg my-8">
        <h1 class="w-full py-8 text-3xl font-semibold text-center rounded-md shadow-md bg-secondary">Berita Terbaru</h1>
        <div class="flex flex-col mt-4 md:flex-row">
            <div class="w-full px-4 space-y-3 md:w-3/5 md:px-2 lg:px-0">
                @forelse ($news as $item)
                    <x-news-card :item="$item" href="{{ route('news.show', $item->title) }}" />
                @empty
                    <div class="flex items-center justify-center py-12">Tidak ada data</div>
                @endforelse
            </div>
            <x-side-news title="Kegiatan Terbaru" :data="$latestActivities" type="activities"
                class="hidden md:w-2/5 md:block"></x-side-news>
        </div>
    </div>
</x-main>
