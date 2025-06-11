<div {{ $attributes->merge([
    'class' =>
        'divider' .
        (isset($variant) ? " divider-{$variant}" : '') .
        (isset($direction) ? " divider-{$direction}" : '') .
        (isset($align) ? " divider-{$align}" : ''),
]) }}
    {{ $attributes }}>
    {{ $slot }}
</div>
