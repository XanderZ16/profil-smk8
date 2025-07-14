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
                    placeholder="Cari video">
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
        <a href="{{ route('videos.create') }}"
            class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">
            {{ __('Tambah Video') }}
        </a>
    </div>
    <div class="grid grid-cols-1 gap-4 px-4 mt-4 sm:grid-cols-2 md:grid-cols-3 md:gap-2">
        @forelse ($videos as $video)
            <iframe class="w-full rounded-lg shadow-lg aspect-video" src="{{ $video->url }}"></iframe>
        @empty
            <div class="flex items-center justify-center flex-1 w-full col-span-3 mt-12 text-lg font-semibold">Tidak ada
                video</div>
        @endforelse
    </div>
</div>
