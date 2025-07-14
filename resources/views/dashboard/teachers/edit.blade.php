<x-dashboard title="Edit Guru">
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="p-4 m-4 rounded-lg shadow-xl bg-secondary"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name"
                class="block mb-2 text-sm font-medium text-gray-900 @error('name') text-red-500 @enderror">
                Nama Guru
            </label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Nama Guru" required value="{{ old('name', $teacher->name) }}">
            @error('name')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
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
                    <img id="image-preview" alt="image preview" src="{{ asset('storage/' . $teacher->profile) }}"
                        class="object-cover duration-300 rounded-md size-32">
                </div>
            </div>
        </div>

        <div>
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
</x-dashboard>
