<x-main title="Data Pokok">
    <h1 class="mt-8 text-2xl font-semibold text-center">Data Pokok Sekolah SMKN 8 Batam</h1>

    {{-- DATA SEKOLAH --}}
    <div x-data="{ open: 'identitas' }" class="w-full max-w-screen-md p-4 my-4 rounded-md bg-secondary">
        <div class="flex gap-1 font-semibold">
            <div x-on:click="open = 'identitas'" class="text-center duration-300 rounded-md cursor-pointer py-0.5 px-1" :class="open === 'identitas' ? 'bg-primary/80 text-neutral hover:bg-primary' : 'hover:text-primary'">Identitas Sekolah</div>
            <div x-on:click="open = 'dokumen'" class="text-center duration-300 rounded-md cursor-pointer py-0.5 px-1" :class="open === 'dokumen' ? 'bg-primary/80 text-neutral hover:bg-primary' : 'hover:text-primary'">Dokumen & Perizinan</div>
            <div x-on:click="open = 'sarpras'" class="text-center duration-300 rounded-md cursor-pointer py-0.5 px-1" :class="open === 'sarpras' ? 'bg-primary/80 text-neutral hover:bg-primary' : 'hover:text-primary'">Data Sar & Pras</div>
        </div>

        <hr class="my-3 border-black">

        {{-- IDENTITAS SEKOLAH --}}
        <div x-show="open === 'identitas'" x-transition.duration.300 class="space-y-3">
            <p><span class="font-bold">Nama : </span>
                SMK NEGERI 8 BATAM
            </p>
            <p><span class="font-bold">NPSN : </span>
                69974383
            </p>
            <p><span class="font-bold">Alamat : </span>
                Kav. Bukit Melati - Sei Pelunggut
            </p>
            <p><span class="font-bold">Desa/Kelurahan : </span>
                SEI PELUNGGUT
            </p>
            <p><span class="font-bold">Kecamatan : </span>
                KEC. SAGULUNG
            </p>
            <p><span class="font-bold">Kabupaten/Kota : </span>
                KOTA BATAM
            </p>
            <p><span class="font-bold">Provinsi : </span>
                PROVINSI KEPULAUAN RIAU
            </p>
            <p><span class="font-bold">Status Sekolah : </span>
                NEGERI
            </p>
            <p><span class="font-bold">Bentuk Pendidikan : </span>
                SMK
            </p>
            <p><span class="font-bold">Jenjang Pendidikan : </span>
                DIKMEN
            </p>
        </div>

        {{-- DOKUMEN & PERIZINAN --}}
        <div x-cloak x-show="open === 'dokumen'" x-transition.duration.300 class="space-y-3">
            <p><span class="font-bold">Kementerian Pembina : </span>
                Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi
            </p>
            <p><span class="font-bold">Naungan : </span>
                Pemerintah Daerah
            </p>
            <p><span class="font-bold">No. SK. Pendirian : </span>
                501 Tahun 2017
            </p>
            <p><span class="font-bold">Tanggal SK. Pendirian : </span>
                02-05-2017
            </p>
            <p><span class="font-bold">Nomor SK Operasional : </span>
                501 Tahun 2017
            </p>
            <p><span class="font-bold">Tanggal SK Operasional : </span>
                02-05-2017
            </p>
            <p><span class="font-bold">File SK Operasiona : </span>
                <a target="_blank" href="https://vervalsp.data.kemdikbud.go.id/verval/dokumen/skoperasional/117464-493492-160297-53349738-1933707798.pdf" class="text-accent hover:underline">
                    Lihat SK Operasional
                </a>
            </p>
            <p><span class="font-bold">Tanggal Upload SK Op : </span>
                2018-03-20 00:11:35.010
            </p>
            <p><span class="font-bold">Akreditasi : </span>
                B
            </p>
        </div>

        {{-- SARANA & PRASARANA --}}
        <div x-cloak x-show="open === 'sarpras'" x-transition.duration.300 class="flex flex-col justify-between md:flex-row">
            <table class="overflow-hidden rounded-md">
                <thead>
                    <tr class="*:px-4 *:py-2 *:text-start bg-slate-200">
                        <th>Jenis SarPras</th>
                        <th>Jumlah SarPras</th>
                    </tr>
                </thead>
                <tbody class="*:*:py-1.5 *:*:px-4">
                    <tr>
                        <td>Ruang Kelas</td>
                        <td>8 Ruang</td>
                    </tr>
                    <tr class="bg-slate-200">
                        <td>Ruang Perpustakaan</td>
                        <td>1 Ruang</td>
                    </tr>
                    <tr>
                        <td>Ruang Laboratorium</td>
                        <td>3 Ruang</td>
                    </tr>
                    <tr class="bg-slate-200">
                        <td>Ruang Pimpinan</td>
                        <td>1 Ruang</td>
                    </tr>
                    <tr>
                        <td>Ruang Guru</td>
                        <td>1 Ruang</td>
                    </tr>
                    <tr class="bg-slate-200">
                        <td>Ruang Toilet</td>
                        <td>4 Ruang</td>
                    </tr>
                    <tr>
                        <td>Ruang Bangunan</td>
                        <td>7 Ruang</td>
                    </tr>
                </tbody>
            </table>

            <hr class="my-3 border-black md:hidden">

            <table class="overflow-hidden rounded-md">
                <thead>
                    <tr class="*:px-4 *:py-2 *:text-start bg-slate-200">
                        <th>Jenis SarPras</th>
                        <th>Jumlah SarPras</th>
                    </tr>
                </thead>
                <tbody class="*:*:py-1.5 *:*:px-4">
                    <tr>
                        <td>Luas Tanah</td>
                        <td>9.153 m2</td>
                    </tr>
                    <tr class="bg-slate-200">
                        <td>Akses Internet</td>
                        <td>2. 150 Mb</td>
                    </tr>
                    <tr>
                        <td>Sumber Listrik</td>
                        <td>PLN</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-main>
