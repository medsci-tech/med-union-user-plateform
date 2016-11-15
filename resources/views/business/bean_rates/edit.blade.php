@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('bean_rates.show',['id' => $bean_rate->id]),
        'name' => $bean_rate->name,
    ],
])

@section('content')
    <form class="" role="form" action="{{route('bean_rates.update', ['id' => $bean_rate->id])}}" method="POST">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <label for="name">规则名称</label>
            <input id="name" value="{{$bean_rate->name}}" type="text" placeholder="规则的中文名称，请保证对于已有记录是唯一的" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="name_en">规则英文名称</label>
            <input id="name_en" value="{{$bean_rate->name_en}}" type="text" placeholder="规则的英文名称" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="project_id">所属应用</label>
            <input id="project_id" value="{{$bean_rate->project->name}}" type="text" placeholder="规则的英文名称" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="name_en">规则类型</label>
            <input id="name_en" value="{{$bean_rate->bean_rate_type->name}}" type="text" placeholder="规则类型" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="rate">兑换比率</label>
            <input id="rate" name="rate" value="{{$bean_rate->rate}}" type="text" placeholder="数字类型" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection