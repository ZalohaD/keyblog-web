@props(['publisher' => null, 'width' => 90])

@if($publisher && $publisher->logo)
    <img src="{{ asset('storage/' . $publisher->logo) }}" alt="{{ $publisher->name }}" class="rounded-xl" width="{{ $width }}" height="{{ $width }}">
@else
    <img src="http://picsum.photos/seed/{{rand(10, 10000)}}/{{$width}}" alt="Publisher logo" class="rounded-xl">
@endif
