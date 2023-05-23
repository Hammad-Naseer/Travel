@if(count($cities)> 0)
@foreach($cities as $city)
<option value="{{$city->city_id}}">
    {{$city->city_title}}
</option>

@endforeach
@endif