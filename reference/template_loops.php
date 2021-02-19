
@foreach($recipe_item as $key => $value)
    <p>{{$key}} => {{$value}}</p>
@endforeach

@foreach($recipe_item as $key => $value)
        @if($value)
            <p>{{$key}} => {{$value}}</p>
        @endif
    @endforeach