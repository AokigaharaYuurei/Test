@props(['disabled' => false])

<input 
x-date
x-mask="+7(999)999-99-99"
type=tel
@disabled($disabled)
{{ $attributes->merge(['class'=>'border-grey-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'])}}>
