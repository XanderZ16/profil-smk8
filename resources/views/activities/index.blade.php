<x-main title="Kegiatan">
    <div class="w-full max-w-screen-lg my-8">
        <h1 class="w-full py-8 text-3xl font-semibold text-center rounded-md shadow-md bg-secondary">Kegiatan Terbaru
        </h1>
        <div class="flex flex-col mt-4 lg:flex-row">
            <div class="space-y-3 lg:w-3/5">
                @forelse ($activities as $item)
                    <x-news-card :item="$item" href="{{ route('activities.show', $item->title) }}" />
                @empty
                    <div class="flex items-center justify-center py-12">Tidak ada data</div>
                @endforelse
            </div>
            <x-side-news title="Berita Terbaru" :data="$latestNews" class="hidden lg:w-2/5 lg:block"></x-side-news>
        </div>
    </div>
</x-main>
