

@if (session('failed'))
<div class="alert alert-danger" role="alert">
    <span class="block sm:inline">{{session('failed')}}</span>
</div>
@endif


@if (session('success'))
<div class="alert alert-success" role="alert">
    <span class="block sm:inline">{{session('success')}}</span>
</div>
@endif