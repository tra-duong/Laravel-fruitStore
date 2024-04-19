<div>
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif
</div>
