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
                    placeholder="Cari berita">
            </div>

            <select wire:model.live="category" class="block p-2 ml-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 w-fit sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="all">Semua</option>
                <option value="news">Berita</option>
                <option value="activity">Kegiatan</option>
            </select>
        </div>
        <a href="{{ route('news.create') }}"
            class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">
            {{ __('Tambah Berita') }}
        </a>
    </div>
    <div class="w-full px-4 mt-4">
        <table class="w-full rounded-lg shadow-xl bg-secondary">
            <thead>
                <tr class="*:p-2">
                    <th class="w-[5%]">No</th>
                    <th>Gambar</th>
                    <th class="w-[50%]">Judul</th>
                    <th class="w-[5%]">Pengunjung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr class="*:p-2 bg-slate-100">
                        <td class="text-center border-r">{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="object-cover size-16">
                        </td>
                        <td class="border-r">{{ $item->title }}</td>
                        <td class="text-center border-r">{{ $item->seen }}</td>
                        <td class="">
                            <div class="flex items-center justify-center h-full gap-2">
                                <a href="{{ route('news.show', $item->title) }}"
                                    class="px-4 py-1.5 leading-snug font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">
                                    {{ __('Lihat') }}
                                </a>
                                <a href="{{ route('news.edit', $item->id) }}"
                                    class="px-4 py-1.5 leading-snug font-semibold text-white bg-amber-500 rounded-md cursor-pointer hover:bg-amber-600">
                                    {{ __('Edit') }}
                                </a>
                                <x-alert message="Anda yakin ingin menghapus berita ini?">
                                    <span
                                        class="px-4 py-1.5 font-semibold text-white bg-red-500 rounded-md cursor-pointer hover:bg-red-600">{{ __('Hapus') }}</span>
                                    <x-slot name="action">
                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST">
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
                        </td>
                    </tr>
                @empty
                    <tr class="*:px-2 *:py-8 bg-slate-100">
                        <td colspan="5" class="text-center">Tidak ada berita</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
