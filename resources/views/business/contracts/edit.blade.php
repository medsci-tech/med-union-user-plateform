@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('contracts.show',['id' => $contract->id]),
        'name' => $contract->name,
    ],
])

@section('content')
    <form role="form" action="{{route('contracts.update', ['id' => $contract->id])}}" method="POST" id="form-validate">
        @include('layouts.edit_form_common', ['request_id' => $contract->id])
        <div class="form-group">
            <label for="name">合同名称</label>
            <input id="name" name="name" value="{{$contract->name}}" type="text" placeholder="合同的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name_en">合同英文名称</label>
            <input id="name_en" name="name_en" value="{{$contract->name_en}}" type="text" placeholder="合同的英文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount_of_money">合同金额</label>
            <input id="amount_of_money" name="amount_of_money" value="{{$contract->amount_of_money}}" type="number" placeholder="合同的金额，请填写人民币数值" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rate_of_beans">迈豆兑换比例</label>
            <input id="rate_of_beans" name="rate_of_beans" value="{{$contract->rate_of_beans}}" type="number" placeholder="合同金额转换到迈豆数量的比例" class="form-control" value="100" required>
        </div>
        <div class="form-group">
            <label for="project_id">所属项目</label>
            <select class="form-control projects-select2" id="project_id" name="project_id" required>
                <option></option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}"
                    @if($project->id == $contract->project_id)
                        selected
                    @endif
                    >{{$project->name}} ( {{$project->application->name}} / {{$project->application->enterprise->name}}) </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" value="{{$contract->description}}" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection