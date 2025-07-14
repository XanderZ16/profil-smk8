<form id="form" class="flex justify-between bg-neutral md:justify-end" method="GET">
    <select onchange="updateFormAction()" class="px-2 rounded-bl-md">
        <option value="news" @if(request()->routeIs('news*')) selected @endif>Berita</option>
        <option value="activities" @if(request()->routeIs('activities*')) selected @endif>Kegiatan</option>
        <option value="galleries" @if(request()->routeIs('galleries*')) selected @endif>Galeri</option>
        <option value="videos" @if(request()->routeIs('videos*')) selected @endif>Video</option>
        <option value="teachers" @if(request()->routeIs('teachers*')) selected @endif>Guru</option>
    </select>
    <input name="search" type="text" placeholder="Cari..." value="{{ request()->get('search') }}" class="w-full px-2 py-1 outline-none" />
    <button type="submit" hidden></button>
</form>

<script>
    function updateFormAction() {
        var form = document.getElementById('form');
        var select = form.querySelector('select');
        var selectedValue = select.value;
        console.log(selectedValue);
        // Tentukan action berdasarkan nilai yang dipilih
        if (selectedValue === 'news') {
            form.action = '/berita'; // Ganti dengan route yang sesuai
        } else if (selectedValue === 'activities') {
            form.action = '/kegiatan';
        } else if (selectedValue === 'videos') {
            form.action = '/video';
        } else if (selectedValue === 'galleries') {
            form.action = '/galeri';
        } else if (selectedValue === 'teachers') {
            form.action = '/guru';
        }
    }

    // Inisialisasi form action berdasarkan nilai awal yang terpilih
    document.addEventListener('DOMContentLoaded', function() {
        updateFormAction();
    });
</script>
