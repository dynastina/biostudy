@extends('layout.login')
@section('content')
<!--begin::Card-->
<div class="card rounded-3 w-md-550px">
    <!--begin::Card body-->
    <div class="card-body p-10 p-lg-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('login.regist-send') }}" method="post">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Belum Punya Akun ?</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-500 fw-semibold fs-6">Masukan email anda dan tunggu konfirmasi admin untuk dibuatkan akun anda</div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            @if ($message = Session::get('failed'))
            <!--begin::Alert-->
            <div class="alert alert-primary d-flex align-items-center p-5">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h4 class="mb-1 text-dark">Request Pendaftaran Gagal!</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>Anda telah mendaftarkan akun dengan email tersebut, silahkan login atau gunakan email lain</span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Alert-->
            @endif
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
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
