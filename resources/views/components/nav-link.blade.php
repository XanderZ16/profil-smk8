@props(['href', 'active' => false, 'active_class' => ''])

@php
    $classes = $active ? $active_class : '';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
