<x-main title="Tenaga Pendidik">
    <div class="max-w-screen-lg px-4 my-8">
        @if (!request()->get('search'))
            <h1 class="text-3xl font-semibold text-center">Tenaga Pendidik</h1>
            @foreach ($roles as $role)
                <div class="mt-4 mb-6">
                    <h2 class="mb-3 text-2xl font-semibold">{{ $role->name }}</h2>
                    <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @forelse ($role->teachers as $teacher)
                            <div class="aspect-square">
                                <img src="{{ asset('storage/' . $teacher->profile) }}" alt="{{ $teacher->name }}"
                                    class="object-cover rounded-md size-full">
                                <h3 class="mt-2 text-lg font-semibold">{{ $teacher->name }}</h3>
                                <p class="font-light leading-none text-slate-700">Guru jurusan asisten keperawatan</p>
                            </div>
                        @empty
                            <div class="py-6">
                                Tidak ada data
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="text-3xl font-semibold text-center">Pencarian: {{ request()->get('search') }}</h1>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse ($teachers as $teacher)
                    <div class="aspect-square">
                        <img src="{{ asset('storage/' . $teacher->profile) }}" alt="{{ $teacher->name }}"
                            class="object-cover rounded-md size-full">
                        <h3 class="mt-2 text-lg font-semibold">{{ $teacher->name }}</h3>
                        <p class="font-light leading-none text-slate-700">Guru jurusan asisten keperawatan</p>
                    </div>
                @empty
                    <div class="py-6">
                        Tidak ada data
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</x-main>
