<a href="{{ route('home') }}" class="flex items-center gap-2">
    <img src="{{ asset('icons/smk8.png') }}" class="size-12">
    <span class="text-xl font-roboto duration-300 {{ request()->routeIs('home') ? 'text-white' : '' }}" id="company">SMKN 8 Batam</span>
</a>
