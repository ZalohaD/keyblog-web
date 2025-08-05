@props(['name', 'label'])

<div>
    @if($label)
        <x-form.label :$name :$label />
    @endif

    <div class="mt-1">
        {{$slot}}

        <x-form.error :error="$errors->first($name)" />
    </div>
</div>
