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
                    <a href="{{ url('application/dashboard') }}" class="text-muted text-hover-primary">Home</a>
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
        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
										<!--begin::Secondary button-->
										<a href="../../demo1/dist/apps/projects/list.html" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">My Projects</a>
										<!--end::Secondary button-->
										<!--begin::Primary button-->
										<a  class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">New Project</a>
										<!--end::Primary button-->
									</div> --}}
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xxl-12 col-lg-12">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    @if(!empty(Auth::user()->profile_image))
                                        <img src="{{ asset(Auth::user()->profile_dir. '/'. Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }} Profil Image" style="object-fit: cover" />
                                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                    @else
                                        <img src="{{ asset('metronic/dist') }}/assets/media/svg/avatars/blank.svg" alt="{{ Auth::user()->name }} Profil Image" style="object-fit: cover" />
                                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                    @endif
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ Auth::user()->name }}</a>
                                            @if($completion > 90)
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                        <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor" />
                                                        <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                    </svg>
                                                </span>
                                                
                                            @endif
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a  class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
                                                        <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
                                                        <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $role }}</a>
                                            <a  class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ Auth::user()->email }}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Actions-->
                                    <div class="d-flex my-4">
                                        <!--begin::Menu-->
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Kelola Profile</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ url('application/profiles') }}" class="menu-link px-3">Edit Profile</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ url('application/profiles') . '/' . Auth::user()->id . '/' . 'edit'}}" class="menu-link flex-stack px-3">Ganti Password</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <form action="{{ url('application/profiles') }}/deactivated/{{ Auth::user()->id }}" method="POST" class="d-flex">
                                                        @csrf
                                                        <button type="submit" class="menu-link text-danger px-5 btn-delete" style="background-color: transparent;border: none;">Non Aktifkan Akun</button>
                                                    </form>
                                                    {{-- <a  class="menu-link px-3">Non Aktifkan Akun <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Akun anda tidak akan terdata"></i></a> --}}
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="10" data-kt-countup-prefix="">0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Tugas</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Total Tugas Dikerjakan</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-semibold fs-6 text-gray-400">Kelengkapan Profile</span>
                                            <span class="fw-bold fs-6">{{ $completion }}%</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div class="bg-success rounded h-5px" role="progressbar" style="width: {{ $completion }}%;" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                    </div>
                </div>
                <!--end::Navbar-->
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">
                <!--begin::Card widget 20-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-100 mb-5 mb-xl-10" style="background-image:url('{{ asset('metronic/dist') }}/assets/media/patterns/vector-1.png')">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold  me-2 lh-1 ls-n2">69</span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class=" opacity-75 pt-1 fw-semibold fs-6">Transaksi Hari ini</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end pt-0">
                        <!--begin::Progress-->
                        <div class="d-flex align-items-center flex-column mt-3 w-100">
                            <div class="d-flex justify-content-between fw-bold fs-6 opacity-75 w-100 mt-auto mb-2">
                                <span>43 Terkirim</span>
                                <span>72%</span>
                            </div>
                            <div class="h-8px mx-3 w-100 bg-danger bg-opacity-50 rounded">
                                <div class="bg-danger rounded h-8px" role="progressbar" style="width: 72%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Progress-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 20-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">
                <!--begin::Card widget 7-->
                <div class="card card-flush h-md-100 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $userCount }}</span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">User Terdaftar</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-end pe-0">
                        <!--begin::Title-->
                        <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">User Online</span>
                        <!--end::Title-->
                        <!--begin::Users group-->
                        <div class="symbol-group symbol-hover flex-nowrap">
                            @foreach($userActive as $key => $usrActive)
                                @if(empty($usrActive['profile_image']))
                                    @if($loop->iteration % 2 == 1)
                                        <a href="{{ url('application/users/') . '/' . $usrActive['id'] }}">
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $usrActive['name'] }}">
                                                <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{ $usrActive['name'][0] }}</span>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ url('application/users/') . '/' . $usrActive['id'] }}">
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $usrActive['name'] }}">
                                                <span class="symbol-label bg-primary text-inverse-primary fw-bold">{{ $usrActive['name'][0] }}</span>
                                            </div>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ url('application/users/') . '/' . $usrActive['id'] }}">
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $usrActive['name'] }}">
                                            <img alt="$usrActive->name Icon Picture" src="{{ asset($usrActive->profile_dir. '/'. $usrActive->profile_image) }}" />
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            @if(count($userActive) >= 5)
                                <a class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                    <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+{{ $userActiveCount - count($userActive) }}</span>
                                </a>
                                
                            @endif
                        </div>
                        <!--end::Users group-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 7-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
</div>
<!--end::Content-->
@endsection

@section('scripts')
    <script>
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
