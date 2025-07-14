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
                    placeholder="Cari siswa">
            </div>

            {{-- FILTER ANGKATAN --}}
            <select wire:model.live="generation"
                class="block p-2 ml-4 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 w-fit sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                @if ($maxGeneration == 0)
                    <option>Data kosong</option>
                @endif
                @for ($i = 1; $i <= $maxGeneration; $i++)
                    <option value="{{ $i }}" @if ($generation == $i) selected @endif>
                        {{ $i }}
                    </option>
                @endfor
            </select>

            {{-- FILTER JURUSAN --}}
            <select wire:model.live="major"
                class="block p-2 ml-4 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 w-fit sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                @if ($students->count() == 0)
                    <option>Data kosong</option>
                @else
                    <option value="all">Semua</option>
                    <option value="ak">Asisten Keperawatan</option>
                    <option value="fkk">Farmasi Klinis & Komunitas</option>
                    <option value="im">Instrumentasi Medik</option>
                    <option value="tlm">Teknologi Laboratorium Medik</option>
                    <option value="tkj">Teknik Komputer Jaringan</option>
                    <option value="ps">Pekerjaan Sosial</option>
                @endif
            </select>
        </div>
        <div class="flex items-center gap-2 md:gap-3">
            @if ($students->count() != 0)
                <x-alert message="Anda yakin ingin menghapus semua data siswa yang difilter?">
                    <span
                        class="text-red-500 rounded-md cursor-pointer hover:text-white hover:bg-red-500 px-4 py-1.5 duration-200">Hapus</span>
                    <x-slot name="action">
                        <form x-on:click="open = false" wire:submit.prevent="destroyAll" class="flex gap-2">
                            <button
                                class="font-semibold duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">Hapus
                                semua</button>
                        </form>
                    </x-slot>
                </x-alert>
            @endif
            <a href="{{ route('students.create') }}"
                class="px-4 py-1.5 font-semibold text-white bg-primary rounded-md cursor-pointer hover:bg-primary/90">{{ __('Tambah Siswa') }}</a>
        </div>
    </div>

    <table class="w-full mt-4 rounded-lg shadow-xl bg-secondary">
        <thead>
            <tr class="*:p-2">
                <th class="w-[5%] text-start">No</th>
                <th class="text-start">Nama</th>
                <th class="text-start">NIS</th>
                <th class="text-start">NISN</th>
                <th class="text-start">Jenis Kelamin</th>
                <th class="text-start">Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($students as $key => $student)
                <tr class="*:p-2 bg-slate-100">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nisn }}</td>
                    <td>
                        @if ($student->gender == 'l')
                            Laki-laki
                        @endif
                        @if ($student->gender == 'p')
                            Perempuan
                        @endif
                    </td>
                    <td class="uppercase">{{ $student->major }}</td>
                    <td>
                        <div class="flex items-center justify-center h-full gap-2">
                            <x-alert message="Anda yakin ingin menghapus siswa ini?">
                                <span
                                    class="px-4 py-1.5 font-semibold text-white bg-red-500 rounded-md cursor-pointer hover:bg-red-600">{{ __('Hapus') }}</span>
                                <x-slot name="action">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
                    <td colspan="8" class="text-center">Tidak ada data siswa</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
