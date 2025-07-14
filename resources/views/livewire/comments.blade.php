<div class="mt-4">
    <h3 class="text-xl font-semibold text-center">{{ __('Komentar') }}</h3>

    {{-- COMMENT FORM --}}
    <form class="flex flex-col" wire:submit.prevent="store">
        <div class="mt-2 space-y-2">
            <div class="@auth hidden @endauth space-y-2">
                <label for="name" class="block font-semibold cursor-pointer">Nama</label>
                <input id="name" type="text" placeholder="Masukkan Nama" wire:model="name" class="w-full p-2">
            </div>

            <div class="space-y-2">
                <label for="comment" class="block font-semibold cursor-pointer">Komentar</label>
                <textarea id="comment" type="text" placeholder="Masukkan komentar disini" wire:model="text" class="w-full p-2"></textarea>
            </div>
        </div>
        <button
            class="self-end px-4 py-1 mt-2 rounded-md cursor-pointer w-fit bg-primary hover:bg-primary/90 text-neutral">Kirim</button>
    </form>

    {{-- COMMENT LIST --}}
    <div class="mt-4">
        @forelse ($comments as $comment)
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">{{ $comment->name }}</span>
                    <span class="text-sm text-gray-500">{{ $comment->created_at->format('d F Y') }}</span>
                    <x-alert message="Anda yakin ingin menghapus komentar ini?" class="ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-red-500 cursor-pointer size-5 hover:fill-red-500 hover:text-black">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                        <x-slot name="action">
                            <form wire:submit.prevent="destroy({{ $comment->id }})">
                                <button
                                    class="font-semibold duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">
                                    {{ __('Hapus') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-alert>
                </div>
                <p>{{ $comment->text }}</p>
            </div>
        @empty
            <div class="flex items-center justify-center flex-1 w-full mt-12 text-lg font-semibold">Tidak ada komentar
            </div>
        @endforelse
    </div>
</div>
