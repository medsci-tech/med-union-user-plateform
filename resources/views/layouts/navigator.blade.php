<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">业务管理</div>
        <div class="list-group">
            <a class="list-group-item" href="{{route('enterprises.index')}}">
                企业列表
            </a>
            <a class="list-group-item" href="{{route('applications.index')}}">
                应用列表
            </a>
            <a class="list-group-item" href="{{route('projects.index')}}">
                项目列表
            </a>
            <a class="list-group-item" href="{{route('contracts.index')}}">
                合同列表
            </a>
            <a class="list-group-item" href="{{route('bean_rates.index')}}">
                迈豆规则列表
            </a>
        </div>
    </div>

    @if(Auth::check() && Auth::user()->can('call interfaces'))
        <div class="panel panel-default">
            <div class="panel-heading panel-title">接口管理</div>
            <div class="list-group">
                <a class="list-group-item" href="{{url('/oauth/dashboard')}}">
                    Token 控制台
                </a>
            </div>
        </div>
    @endif
</div>