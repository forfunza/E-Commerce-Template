@if($services)
<div class="all-service">
    <ul>
        @foreach ($services as $tmp)
        <li class="{{ Request::segment(2) == $tmp->id ? 'active' : '' }}"><a href="{{ action('HomeController@service_detail',$tmp->id) }}" >{{ str_limit($tmp->name, $limit = 15, $end = '') }}</a></li>
        @endforeach
    </ul>
</div>
@endif
