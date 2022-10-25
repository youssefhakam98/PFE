@if ($errors->all())

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

@endif

@if (session()->has("success"))

<div class="alert alert-success solid alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>{{session()->get("success")}}</strong>
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
</div>


@endif


@if (session()->has("warning"))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session()->get("warning")}}</strong>
        <button type="button" data-dismiss="alert" class="close" aria-label="close">
            <span>&times;</span>
        </button>
    </div>
@endif

@if (session()->has("info"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{sessioresponsen()->get("info")}}</strong>
        <button type="button" data-dismiss="alert" class="close" aria-label="close">
            <span>&times;</span>
        </button>
    </div>
@endif