@if(Session('success'))
<div class="alert alert-custom alert-light-success fade show mb-10" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-3x svg-icon-success">
            <i class="flaticon2-check-mark text-success"></i>
        </span>
    </div>
    <div class="alert-text font-weight-bold">
        {{ Session::get('success') }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
@endif
@if(Session('error'))
<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-3x svg-icon-danger">
            <i class="flaticon2-check-mark text-danger"></i>
        </span>
    </div>
    <div class="alert-text font-weight-bold">
        {{ Session::get('error') }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
@endif
<!--begin::Validation Errors-->
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-custom alert-light-danger fade show mb-10 mt-2 mb-2" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-3x svg-icon-danger">
            <i class="fas fa-exclamation text-danger"></i>
        </span>
    </div>
    <div class="alert-text font-weight-bold">
        <strong>
            {{ $error }}
        </strong>
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                <i class="ki ki-close"></i>
            </span>
        </button>
    </div>
</div>
@endforeach
@endif
<!--end::Validation Errors-->
