@props(['disabled' => false])

<input
    x-data
    x-mask="+7(999)999-99-99"
    type="tel"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}
/>