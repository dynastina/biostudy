<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <title>@yield('title', $pageTitle ?? '')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Triadhipa Logistics - One Best Expedition Solution for your Business Need, We care your shipments, we care your business growth" />
    <meta name="keywords" content="trd, trd.co.id, Triadhipa, Logistics, Triadhipa Logistics, Zamasco" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Triadhipa Logistics - One Best Expedition Solution for your Business Need" />
    <meta property="og:url" content="https://trd.co.id/triadhipa/" />
    <meta property="og:site_name" content="Triadhipa Logistics" />
    <link rel="canonical" href="https://trd.co.id/triadhipa/" />
    <link rel="shortcut icon" href="{{ asset('img/triadhipa-icon.webp') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('metronic/dist') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/dist') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>
        @media only screen and (max-width: 1000px) {
            .logo-space img {
                width: 300px !important;
            }

            .logo-space h2 {
                text-align: center !important;
            }
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
    <!--begin::Theme mode setup on page load-->
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Body-->
            <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                <!--begin::Email template-->
                <style>
                    html,
                    body {
                        padding: 0;
                        margin: 0;
                        font-family: Inter, Helvetica, "sans-serif";
                    }

                    a:hover {
                        color: #009ef7;
                    }

                </style>
                <div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                    <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                            <tbody>
                                <tr>
                                    <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                        <!--begin:Email content-->
                                        <div style="text-align:center; margin:0 15px 34px 15px">
                                            <!--begin:Logo-->
                                            <div style="margin-bottom: 10px">
                                                <a href="https://trd.co.id/triadhipa/" rel="noopener" target="_blank">
                                                    <img alt="Triadhipa Logistics Logo" src="{{ $message->embed(public_path() . '/img/triadhipa-logo-white.jpg') }}" style="height: 70px" />
                                                </a>
                                            </div>
                                            <!--end:Logo-->
                                            <!--begin:Media-->
                                            <div style="margin-bottom: 15px">
                                                <img alt="Forgot Password Icon" src="{{ $message->embed(public_path() . '/img/email/icon-positive-vote-2.jpg') }}" />
                                            </div>
                                            <!--end:Media-->
                                            <!--begin:Text-->
                                            <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hai {{ $req['username'] }}!</p>
                                                <p style="margin-bottom:2px; color:#7E8299">Silahkan tekan tombol dibawah untuk verifikasi email anda</p>
                                            </div>
                                            <!--end:Text-->
                                            <!--begin:Action-->
                                            <a href='{{ route('login.email-verification-request-process') }}?e={{ $req['email'] }}&u={{ $req['username'] }}' target="_blank" style="background-color:#50cd89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Verifikasi Email</a>
                                            <!--begin:Action-->
                                        </div>
                                        <!--end:Email content-->
                                    </td>
                                </tr>
                                <tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
                                    <td align="start" valign="start" style="padding-bottom: 10px;">
                                        <p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">Apa yang didapatkan?</p>
                                        <!--begin::Wrapper-->
                                        <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
                                            <!--begin::Item-->
                                            <div style="display:flex">
                                                <!--begin::Media-->
                                                <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:10px">
                                                    <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">1</span>
                                                </div>
                                                <!--end::Media-->
                                                <!--begin::Block-->
                                                <div>
                                                    <!--begin::Content-->
                                                    <div>
                                                        <!--begin::Title-->
                                                        <a style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Pembagian pekerjaan</a>
                                                        <!--end::Title-->
                                                        <!--begin::Desc-->
                                                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Pada aplikasi ini dibuatkan pembagian hak akses pada masing masing divisi agar dapat mempermudah pembagian pekerjaan yang ada</p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Content-->
                                                    <!--begin::Separator-->
                                                    <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                                    <!--end::Separator-->
                                                </div>
                                                <!--end::Block-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div style="display:flex">
                                                <!--begin::Media-->
                                                <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:10px">
                                                    <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">2</span>
                                                </div>
                                                <!--end::Media-->
                                                <!--begin::Block-->
                                                <div>
                                                    <!--begin::Content-->
                                                    <div>
                                                        <!--begin::Title-->
                                                        <a style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Pelaporan</a>
                                                        <!--end::Title-->
                                                        <!--begin::Desc-->
                                                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Memudahkan siapapun yang memerlukan laporan mengenai pekerjaan yang sudah dilakukan</p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Content-->
                                                    <!--begin::Separator-->
                                                    <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                                    <!--end::Separator-->
                                                </div>
                                                <!--end::Block-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div style="display:flex">
                                                <!--begin::Media-->
                                                <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:10px">
                                                    <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">3</span>
                                                </div>
                                                <!--end::Media-->
                                                <!--begin::Block-->
                                                <div>
                                                    <!--begin::Content-->
                                                    <div>
                                                        <!--begin::Title-->
                                                        <a style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Pelacakan</a>
                                                        <!--end::Title-->
                                                        <!--begin::Desc-->
                                                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Aplikasi ini juga bisa digunakan sebagai salah satu metode pelacakan pekerjaan maupun barang</p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Block-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                                        <p>&copy; Triadhipa Logistics.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Email template-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";

    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('metronic/dist') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('metronic/dist') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>
