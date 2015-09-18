@if($data)
    @foreach($data as $k=>$v)
        {!! $v->text !!}
    @endforeach
@endif