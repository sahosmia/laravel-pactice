@props([
'type' => 'text',
'name',
'label' => null,
'value' => null,
'options' => [],
'placeholder' => null,
'required' => false,

// Class props
'wrapperClass' => 'mb-4',
'labelClass' => 'block mb-1 text-sm font-medium text-gray-700',
'inputClass' => '',
'errorClass' => 'mt-1 text-sm text-red-600',
])

@php
$id = $attributes->get('id', $name);
$inputValue = old($name, $value);
$placeholderText = $placeholder ?: ($label ? 'Enter ' . strtolower($label) : '');

$baseInputClass = 'w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500';
@endphp

<div class="{{ $wrapperClass }}">
    {{-- Label --}}
    @if($label && $type !== 'checkbox')
    <label for="{{ $id }}" class="{{ $labelClass }}">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif

    {{-- TEXT | NUMBER | EMAIL | PASSWORD --}}
    @if(in_array($type, ['text', 'number', 'email', 'password']))
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $inputValue }}"
        placeholder="{{ $placeholderText }}" {{ $required ? 'required' : '' }} {{ $attributes->merge([
    'class' => trim($baseInputClass . ' ' . $inputClass)
    ]) }}
    />

    {{-- SELECT --}}
    @elseif($type === 'select')
    <select name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }} {{ $attributes->merge([
        'class' => trim($baseInputClass . ' ' . $inputClass)
        ]) }}
        >
        <option value="">
            {{ $placeholderText ?: 'Select ' . strtolower($label) }}
        </option>

        @foreach($options as $key => $option)
        <option value="{{ $key }}" {{ (string)$key===(string)$inputValue ? 'selected' : '' }}>
            {{ $option }}
        </option>
        @endforeach
    </select>

    {{-- RADIO --}}
    @elseif($type === 'radio')
    <div class="flex gap-4 {{ $inputClass }}">
        @foreach($options as $key => $option)
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="{{ $name }}" value="{{ $key }}" {{ (string)$key===(string)$inputValue ? 'checked'
                : '' }} class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
            <span class="text-sm text-gray-700">{{ $option }}</span>
        </label>
        @endforeach
    </div>

    {{-- CHECKBOX --}}
    @elseif($type === 'checkbox')
    <label class="flex items-center gap-2 cursor-pointer {{ $inputClass }}">
        <input type="checkbox" name="{{ $name }}" value="1" {{ $inputValue ? 'checked' : '' }}
            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        <span class="text-sm text-gray-700">
            {{ $label }}
            @if($required)
            <span class="text-red-500">*</span>
            @endif
        </span>
    </label>
    @endif

    {{-- Error --}}
    @error($name)
    <p class="{{ $errorClass }}">{{ $message }}</p>
    @enderror
</div>
