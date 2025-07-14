<x-dashboard title="Tambah Video">
    <form action="{{ route('videos.store') }}" method="POST" class="p-4 m-4 rounded-lg shadow-xl bg-secondary"
        enctype="multipart/form-data">
        @csrf

        <div>
            <label for="url"
                class="block mb-2 text-sm font-medium text-gray-900 @error('url') text-red-500 @enderror">
                Url
            </label>
            <input type="text" name="url" id="url" onkeyup="preview_video()"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukkan Url Video" required value="{{ old('url') }}">
            @error('url')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
            <iframe id="video-preview"
                class="w-full h-0 mt-2 overflow-hidden duration-1000 rounded-lg shadow-lg md:w-1/2 lg:w-1/3 aspect-video"></iframe>
        </div>

        <div class="mt-4">
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
            <label for="category" class="block mb-2">{{ __('Kategori') }}</label>
            <select name="category" id="category"
                class="bg-gray-50 border w-fit border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                <option value="normal">Reguler</option>
                <option value="ak">Asisten Keperawatan</option>
                <option value="fkk">Farmasi Klinis & Komunitas</option>
                <option value="im">Instrumentasi Medik</option>
                <option value="tlm">Teknologi Laboratorium Medik</option>
                <option value="tkj">Teknik Komputer Jaringan</option>
                <option value="ps">Pekerjaan Sosial</option>
            </select>
        </div>

        <button class="mt-4 py-1.5 px-4 bg-primary rounded-md hover:bg-primary/90 text-white">
            {{ __('Tambah') }}
        </button>
    </form>

    <script>
        async function preview_video() {
            const input_video = document.getElementById('url'); // Mendapatkan elemen input dengan ID 'url'
            const video_preview = document.getElementById(
                'video-preview'); // Mendapatkan elemen video dengan ID 'video-preview'

            const embedUrl = await getYouTubeEmbedUrl(input_video.value)
            if (embedUrl) {
                video_preview.setAttribute('src', embedUrl); // Set src video dengan embed URL
                video_preview.classList.remove('h-0'); // Menghapus kelas 'h-0' dari elemen video
            } else {
                video_preview.classList.add('h-0');
            }
        }

        async function getYouTubeEmbedUrl(url) {
            try {
                // Parse URL menggunakan URL API
                let parsedUrl = new URL(url);

                // Periksa domain
                if (parsedUrl.hostname.includes('youtube.com')) {
                    // Untuk URL YouTube Live
                    if (parsedUrl.pathname.includes('/live/')) {
                        // Ambil video ID dari path
                        videoId = parsedUrl.pathname.replace('/live/', '').replace('/', '');
                    }

                    // Untuk format URL normal
                    let params = new URLSearchParams(parsedUrl.search);
                    if (params.has('v')) {
                        videoId = params.get('v');
                    }
                }

                // Untuk URL short YouTube (youtu.be)
                if (parsedUrl.hostname.includes('youtu.be')) {
                    videoId = parsedUrl.pathname.replace('/', '');
                }

                if (await checkYouTubeVideoExists(videoId)) {
                    return `https://www.youtube.com/embed/${videoId}`;
                }
                return null;
            } catch (error) {
                console.error('Error parsing URL');
                return null;
            }
        }

        async function checkYouTubeVideoExists(videoId) {
            // Ganti dengan API Key YouTube Anda
            const apiKey = 'AIzaSyA9uTiBz-CF2_Ts5TQuJKorDbhg6xnDYrI'; // Ganti dengan API key Anda
            const apiUrl = `https://www.googleapis.com/youtube/v3/videos?part=snippet&id=${videoId}&key=${apiKey}`;

            try {
                // Melakukan permintaan ke YouTube Data API
                const response = await fetch(apiUrl);
                const data = await response.json();

                if (data.items && data.items.length > 0) {
                    const videoTitle = data.items[0].snippet.title;
                    const input_title = document.getElementById('title');
                    input_title.value = videoTitle;
                    return true; // Video ditemukan
                } else {
                    console.log("Video tidak ditemukan.");
                    return false; // Video tidak ditemukan
                }
            } catch (error) {
                console.error("Terjadi kesalahan");
                return false; // Mengembalikan false jika terjadi error
            }
        }
    </script>
</x-dashboard>
