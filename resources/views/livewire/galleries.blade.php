<div>
    <div class="flex justify-between px-4 mt-4">
        <div class="flex items-center">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" wire:model.live="search"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari galeri">
            </div>

            <select wire:model.live="category" class="block p-2 ml-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 w-fit sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="all">Semua</option>
                <option value="normal">Reguler</option>
                <option value="ak">Asisten Keperawatan</option>
                <option value="fkk">Farmasi Klinis & Komunitas</option>
                <option value="im">Instrumentasi Medik</option>
                <option value="tlm">Teknologi Laboratorium Medik</option>
                <option value="tkj">Teknik Komputer Jaringan</option>
                <option value="ps">Pekerjaan Sosial</option>
            </select>
        </div>
        <a href="{{ route('galleries.create') }}"
            class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">
            {{ __('Tambah Galeri') }}
        </a>
    </div>
    <div class="grid grid-cols-1 gap-4 px-4 mt-4 sm:grid-cols-2 md:grid-cols-3 md:gap-2">
        @forelse ($galleries as $gallery)
            <div class="relative overflow-hidden rounded-md group hover:cursor-pointer">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                    class="duration-300 aspect-video object-cover group-hover:blur-[2px] scale-110 group-hover:scale-100">
                <div
                    class="absolute top-0 flex items-center gap-2 duration-300 opacity-0 right-2 group-hover:top-2 group-hover:opacity-100">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </a>

                    <x-alert message="Anda yakin ingin menghapus galeri ini?">
                        <span class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                        <x-slot name="action">
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="font-semibold duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">
                                    {{ __('Hapus') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-alert>
                </div>
                <h3
                    class="absolute bottom-0 text-lg font-semibold text-white duration-300 opacity-0 line-clamp-2 left-2 group-hover:bottom-2 group-hover:opacity-100 font-outfit">
                    {{ $gallery->title }}</h3>
            </div>
        @empty
            <div class="flex items-center justify-center flex-1 w-full col-span-3 mt-12 text-lg font-semibold">Tidak ada
                galeri</div>
        @endforelse
    </div>
</div>
