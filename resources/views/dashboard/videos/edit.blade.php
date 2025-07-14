<x-dashboard title="Edits Video">
    <form action="{{ route('news.store') }}" method="POST" class="p-4 m-4 rounded-lg shadow-xl bg-secondary" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title"
                class="block mb-2 text-sm font-medium text-gray-900 @error('title') text-red-500 @enderror">
                Judul
            </label>
            <input type="text" name="title" id="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Judul" required value="{{ old('title', $video->title) }}">
            @error('title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="url"
                class="block mb-2 text-sm font-medium text-gray-900 @error('url') text-red-500 @enderror">
                Url
            </label>
            <input type="text" name="url" id="url"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Url Video" required value="{{ old('url', $video->url) }}">
            @error('url')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="category" class="block mb-2">{{ __('Kategori') }}</label>
            <select name="category" id="category" class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                <option value="news">Berita</option>
                <option value="event">Kegiatan</option>
            </select>
        </div>

        <button class="mt-4 py-1.5 px-4 bg-primary rounded-md hover:bg-primary/90 text-white">
            {{ __('Tambah') }}
        </button>
    </form>

    <script>
        const input_image = $('#image');
        const image_preview = $('#image-preview');
        input_image.on('change', function() {
            const reader = new FileReader();
            reader.readAsDataURL(input_image[0].files[0]);
            reader.onload = (e) => {
                image_preview.attr('src', e.target.result);
            }

            null_label.hide();
            preview_label.removeClass('hidden').addClass('block');
        });
    </script>
</x-dashboard>
