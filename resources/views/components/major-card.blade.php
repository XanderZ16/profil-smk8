@props(['href', 'major'])

<div class="flex flex-col gap-3 p-4 rounded-md shadow-xl bg-secondary">
    <h3 class="text-lg font-semibold">
        {{ $slot }}
    </h3>
    <img src="{{ asset('images/jurusan/' . $major . '/cover.jpg') }}" alt="{{ $slot }}"
        class="flex-1 object-cover w-full rounded-md aspect-video">
    <a href="{{ $href }}"class="relative block group w-fit h-fit">
        <span
            class="relative z-10 inline-block w-full h-full px-4 py-2 font-semibold leading-none rounded-lg bg-primary text-secondary">
            Selengkapnya
        </span>
        <div
            class="absolute top-0 left-0 z-0 w-full h-full duration-150 rounded-lg bg-primary brightness-50 group-hover:left-1 group-hover:top-1">
        </div>
    </a>
</div>
