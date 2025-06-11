@props([
    'variant' => '',
    'type' => 'button',
])

<button {{ $attributes->merge(['class' => 'btn' . (empty($variant) ? '' : ' btn-' . $variant)]) }} {{ $attributes }}
    type={{ $type }}>
    {{ $slot }}
</button>
