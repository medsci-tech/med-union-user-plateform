@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('applications.show',['id' => $application->id]),
        'name' => $application->name,
    ],
])

@section('content')
    <form role="form" action="{{route('applications.update', ['id' => $application->id])}}" method="POST" id="form-validate">
        @include('layouts.edit_form_common', ['request_id' => $application->id])
        <div class="form-group">
            <label for="name">应用名称</label>
            <input id="name" name="name" value="{{$application->name}}" type="text" placeholder="应用的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name_en">应用英文名称</label>
            <input id="name_en" name="name_en" value="{{$application->name_en}}" type="text" placeholder="应用的英文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="enterprise_id">所属企业</label>
            <select class="form-control enterprises-select2" id="enterprise_id" name="enterprise_id" required>
                <option></option>
                @foreach($enterprises as $enterprise)
                    <option value="{{$enterprise->id}}"
                    @if($enterprise->id == $application->enterprise_id)
                        selected
                    @endif
                    >{{$enterprise->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" value="{{$application->description}}" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection