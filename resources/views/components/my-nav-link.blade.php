{{-- class="block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" --}}

@props(['href', 'current' => false])

@php
    $classes = $current ? 'bg-gray-900  text-white' : 'text-gray-300 hover:bg-gray-700
    hover:text-white';
@endphp

<a href="{{ $href }}" 
{{ $attributes->merge(['class' => 'rounded-md px-3 py-2 text-sm font-medium ' . $classes]) }}>
    {{ $slot }}
</a>
