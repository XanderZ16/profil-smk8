@props(['item', 'href'])

<div class="flex gap-3">
    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
        class="object-cover w-2/5 rounded-md aspect-video">
    <div class="flex flex-col items-start justify-between">
        <h3 class="text-lg font-semibold line-clamp-2">{{ $item->title }}</h3>
        <a href="{{ $href }}"
            class="flex items-center gap-2 text-accent hover:underline hover:text-accent/90">
            Baca selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
</div>
