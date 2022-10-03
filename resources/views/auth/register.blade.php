@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    @include('backend.partials.message')
                    <div class="card-body">
                        <form action="{{ route('register.agent') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="agency_name"
                                        class="col-form-label text-md-end">{{ __('Agency Name') }} <span class="text-danger">*</span></label>
                                    <input id="agency_name" type="text"
                                        class="form-control @error('agency_name') is-invalid @enderror" name="agency_name"
                                        value="{{ old('agency_name') }}" required autocomplete="name" autofocus>

                                    @error('agency_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email') }} <span class="text-danger">*</span></label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="col-form-label text-md-end">{{ __('Contact No') }} <span class="text-danger">*</span></label>
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contact_person"
                                        class="col-form-label text-md-end">{{ __('Contact Person') }} <span class="text-danger">*</span></label>
                                    <input id="contact_person" type="text"
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        name="contact_person" value="{{ old('contact_person') }}" required
                                        autocomplete="name" autofocus>

                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="designation"
                                        class="col-form-label text-md-end">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                    <input id="designation" type="text"
                                        class="form-control @error('designation') is-invalid @enderror" name="designation"
                                        value="{{ old('designation') }}" required autocomplete="name" autofocus>

                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="skype" class="col-form-label text-md-end">{{ __('Skype') }} <span class="text-danger">*</span></label>
                                    <input id="skype" type="text"
                                        class="form-control @error('skype') is-invalid @enderror" name="skype"
                                        value="{{ old('skype') }}" required autocomplete="name" autofocus>

                                    @error('skype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="address" class="col-form-label text-md-end">{{ __('Address') }} <span class="text-danger">*</span></label>
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="name" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="col-form-label text-md-end">{{ __('City') }} <span class="text-danger">*</span></label>
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" required autocomplete="name" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="country" class="col-form-label text-md-end">{{ __('Country') }} <span class="text-danger">*</span></label>
                                    <input id="country" type="text"
                                        class="form-control @error('country') is-invalid @enderror" name="country"
                                        value="{{ old('country') }}" required autocomplete="name" autofocus>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="zipcode" class="col-form-label text-md-end">{{ __('Zipcode') }} <span class="text-danger">*</span></label>
                                    <input id="zipcode" type="text"
                                        class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                                        value="{{ old('zipcode') }}" required autocomplete="name" autofocus>

                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }} <span class="text-danger">*</span></label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm"
                                        class="col-form-label text-md-end">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="web_address" class="col-form-label text-md-end">{{ __('Website Address') }}</label>
                                    <input id="web_address" type="text"
                                        class="form-control @error('web_address') is-invalid @enderror" name="web_address"
                                        value="{{ old('web_address') }}" autocomplete="name" autofocus>
                                </div>
                                <div class="col-md-6">
                                    <label for="nid_or_passport"
                                        class="col-form-label text-md-end">{{ __('NID or Passport') }} <span class="text-danger">*</span></label>
                                    <input id="nid_or_passport" type="file"
                                        class="form-control @error('nid_or_passport') is-invalid @enderror"
                                        name="nid_or_passport" value="{{ old('nid_or_passport') }}" required
                                        autocomplete="nid_or_passport" autofocus>

                                    @error('nid_or_passport')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="logo"
                                        class="col-form-label text-md-end">{{ __('Logo or Photo') }} <span class="text-danger">*</span></label>
                                    <input id="logo" type="file"
                                        class="form-control @error('logo') is-invalid @enderror" name="logo"
                                        value="{{ old('logo') }}" required autocomplete="logo" autofocus>

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="license" class="col-form-label text-md-end">{{ __('License') }} <span class="text-danger">*</span></label>
                                    <input id="license" type="file"
                                        class="form-control @error('license') is-invalid @enderror" name="license"
                                        value="{{ old('license') }}" required autocomplete="license" autofocus>

                                    @error('license')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-2 text-center">
                                <p><span class="text-danger">**</span>Fill all the fields and click Register button to apply as an agent<span class="text-danger">**</span></p>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
