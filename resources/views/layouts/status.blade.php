@if (session('status'))
    @if (session('status') == 'ok')
        <div class="alert alert-success">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            @if(session('flash_message'))
                {{ session('flash_message') }}
            @else
                操作成功！
            @endif
        </div>
    @elseif(session('status') == 'error')
        <div class="alert alert-danger">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            @if(session('flash_message'))
                {{ session('flash_message') }}
            @else
                操作失败！
            @endif
        </div>
    @endif
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif