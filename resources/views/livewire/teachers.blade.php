<div class="mx-auto mt-4 w-[95%] lg:w-[90%]">
    <div class="flex justify-between">
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
                    placeholder="Cari guru">
            </div>

            <select wire:model.live="role"
                class="block p-2 ml-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 w-fit sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="all">Semua</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('teachers.create') }}"
            class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">{{ __('Tambah Guru') }}</a>
    </div>

    <table class="w-full mt-4 rounded-lg shadow-xl bg-secondary">
        <thead>
            <tr class="*:p-2">
                <th class="w-[5%] text-start">No</th>
                <th class="text-start">Nama</th>
                <th class="text-start">NIP</th>
                <th class="text-start">Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($teachers as $key => $teacher)
                <tr class="*:p-2 bg-slate-100">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('storage/' . $teacher->profile) }}" alt="{{ $teacher->name }}"
                                class="object-cover rounded-full size-10">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $teacher->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $teacher->position }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $teacher->nip }}</td>
                    <td>{{ $teacher->role->name }}</td>
                    <td>
                        <div class="flex items-center justify-center h-full gap-2">
                            <a href="{{ route('teachers.edit', $teacher->id) }}"
                                class="px-4 py-1.5 leading-snug font-semibold text-white bg-amber-500 rounded-md cursor-pointer hover:bg-amber-600">
                                {{ __('Edit') }}
                            </a>
                            <x-alert message="Anda yakin ingin menghapus berita ini?">
                                <span
                                    class="px-4 py-1.5 font-semibold text-white bg-red-500 rounded-md cursor-pointer hover:bg-red-600">{{ __('Hapus') }}</span>
                                <x-slot name="action">
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
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
                <tr class="*:py-8 bg-slate-100">
                    <td colspan="5" class="text-center">Tidak ada data guru</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
