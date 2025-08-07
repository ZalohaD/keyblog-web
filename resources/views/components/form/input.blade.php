@props(['label', 'name', 'as' => 'input'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name)
    ]
@endphp

<x-form.field :$label :$name>
    <{{$as}} {{$attributes($defaults)}}> @if($as === 'textarea')</{{$as}}> @endif
</x-form.field>
