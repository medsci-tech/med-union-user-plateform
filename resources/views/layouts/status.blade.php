@if (session('status'))
    @if (session('status') == 'ok')
        <div class="alert alert-success">
            @if(session('flash_message'))
                {{ session('flash_message') }}
            @else
                操作成功！
            @endif
        </div>
    @elseif(session('status') == 'error')
        <div class="alert alert-error">
            @if(session('flash_message'))
                {{ session('flash_message') }}
            @else
                操作失败！
            @endif
        </div>
    @endif

@endif