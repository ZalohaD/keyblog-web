<form {{$attributes->merge(['class' => 'max-w-2xl mx-auto space-y-6', 'method' => 'GET'])}}>
    @csrf
    @method($attributes->get('method'))

    {{$slot}}
</form>
