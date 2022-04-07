<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
    @if(isset(Auth::user()->avatar))
    <div class="col-lg-9 col-xl-6">
        <div class="image-input image-input-outline" id="kt_image_1">
            <div class="image-input-wrapper" style="background-image: url('{{ asset('/images/user/'.Auth::user()->avatar)  }}');"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="profile_avatar_remove" value="0">
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
        <button type="submit" formaction="{{ route('RemoveUserProfilePicture' , Auth::user()->id ) }}" class="btn btn-danger btn-sm mt-2">Remove Image</button>
    </div>
    @else
    <div class="col-lg-9 col-xl-6">
        <div class="image-input image-input-outline" id="kt_image_1">
            <div class="image-input-wrapper" style="background-image: url('{{ asset('/images/defaut.jpg')  }}');"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="profile_avatar_remove" value="0">
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
    </div>
    @endif
</div>
