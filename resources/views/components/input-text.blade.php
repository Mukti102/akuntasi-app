@props([
    'label' => 'Label',
    'type' => 'text',
    'name' => 'name',
    'value' => '',
    'placeholder' => 'Enter text here'
])

<div class="my-2">
    <label  for="{{ $name }}" class="block text-sm font-semibold text-gray-600 mb-3">
        {{ $label }}
    </label>
    <input
        {{ $attributes }}
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        class="futuristic-input w-full px-4 py-3 text-gray-700 border border-1 border-gray-300 rounded-xl transition-all"
    />
</div>
