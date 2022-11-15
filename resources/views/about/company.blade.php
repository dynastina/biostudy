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
                    <a href="{{ route($routePath.'.company') }}" class="text-muted text-hover-primary">About</a>
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
                <!--begin::About-->
                <div class="mb-18">
                    <!--begin::Wrapper-->
                    <div class="mb-10">
                        <!--begin::Top-->
                        <div class="text-center mb-15">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-dark mb-5">{{ $company['title'] }}</h3>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fs-5 text-muted fw-semibold">{{ $company['subtitle'] }}</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Overlay-->
                        <div class="overlay">
                            <!--begin::Image-->
                            <img class="w-100 card-rounded" src="{{ asset($company['file_dir']. '/' . $company['file']) }}" alt="Triadhipa Hero Background" />
                            <!--end::Image-->
                            <!--begin::Links-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <a href="https://trd.co.id/triadhipa/" class="btn btn-light-primary ms-3" target="_blank">{{ $company['extra'] }}</a>
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Wrapper-->
                    {!! $company['body'] !!}
                </div>
                <!--end::About-->
                <!--begin::Section-->
                <div class="mb-16">
                    <!--begin::Top-->
                    <div class="text-center mb-12">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5">{{ $vision['title'] }}</h3>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="fs-5 text-muted fw-semibold">{{ $vision['subtitle'] }}</div>
                        <!--end::Text-->
                    </div>
                    <!--end::Top-->
                    {!! $vision['body'] !!}
                </div>
                <!--end::Section-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::About card-->
    </div>
</div>
@endsection
