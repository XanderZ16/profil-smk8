<x-dashboard title="Kerjasama Industri">
    <div class="flex px-4 mt-4">
        <a href="{{ route('cooperations.create') }}"
            class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">
            {{ __('Tambah Kerjasama') }}
        </a>
    </div>
    <div class="grid grid-cols-1 gap-4 px-4 mt-4 lg:grid-cols-2 md:gap-2">
        @forelse ($cooperations as $cooperation)
            <div class="group">
                <h3 class="text-lg font-semibold">{{ $loop->index + 1 }}. {{ $cooperation->name }}</h3>
                <div class="relative overflow-hidden *:rounded-md">
                    <img src="{{ asset('storage/' . $cooperation->image) }}" alt="{{ $cooperation->name }}"
                        class="object-cover w-full mt-2 aspect-video">

                    {{-- DELETE BUTTON --}}
                    <x-alert message="Anda yakin ingin menghapus kerjasama ini?"
                        class="absolute duration-300 opacity-0 top-4 right-2 group-hover:opacity-100">
                        <span class="cursor-pointer fill-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                        <x-slot name="action">
                            <form action="{{ route('cooperations.destroy', $cooperation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="font-semibold duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">
                                    {{ __('Hapus') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-alert>

                    {{-- TIMESTAMP --}}
                    <p
                        class="absolute bottom-0 right-0 px-3 py-2 text-white duration-300 translate-y-1/2 opacity-0 bg-black/50 backdrop-blur-sm group-hover:opacity-100 group-hover:translate-y-0">
                        {{ $cooperation->created_at }}</p>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center flex-1 w-full mt-12 col-span-full">Tidak ada kerjasama</div>
        @endforelse
    </div>
</x-dashboard>
