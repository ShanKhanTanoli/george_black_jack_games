<form class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <!--begin::Body-->
    <div class="card-body">
        <div class="row">
            <label class="col-xl-3"></label>
            <div class="col-lg-9 col-xl-6">
                <h5 class="font-weight-bold mb-6">Customer Info</h5>
            </div>
        </div>
        <!--begin::Customer Profile Picture-->
        @include('Admin.partials.dashboard.subscriberprofilepicture')
        <!--end::Customer Profile Picture-->
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">First Name</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ $user->firstname}}" />
                @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Last Name</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ $user->lastname}}" />
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <label class="col-xl-3"></label>
            <div class="col-lg-9 col-xl-6">
                <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $user->phone}}" />
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email}}" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <label class="col-xl-3"></label>
            <div class="col-lg-9 col-xl-6">
                <h5 class="font-weight-bold mt-10 mb-6">Address</h5>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Address Line 1</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('address1') is-invalid @enderror" type="text" name="address1" value="{{ $user->address1}}" />
                @error('address1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Address Line 2</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('address2') is-invalid @enderror" type="text" name="address2" value="{{ $user->address2}}" />
                @error('address2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Country</label>
            <div class="col-lg-9 col-xl-6">
                <select name="country" class="form-control form-control-lg form-control-solid @error('country') is-invalid @enderror">
                    <option value="{{ $user->country }}" selected>
                        {{ $user->country }}
                    </option>
                    @foreach($country as $countries)
                    <option value="{{ $countries->name }}">
                        {!! $countries->name !!}
                    </option>
                    @endforeach
                </select>
                @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">City</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('city') is-invalid @enderror" type="text" name="city" value="{{ $user->city}}" />
                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">State</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('state') is-invalid @enderror" type="text" name="state" value="{{ $user->state}}" />
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label text-right">Postal Code</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid @error('postalcode') is-invalid @enderror" type="text" name="postalcode" value="{{ $user->postalcode}}" />
                @error('postalcode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="card-toolbar">
            <button type="submit" formaction="{{ route('AdminUpdateSubscibers', $user->id) }}" class="btn btn-success mr-2">Save Changes</button>
        </div>
    </div>
    <!--end::Body-->
</form>
