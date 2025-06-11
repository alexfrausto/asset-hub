@props([
    'size' => 'base',
    'level',
    'type',
])

@php
    $tag = isset($level) ? 'h' . $level : 'div';
    $font_weight = isset($type) && $type == 'sub' ? 'font-bold' : ' font-black';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => "text-{$size} text-base-content{$font_weight}"]) }}
    {{ $attributes }}>
    {{ $slot }}
    </{{ $tag }}>
