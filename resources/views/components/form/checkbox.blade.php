@props(['label' , 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'name' => $name,
        'id' => $name,
        'value' => old($name)
    ];
@endphp

<x-form.field :$label :$name>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
        <input {{$attributes($defaults)}}>
        <span class="pl-1">{{$label}}</span>
    </div>
</x-form.field>
