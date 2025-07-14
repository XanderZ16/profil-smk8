@props(['message', 'class' => ''])

<div x-data="{ open: false }" class="{{ $class }}">
    <div x-on:click="open = true">
        {{ $slot }}
    </div>
    <div x-cloak x-transition.duration.300 x-show="open" class="fixed inset-0 z-20 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div x-on:click.away="open = false" class="flex flex-col items-center p-6 rounded-lg shadow-xl bg-secondary min-w-[300px] max-w-[90%] relative">
            <iframe src="https://lottie.host/embed/07541f97-709f-4a72-bcb2-0028c14e9fb6/zSDekXb6Cs.json" class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 size-12"></iframe>
            <h5 class="text-lg font-bold uppercase">Peringatan</h5>
            <p class="mt-2">{{ $message }}</p>
            <div class="flex items-center justify-around w-full mt-4">
                <span x-on:click="open = false" class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">Batal</span>
                {{ $action }}
            </div>
        </div>
    </div>
</div>
