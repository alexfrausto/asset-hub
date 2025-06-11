@props([
    'variant' => '',
    'href' => '#',
])


<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'link' . (empty($variant) ? '' : ' link-' . $variant)]) }} {{ $attributes }}>
    {{ $slot }}
</a>
