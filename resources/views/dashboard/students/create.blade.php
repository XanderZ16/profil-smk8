<x-dashboard title="Tambah Siswa">
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
        class="p-4 m-4 rounded-lg shadow-xl bg-secondary">
        @csrf
        <div>
            <label for="file"
                class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                Data
            </label>
            <input type="file" name="file" id="file"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Nama" value="{{ old('file') }}">
            @error('file')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div x-data="{ open: false }" class="my-4">
            <div x-on:click="open = !open" class="flex items-center w-full gap-2">
                <div class="flex-1 bg-slate-400 h-0.5"></div>
                <div class="flex items-center gap-1 cursor-pointer">
                    <p class="text-sm text-center">Atau tambah manual</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="duration-300 size-4" :class="{ 'rotate-180': open }">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
                <div class="flex-1 bg-slate-400 h-0.5"></div>
            </div>

            <div x-cloak x-show="open">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                        Nama siswa
                    </label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan Nama" value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="nis"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('nis') text-red-500 @enderror">
                        NIS (Nomor Induk Siswa)
                    </label>
                    <input type="number" name="nis" id="nis"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan NIS" value="{{ old('nis') }}">
                    @error('nis')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="nisn"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('nisn') text-red-500 @enderror">
                        NISN (Nomor Induk Siswa Nasional)
                    </label>
                    <input type="number" name="nisn" id="nisn"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan NISN" value="{{ old('nisn') }}">
                    @error('nisn')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="gender"
                        class="block mb-2 text-sm font-medium text-gray-900 @error('nis') text-red-500 @enderror">
                        Jenis kelamin
                    </label>
                    <select name="gender" id="gender"
                        class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="l" class="px-2 py-0.5 hover:bg-blue-500">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>

        <div>
            <label for="generation"
                class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                Generasi ke
            </label>
            <div class="flex items-center gap-2">
                <input type="number" name="generation" id="generation"
                    class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Generasi ke" value="{{ old('generation', 1) }}">
                <div>
                    Tahun <span>2017</span>
                </div>
            </div>
            @error('generation')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 mt-4 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Tambah</button>
    </form>
</x-dashboard>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputGeneration = document.getElementById('generation');
        const yearSpan = document.querySelector('#generation ~ div span');

        // Atur nilai awal saat halaman diload
        const currentYear = new Date().getFullYear();
        const baseYear = 2017;

        // Fungsi untuk menghitung dan mengatur tahun berdasarkan input
        function updateYearFromInput() {
            let generationValue = parseInt(inputGeneration.value, 10);
            if (generationValue < 1) {
                generationValue = 1; // Kembali ke 1 jika kurang dari 1
            }
            inputGeneration.value = generationValue; // Perbarui input jika diubah
            const calculatedYear = baseYear + (generationValue - 1);
            yearSpan.textContent = calculatedYear; // Perbarui span tahun
        }

        // Fungsi untuk menghitung dan mengatur input berdasarkan tahun saat ini
        function setInitialValues() {
            const initialGeneration = currentYear >= baseYear ? currentYear - baseYear + 1 : 1;
            inputGeneration.value = initialGeneration;
            yearSpan.textContent = currentYear;
        }

        // Jalankan pengaturan nilai awal
        setInitialValues();

        // Tambahkan event listener untuk perubahan nilai input
        inputGeneration.addEventListener('input', updateYearFromInput);
    });
</script>
