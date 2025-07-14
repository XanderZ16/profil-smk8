<x-dashboard title="Tambah Guru">
    <form action="{{ route('teachers.store') }}" method="POST" class="p-4 m-4 rounded-lg shadow-xl bg-secondary"
        enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col gap-4 lg:flex-row">
            <div class="w-full lg:w-1/3">
                <label for="name"
                    class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                    Nama Guru
                </label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Nama Guru" required value="{{ old('name') }}">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mt-4 lg:w-2/3 lg:mt-0">
                <label for="position"
                    class="block mb-2 text-sm font-medium text-gray-900 @error('position') text-red-500 @enderror">
                    Jabatan guru
                </label>
                <input type="text" name="position" id="position"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Jabatan Guru" value="{{ old('position') }}">
                @error('position')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <label for="image"
                class="block mb-2 text-sm font-medium text-gray-900 @error('image') text-red-500 @enderror">
                Profile
            </label>
            <div class="flex gap-2">
                <div>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan Nama" required value="{{ old('image') }}">
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <img id="image-preview" alt="image preview"
                        class="object-cover h-0 duration-300 rounded-md size-32">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="nip"
                class="block mb-2 text-sm font-medium text-gray-900 @error('nip') text-red-500 @enderror">
                NIP Guru
            </label>
            <input type="text" name="nip" id="nip"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan NIP Guru" required value="{{ old('nip') }}">
            @error('nip')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="role" class="block mb-2">{{ __('Peran') }}</label>
            <select name="role" id="role"
                class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                @forelse ($roles as $key => $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        <button class="mt-4 py-1.5 px-4 bg-primary rounded-md hover:bg-primary/90 text-white">
            {{ __('Tambah') }}
        </button>
    </form>

    <script>
        const inputImage = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        inputImage.addEventListener('change', function() {
            const reader = new FileReader();
            reader.readAsDataURL(inputImage.files[0]);
            reader.onload = async function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('h-0');
            };
        });
    </script>
</x-dashboard>
