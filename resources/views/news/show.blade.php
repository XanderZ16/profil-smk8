<x-main title="{{ $news->title }}">
    <div class="w-full max-w-screen-lg my-8">
        <x-latest-widget type="news" :data="$latestNews" />
        <x-share-widget class="relative mt-2 cursor-pointer md:hidden w-fit" />

        <div class="flex flex-col gap-2 mt-4 md:mt-8 md:flex-row lg:gap-4">
            <div class="w-full md:w-2/3 md:px-2 lg:px-0">
                <h1 class="text-3xl font-semibold md:text-4xl text-start">{{ $news->title }}</h1>
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="mt-4 rounded-xl">
                <div class="mt-4">
                    {!! $news->content !!}
                </div>
            </div>

            <x-side-news title="Kegiatan Terbaru" :data="$latestActivities" type="activities"
                class="hidden md:w-2/5 md:block"></x-side-news>
        </div>

        @livewire('comments', ['post' => $news])
    </div>
</x-main>
