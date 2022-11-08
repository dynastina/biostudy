@extends('layout.login')
@section('content')
<!--begin::Card-->
<div class="card rounded-3 w-md-550px">
    <!--begin::Card body-->
    <div class="card-body p-10 p-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="" method="post">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Lupa Password ?</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-500 fw-semibold fs-6">Masukan email anda dan dapatkan link reset password.</div>
                <!--end::Link-->
            </div>
            @if ($message = Session::get('failed'))
                <!--begin::Alert-->
                <div class="alert alert-danger d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="currentColor"></path>
                            <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-dark">Request Reset Password Gagal!</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>Pastikan anda telah terdaftar dan telah melakukan verifikasi email</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            @endif
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                <!--end::Email-->
            </div>
            <!--begin::Actions-->
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <a href="{{ url('/application') }}" class="btn btn-light">Cancel</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
@endsection
@section('scripts')
<script>
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
    var form = KTUtil.getById('kt_login_singin_form');
    var f = $('#kt_login_singin_form');
    var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');
    var fsb = $('#kt_login_singin_form_submit_button');

    f.submit(function(event) {
        KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");
        fsb.prop('disabled', true);


        setTimeout(function() {
            KTUtil.btnRelease(formSubmitButton);
            fsb.prop('disabled', false);
        }, 2000);
    });

</script>
@endsection
