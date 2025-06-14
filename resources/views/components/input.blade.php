@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
    'description' => '',
    'variant' => '',
    'size' => '',
    'errors' => [],
])

@if (!empty($label) || !empty($legend))
    <fieldset class="fieldset">
@endif

@if (!empty($label))
    <legend class="fieldset-legend {{ !empty($errors) && $errors->has($name) ? ' text-error' : '' }}">
        {{ $label }}</legend>
@endif

<input type="{{ $type }}" name="{{ $name }}"
    {{ $attributes->merge([
        'class' =>
            'input w-full' .
            (!empty($variant) ? " input-{$variant}" : '') .
            (!empty($size) ? " input-{$size}" : '') .
            (!empty($errors) && $errors->has($name) ? ' input-error' : ''),
    ]) }}
    {{ $attributes }} />

@if (!empty($description))
    <p class="fieldset-label">{{ $description }}</p>
@endif

@if (!empty($errors) && $errors->has($name))
    <span class="fieldset-label text-error">
        <ul class="list-disc list-inside">
            @foreach ($errors->get($name) as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </span>
@endif

@if (!empty($label) || !empty($legend))
    </fieldset>
@endif
