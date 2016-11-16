@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('enterprises.show',['id' => $enterprise->id]),
        'name' => $enterprise->name,
    ],
])

@section('content')
    <form role="form" action="{{route('enterprises.update',['id' => $enterprise->id])}}" method="post" id="form-validate">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <label for="name">企业名称</label>
            <input id="name" name="name" value="{{$enterprise->name}}" type="text" placeholder="企业的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name_en">企业名称英文</label>
            <input id="name_en" name="name_en" value="{{$enterprise->name_en}}" type="text" placeholder="企业的英文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" value="{{$enterprise->description}}" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection
