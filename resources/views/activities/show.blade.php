<x-main title="{{ $activity->title }}">
    <div class="w-full max-w-screen-lg my-8">
        <x-latest-widget type="activities" :data="$latestActivities" />
        <x-share-widget class="relative mt-2 cursor-pointer md:hidden w-fit" />

        <div class="flex flex-col gap-2 mt-8 lg:flex-row lg:gap-4">
            <div class="w-full md:w-2/3 md:px-2 lg:px-0">
                <h1 class="text-3xl font-semibold md:text-4xl text-start">{{ $activity->title }}</h1>
                <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="w-full mt-4 rounded-xl">
                <div class="mt-4">
                    {!! $activity->content !!}
                </div>
            </div>

            <x-side-news title="Berita Terbaru" :data="$latestNews" type="activities"
                class="hidden md:w-2/5 md:block"></x-side-news>
        </div>

        @livewire('comments', ['post' => $activity])
    </div>
</x-main>
