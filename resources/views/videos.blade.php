<x-main title="Video">
    <div class="my-8">
        <h1 class="text-3xl font-semibold text-center">Video</h1>

        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 md:gap-2">
            @forelse ($videos as $video)
                <iframe class="w-full rounded-lg shadow-lg aspect-video" src="{{ $video->url }}"></iframe>
            @empty
                <div class="col-span-4 py-40 text-center">Tidak ada data</div>
            @endforelse
        </div>
    </div>
</x-main>
