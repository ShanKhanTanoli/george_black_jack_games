<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <!--begin::Toolbar-->
            <!--end::Toolbar-->
            <!--begin::User-->
            <!--end::User-->
            <!--begin::Contact-->
            <!--end::Contact-->
            <!--begin::Nav-->
            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                <div class="navi-item mb-2">
                    <a href="{{ route('ConfigureGame',$game->id) }}" class="navi-link py-4">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                <i class="fas fa-info-circle"></i>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">Game Info</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a href="{{ route('Configurations',$game->id) }}" class="navi-link py-4">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                <i class="fas fa-cog"></i>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">Configurations</span>
                    </a>
                </div>
                <div class="navi-item mb-2">
                    <a href="{{ route('GameImage',$game->id) }}" class="navi-link py-4">
                        <span class="navi-icon mr-2">
                            <span class="svg-icon">
                                <i class="fas fa-images"></i>
                            </span>
                        </span>
                        <span class="navi-text font-size-lg">Set Game Image</span>
                    </a>
                </div>
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Profile Card-->
</div>
<!--end::Aside-->
