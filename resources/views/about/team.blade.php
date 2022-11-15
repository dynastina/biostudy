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
                    <a href="{{ route($routePath.'.team') }}" class="text-muted text-hover-primary">About</a>
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
        <!--begin::About card-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Team-->
                <div class="mb-18">
                    <!--begin::Heading-->
                    <div class="text-center mb-17">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5">{{ $team['title'] }}</h3>
                        <!--end::Title-->
                        <!--begin::Sub-title-->
                        <div class="fs-5 text-muted fw-semibold">{{ $team['subtitle'] }}</div>
                        <!--end::Sub-title=-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Wrapper-->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">
                        @foreach($users as $key => $user)
                            <!--begin::Item-->
                            <div class="col text-center mb-9">
                                <!--begin::Photo-->
                                @if(!empty($user->profile_image))
                                    <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset($user->profile_dir. '/'. $user->profile_image) }}'); object-fit:cover"></div>
                                    @else
                                    <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{ asset('metronic/dist') }}/assets/media/svg/avatars/blank.svg'); object-fit:cover"></div>
                                @endif
                                <!--end::Photo-->
                                <!--begin::Person-->
                                <div class="mb-0">
                                    <!--begin::Name-->
                                    <a href="{{ url('application/users') }}/{{ $user->id }}" class="text-dark fw-bold text-hover-primary fs-3">{{ $user->name ?? '-' }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="text-muted fs-6 fw-semibold">{{ $user->position ?? 'Team' }}</div>
                                    <!--begin::Position-->
                                </div>
                                <!--end::Person-->
                            </div>
                            <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Team-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::About card-->
    </div>
</div>
@endsection
