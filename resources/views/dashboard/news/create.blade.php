<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<x-dashboard title="Tambah Berita">
    <form action="{{ route('news.store') }}" method="POST" class="p-4 m-4 rounded-lg shadow-xl bg-secondary"
        enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title"
                class="block mb-2 text-sm font-medium text-gray-900 @error('title') text-red-500 @enderror">
                Judul
            </label>
            <input type="text" name="title" id="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Judul" required value="{{ old('title') }}">
            @error('title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="image"
                class="block mb-2 text-sm font-medium text-gray-900 @error('image') text-red-500 @enderror">
                Gambar
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
                    <img id="image-preview" alt="image preview" class="object-cover h-0 duration-300 rounded-md size-32">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="content"></label>
            <input id="content" value="{{ old('content') }}" type="hidden" name="content">
            <trix-editor input="content" required></trix-editor>
        </div>

        <div class="mt-4">
            <label for="category" class="block mb-2">{{ __('Kategori') }}</label>
            <select name="category" id="category"
                class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                <option value="news">Berita</option>
                <option value="activity">Kegiatan</option>
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
