@extends('layout.default')
@section('content')
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ $pageTitle }}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route($routePath.'.index') }}" class="text-muted text-hover-primary">{{ $pageTitle }} Menu</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ $pageTitle }}</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                @if(!empty($user->profile_image))
                                    <img src="{{ asset($user->profile_dir. '/'. $user->profile_image) }}" alt="{{ $user->name }} image" style="object-fit: cover" />
                                @else
                                    <img src="{{ asset('metronic/dist') }}/assets/media/svg/avatars/blank.svg" alt="{{ $user->name }} Profil Image" />
                                @endif
                                
                                @if($user->is_logged_in == '2')
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px" style="left: 82px !important;bottom: 0px !important;top: 90px !important;
                                    "></div>
                                @else
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-secondary rounded-circle border border-4 border-body h-20px w-20px" style="left: 82px !important;bottom: 0px !important;top: 90px !important;
                                    "></div>

                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}
                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                @if($completion > 90)
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor" />
                                            <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                        </svg>
                                    </span>
                                    
                                @endif
                            </a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-9">
                                <!--begin::Badge-->
                                <div class="badge badge-lg badge-light-primary d-inline">{{ $role }}</div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <!--begin::Info heading-->
                            <div class="fw-bold mb-3">Kontribusi & Progress
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Menunjukan partisipasi dalam melakukan tugas aplikasi"></i></div>
                            <!--end::Info heading-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700 d-flex justify-content-center">
                                        <span class="w-50px">75</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-semibold text-muted">Tugas Dikerjakan</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User Info-->
                        <!--end::Summary-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Connected Accounts-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="fw-bold m-0">Verifikasi Data</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-2">
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor" />
                                    <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Dengan melakukan verfikasi, akan memudahkan komunikasi satu sama lainnya
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--begin::Items-->
                        <div class="py-2">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <img src="{{ asset('metronic/dist') }}/assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="" />
                                    <div class="d-flex flex-column">
                                        <a class="fs-5 text-dark text-hover-primary fw-bold">Google Mail (GMAIL)</a>
                                        <div class="fs-6 fw-semibold text-muted">Untuk notifikasi dan proses backup akun</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="google" type="checkbox" value="1" id="kt_modal_connected_accounts_google" {{ (!empty($user->email_verified_at) ? 'checked="checked"' : '') }} disabled />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-semibold text-muted" for="kt_modal_connected_accounts_google"></span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Connected Accounts-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Profile</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Keamanan</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Aktivitas</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card card-flush mb-6 mb-xl-9">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p class="m-0">{{ $message }}</p>
                                </div>
                            @endif
                            @if ($message = Session::get('failed'))
                                <div class="alert alert-danger">
                                    <p class="m-0">{{ $message }}</p>
                                </div>
                            @endif
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <!--begin::Details item-->
                                    <div id="kt_user_view_details" class="collapse show">
                                        <div class="pb-5 fs-6">
                                            <div class="fw-bold mt-5">Nama</div>
                                            <div class="text-gray-600">{{ $user->name ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Username</div>
                                            <div class="text-gray-600">{{ $user->name ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Email</div>
                                            <div class="text-gray-600">
                                                <a href="mailto:{{ $user->email ?? '-'}}" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                            </div>

                                            <div class="fw-bold mt-5">Jabatan</div>
                                            <div class="text-gray-600">{{ $user->position ?? '-'}}</div>
                                            
                                            <div class="fw-bold mt-5">Jenis Kelamin</div>
                                            <div class="text-gray-600">{{ $user->gender ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Alamat</div>
                                            <div class="text-gray-600">{{ $user->address ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Telp</div>
                                            <div class="text-gray-600">{{ $user->phone ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Agama</div>
                                            <div class="text-gray-600">{{ $user->religion ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Pendidikan</div>
                                            <div class="text-gray-600">{{ $user->education ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Status Perkawinan</div>
                                            <div class="text-gray-600">{{ $user->marital_status ?? '-'}}</div>

                                            <div class="fw-bold mt-5">Tanggal Lahir</div>
                                            @if(!empty($user->birth_date))
                                                <div class="text-gray-600">{{ date('d F Y', strtotime($user->birth_date)) ?? '-'}}</div>
                                            @else
                                                <div class="text-gray-600">{{'-'}}</div>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->

                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h2 class="mb-1">Two Step Authentication</h2>
                                    <div class="fs-6 fw-semibold text-muted">Tingkatkan keamanan anda dengan verifikasi email</div>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Add-->
                                    <a href="{{ url('application/profiles/email-verification') . '/' . Auth::user()->id}}" class="btn {{ (!empty($user->email_verified_at) ? 'btn-light-success' : 'btn-light-primary') }} btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor" />
                                                <path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{ (!empty($user->email_verified_at) ? 'Email telah terverifikasi' : 'Verifikasi Email') }} </a>
                                    <!--end::Add-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h2 class="mb-1">Kelengkapan Profile</h2>
                                    <div class="fs-6 fw-semibold text-muted">Progress kelengkapan profile anda</div>
                                </div>
                            </div>
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-100 flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bold fs-6">{{ $completion }}%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: {{ $completion }}%;" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h2 class="mb-1">Terakhir Login</h2>
                                    <div class="fs-6 fw-semibold text-muted">Terakhir login ke aplikasi Triadhipa Logistics</div>
                                </div>
                            </div>
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <p>{{ $user->last_logged_in ?? '-'}}</p>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Aktivitas Terbaru</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 pb-5">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <table id="DataTable" class="table table-striped table-bordered table-hover w-100"></table>
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
</div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var id = `{{ $id }}`;

            var table = $('#DataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: `{{ url('application/users') }}/${id}`,
                columns: [
                    {
                        title: 'name',
                        data: 'name'
                    }
                ],
                order: [[ 0, "DESC" ]]
            });

            $('body').on('click', '.btn-delete', function(event) {
                event.preventDefault();

                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: form.attr('method'),
                            url: form.attr('action'),
                            data: form.serialize(),
                            success: function (r) {
                                Swal.fire({
                                    icon: 'success',
                                    title: r.message
                                });
                                
                                table.ajax.reload();
                            },
                            error: function (e) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi kesalahan'
                                });
                            },
                        });
                    }
                })
            });
        });
        $('body').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var form = $(this).closest('form');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Tindakan ini tidak bisa diurungkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Lanjutkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function (r) {
                            Swal.fire({
                                icon: 'success',
                                title: r.message
                            });

                            document.location.href = `{{ route('logout') }}`
                            
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi kesalahan'
                            });
                        },
                    });
                }
            })
        });
    </script>
@endsection
