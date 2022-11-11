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
                        <a href="{{ route($routePath.'.index') }}" class="text-muted text-hover-primary">{{ $pageTitle }} Management</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route($routePath.'.index') }}" class="text-muted text-hover-primary">{{ $pageTitle }}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Tambah {{ $pageTitle }}</li>
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
            <div class="card card-default">
                <div class="card-header py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <span id="card_title">
                            <h4 class="m-0">{{ __('Create '.$pageTitle) }}</h4>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route($routePath.'.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-5">
                            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'required']) }}
                            {{ Form::label('name') }}
                            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-floating mb-5">
                            {{ Form::text('username', null, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username', 'required']) }}
                            {{ Form::label('username') }}
                            {!! $errors->first('username', '<p class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-floating mb-5">
                            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password', 'required' => 'required']) }}
                            {{ Form::label('Password') }}
                            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-floating mb-5">
                            {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'required']) }}
                            {{ Form::label('email') }}
                            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-floating mb-5">
                            {!! Form::select('roles', $roles, null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {{ Form::label('role') }}
                        </div>
                        <div class="form-floating mb-5">
                            {!! Form::select('is_active', ['1' => 'Aktif', '0' => 'Non Aktif'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {{ Form::label('is_active', 'Status') }}
                        </div>
                
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
