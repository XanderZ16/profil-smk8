<div class="w-[95%] lg:w-2/3 xl:w-1/2 mx-auto pt-4">
    <div x-data="{ open: false, valid: false }">
        <div x-on:click="open = true"
            class="cursor-pointer py-1.5 px-4 font-semibold text-white bg-primary rounded-md w-fit hover:bg-primary/90 active:bg-primary/90">
            Tambah Role
        </div>
        <form x-cloak x-transition.duration.300 x-show="open" wire:submit.prevent="store" class="flex gap-2 mt-2">
            <div>
                <input type="text" x-on:input="valid = $event.target.value.length > 0" wire:model="role" required
                    class="px-2 rounded-md py-1.5">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-2 duration-300">
                <div x-on:click="open = false"
                    class="text-red-500 cursor-pointer hover:text-red-600 active:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
                <button x-on:click="open = !valid"
                    class="text-green-500 cursor-pointer hover:text-green-600 active:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <table class="w-full mt-2 rounded-lg shadow-xl bg-secondary">
        <thead>
            <tr>
                <th class="w-[5%] p-2">No</th>
                <th class="p-2">Role</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $key=>$role)
                <tr x-data="{ open: false }" class="*:p-1 bg-slate-100">
                    <td class="text-center border-r">{{ $loop->iteration }}</td>
                    <td>
                        <form wire:submit.prevent="update({{ $key }})" x-on:submit="open = false" class="flex items-center gap-2">
                            <input type="text" wire:model="roles.{{ $key }}.name"
                                class="w-full px-3 py-1.5 rounded-md" :disabled="!open" :autofocus="open">
                            <button x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="text-green-500 cursor-pointer hover:text-green-600 active:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td class="">
                        <div class="flex items-center justify-around gap-2">
                            {{-- EDIT --}}
                            <div x-on:click="open = true" x-show="!open"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100" class="cursor-pointer text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </div>

                            <div x-cloak x-on:click="open = false; $wire.resetRole({{ $key }})" x-show="open"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="text-red-500 cursor-pointer hover:text-red-600 active:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>

                            {{-- DELETE --}}
                            <x-alert message="Anda yakin ingin menghapus role {{ $role['name'] }}?">
                                <span class="text-red-500 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </span>
                                <x-slot name="action">
                                    <form x-on:click="open = false" wire:submit.prevent="destroy({{ $role['id'] }})">
                                        <button
                                            class="font-semibold duration-300 border-red-500 text-white py-1.5 px-4 hover:bg-red-600 bg-red-500 rounded-lg active:bg-red-700 cursor-pointer">
                                            {{ __('Hapus') }}
                                        </button>
                                    </form>
                                </x-slot>
                            </x-alert>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="*:px-2 *:py-8 bg-slate-100">
                    <td colspan="3" class="text-center">Tidak ada Role</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
