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
                        <a href="{{ route($routePath.'.index') }}" class="text-muted text-hover-primary">Content Management</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route($routePath.'.index') }}" class="text-muted text-hover-primary">Content</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">View {{ $pageTitle }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route($routePath.'.index') }}" class="btn btn-primary btn-sm float-right font-weight-bolder">
                    <i class="fa fa-arrow-left"></i>Back
                </a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-header py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <span id="card_title">
                            <h4 class="m-0">{{ __('Show '.$pageTitle) }}</h4>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        
                                    <tr>
                                        <td width="20%">Page</td>
                                        <td>{{ $content->page }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Content Type</td>
                                        <td>{{ $content->content_type }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Title</td>
                                        <td>{!! $content->title ?? '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Subtitle</td>
                                        <td>{!! $content->subtitle ?? '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Body</td>
                                        <td>{!! $content->body ?? '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">File</td>
                                        @if(!empty($content->file_dir))
                                            <td><a href="{{ '/'.$content->file_dir.'/'.$content->file }}" class="btn btn-primary" target="_blank">{{ $content->file }}</a></td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    </tr>
                                    @if(!empty($content->url))
                                        <tr>
                                            <td width="20%">URL</td>
                                            <td>
                                                <div class="btn-group mb-3 mr-3">
                                                    <a href="//{{ $content->url }}" class="btn btn-primary" target="_blank">{{ $content->url }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @if($content->content_type == 'files')
                                        <tr>
                                            <td width="20%">Files</td>
                                            <td>
                                                @foreach ($content->contentFiles as $v)
                                                    <div class="btn-group mb-3 mr-3">
                                                        <a href="{{ '/'.$v->file_dir.'/'.$v->file }}" class="btn btn-primary" target="_blank">{{ $v->file }}</a>
                                                        {{-- <button class="btn btn-danger btn-delete-content-file" data-id="{{ $v->id }}"><i class="fa fa-times pr-0"></i></button> --}}
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td width="20%">Extra</td>
                                        <td>{!! $content->extra ?? '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Dibuat Oleh</td>
                                        <td>{{ $content->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Diupdate Oleh</td>
                                        <td>{{ $content->userUpdate->name }} pada {{ $content->updated_at }}</td>
                                    </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
