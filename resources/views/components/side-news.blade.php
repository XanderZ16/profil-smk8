@props(['title', 'data', 'type' => '', 'class' => ''])

<div class="bg-secondary rounded-xl shadow-md h-fit p-6 {{ $class }}">
    <h3 class="text-2xl font-semibold">{{ $title }}</h3>
    <div class="mt-4 space-y-3">
        @forelse ($data as $item)
            <x-news-card :item="$item"
                href="{{ $type == 'activities' ? route('activities.show', $item->title) : route('news.show', $item->title) }}"></x-news-card>
        @empty
            <div>
                Tidak ada data
            </div>
        @endforelse
    </div>
</div>
