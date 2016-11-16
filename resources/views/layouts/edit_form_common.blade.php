{{-- 修改操作验证字段唯一性需要id --}}
<input type="hidden" name="request_validate_id" value="{{$request_id}}">

{{csrf_field()}} {{--csrf_token--}}
{{method_field('put')}} {{--put请求--}}