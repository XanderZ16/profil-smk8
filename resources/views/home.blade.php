@extends('layouts.app')

@section('title', 'SMK Negeri 8 Batam - Sekolah Kesehatan Negeri Pertama di Batam')

@section('content')
    @include('partials.header')

    <div class="pb-8">
        <div class="h-[70vh] md:h-[75vh] lg:h-[95vh] xl:h-screen relative flex items-center">
            <img src="{{ asset('images/home.jpg') }}" alt="smk8"
                class="absolute top-0 left-0 object-cover w-screen h-full brightness-50">
            <div class="relative flex items-center justify-between px-3 md:px-6 lg:px-12">
                <div>
                    <p class="text-xl font-semibold text-center uppercase text-neutral md:text-start">Selamat Datang Di</p>
                    <h1 class="mt-6 text-4xl font-semibold text-center uppercase text-primary md:text-start">SMK Negeri 8 Batam</h1>
                    <a href="#welcome"
                        class="relative mx-auto md:mx-0 flex w-fit mt-8 items-center px-7 py-0.5 overflow-hidden text-lg font-medium border-2 rounded-full group border-neutral text-neutral hover:bg-gray-50 hover:text-white">
                        <span
                            class="absolute left-0 block w-full h-0 transition-all opacity-100 duration-400 ease top-1/2 bg-secondary group-hover:top-0 group-hover:h-full"></span>
                        <span
                            class="absolute right-0 flex items-center justify-start w-10 h-10 duration-500 transform translate-x-full ease group-hover:translate-x-2 group-hover:*:text-black">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                        <span
                            class="relative duration-700 transform group-hover:-translate-x-[10px] group-hover:text-black">Jelajahi</span>
                    </a>
                </div>

                <div
                    class="relative hidden w-5/12 grid-cols-2 grid-rows-2 gap-1 overflow-hidden rounded-md cursor-pointer md:grid group">
                    <a href="{{ route('galleries') }}"
                        class="absolute inset-0 flex items-center justify-center text-2xl duration-200 opacity-0 group-hover:underline group-hover:opacity-100 font-semiold size-full bg-black/50 text-neutral">
                        Lebih banyak
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="duration-300 group-hover:translate-x-2 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="duration-300 -translate-x-4 size-6 group-hover:-translate-x-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                    @foreach ($galleries as $gallery)
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                            class="object-cover size-full {{ $loop->index == 0 ? 'row-span-2' : '' }}">
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center gap-4 py-4 text-center bg-[#54C392] *:font-bold">
            <div class="relative w-4/5 py-4 rounded-md shadow-lg bg-secondary">
                <div class="absolute bottom-0 overflow-hidden max-h-24 -left-4">
                    <iframe src="https://lottie.host/embed/6b5c134f-75bb-4e56-aa2e-fabd0673edd4/ZPnGBbVt0O.json"
                        class="-translate-x-8 -translate-y-3 size-36"></iframe>
                </div>
                <span class="text-xl">77</span>
                <h3>Guru & Tenaga Kependidikan</h3>
            </div>
            <div class="relative w-4/5 py-4 rounded-md shadow-lg bg-secondary">
                <div class="absolute bottom-0 overflow-hidden max-h-24 -left-4">
                    <iframe src="https://lottie.host/embed/3489c8af-b038-457c-b181-b80d83c4ff7c/5nQ4f5bdbe.json"
                        class="size-[72px]"></iframe>
                </div>
                <span class="text-xl">18</span>
                <h3>Kelas</h3>
            </div>
            <div class="relative w-4/5 py-4 rounded-md shadow-lg bg-secondary">
                <div class="absolute bottom-0 overflow-hidden max-h-24 -left-4">
                    <iframe src="https://lottie.host/embed/e83df13e-711d-491a-a163-c6f806c4d862/KpOSH931vc.json"
                        class="-translate-x-4 -translate-y-3 size-28"></iframe>
                </div>
                <span class="text-xl">1229</span>
                <h3>Peserta Didik</h3>
            </div>
        </div>

        <div id="welcome" class="flex flex-col max-w-screen-sm gap-4 py-4 mx-auto text-center md:max-w-screen-lg">
            <h2 class="py-3 text-xl font-bold uppercase">Kata Sambutan</h2>
            <div class="w-full px-6">
                <img src="/images/kepsek.jpeg" alt="Kepala Sekolah" class="w-full rounded-md sm:hidden">
            </div>
            <div class="flex flex-col items-center">
                <h2 class="text-lg font-bold uppercase">Kepala SMK Negeri 8 Batam</h2>
                <h2 class="text-lg font-bold uppercase">Baharuddin Sitepu, M.Pd. T</h2>
            </div>
            <div class="flex flex-col gap-4 px-6 text-start">
                <p class="">
                    Assalamualaikum Wr.Wb.
                </p>
                <p class="">
                    <img src="/images/kepsek.jpeg" alt="Kepala Sekolah"
                        class="hidden float-right w-3/5 ml-3 rounded-md sm:block">
                    Puji syukur kepada Allah SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan karuniaNya sehingga
                    website SMK Negeri 8 Batam ini dapat kami perbaharui. Website ini dibuat dengan tujuan untuk mempermudah
                    mendapatkan informasi seputaran kegiatan di SMK Negeri 8 Batam yang ditujukan untuk seluruh unsur
                    pimpinan, guru, karyawan dan siswa serta khalayak umum.
                </p>
                <p class="">
                    SMK Negeri 8 Batam adalah SMK yang dirancang untuk menyiapkan tenaga kerja tingkat menengah khusus di
                    Bidang Kesehatan yang mana pada awal berdiri Tahun Pelajaran 2017/2018 dengan satu Program Keahlian
                    Farmasi Klinis dan Komunitas.
                </p>
                <p>
                    Sesuai dengan perkembangan dan permintaan Dunia Usaha dan Dunia Industri yang bergerak di Bidang
                    Kesehatan serta Masyarakat, maka saat ini SMK Negeri 8 Batam mempunyai 6 (Enam) program keahlian, yakni
                </p>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-2 lg:grid-cols-3">
                    <x-major-card href="{{ route('majors.ak') }}" major="ak">
                        1. Asisten Keperawatan (AK)
                    </x-major-card>
                    <x-major-card href="{{ route('majors.fkk') }}" major="fkk">
                        2. Farmasi Klinis dan Komunitas (FKK)
                    </x-major-card>
                    <x-major-card href="{{ route('majors.im') }}" major="im">
                        3. Intrumentasi Medik (IM)
                    </x-major-card>
                    <x-major-card href="{{ route('majors.tlm') }}" major="tlm">
                        4. Teknologi Laboratorium Medik (TLM)
                    </x-major-card>
                    <x-major-card href="{{ route('majors.tkj') }}" major="tkj">
                        5. Teknik Komputer Jaringan (TKJ)
                    </x-major-card>
                    <x-major-card href="{{ route('majors.ps') }}" major="ps">
                        6. Pekerjaan Sosial (PS)
                    </x-major-card>
                </div>
                <p>
                    Pada kesempatan ini, kami juga menyampaikan ucapan terimakasih yang tak terhingga kepada Gubernur
                    Kepulauan Riau, Bapak H. Ansar Ahmad, S.E., MM serta Kepala Dinas Pendidikan Provinsi Kepri, Dr. Andi
                    Agung, S.E., M.M. beserta jajaran dilingkungan Dinas Pendidikan atas support dan dukungannya untuk
                    perkembangan sekolah ini.
                </p>
                <p>
                    Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan
                    dengan pendidikan, ilmu pengetahuan dan informasi seputar SMK Negeri 8 Batam.
                </p>


                Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan
                meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya.
                Terima kasih atas kerjasamanya, maju terus untuk mencapai SMK Negeri 8 Batam yang lebih baik lagi.

                Wassalamu'alaikum wr.wb
                Hormat kami,
                Kepala SMK Negeri 8 Batam
            </div>
        </div>

        <div class="flex flex-col items-center max-w-screen-sm px-4 mx-auto">
            <h2 class="text-2xl font-semibold">Video Profil</h2>
            <hr class="w-full my-2 border border-black">
            {{-- VIDEO PROFIL SEKOLAH --}}
            <div class="w-full overflow-hidden rounded-xl">
                <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/oBOtbQLOiMs?si=Tejuy1T--E5aJ3VO"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <div class="w-full max-w-screen-lg mx-auto mt-6">
            <h2 class="flex items-center gap-2 text-2xl font-semibold text-center">
                <span class="flex-1 border border-gray-500"></span>
                Berita Terbaru
                <span class="flex-1 border border-gray-500"></span>
            </h2>
            <div class="grid grid-cols-1 gap-4 px-4 mt-4 md:grid-cols-2">
                @forelse ($latestNews as $news)
                    <x-news-card :item="$news" href="{{ route('news.show', $news->title) }}" />
                @empty
                    <div class="col-span-3 py-6 text-center">Tidak ada data</div>
                @endforelse
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
