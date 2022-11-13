@extends('layout.default')
@section('content')
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
                <li class="breadcrumb-item text-muted">Edit {{ $pageTitle }}</li>
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

        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Detail Profile</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->

                <form id="kt_account_profile_details_form" class="form" action="{{ route($routePath.'.update', $user->id) }}" role="form" enctype="multipart/form-data" method="POST">
                    {{ method_field('PATCH') }}
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar Profile</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('metronic/dist') }}/assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    @if(!empty($user->profile_image))
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset($user->profile_dir. '/'. $user->profile_image) }})"></div>
                                    @else
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('metronic/dist') }}/assets/media/svg/avatars/blank.svg')"></div>
                                    @endif
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti Gambar Profile">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus Gambar Profile">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Ekstensi yang diizinkan: png, jpg, jpeg, webp, svg & tidak boleh lebih dari 2 MB</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6 d-none">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">ID</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        {{ Form::text('id', $user->id, ['class' => 'form-control form-control-lg form-control-solid ' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Masukan ID']) }}
                                        {!! $errors->first('id', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Nama Lengkap</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        {{ Form::text('name', $user->name, ['class' => 'form-control form-control-lg form-control-solid ' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Nama Lengkap']) }}
                                        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Username</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('username', $user->username, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Username']) }}
                                {!! $errors->first('username', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span>Password</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Isi password jika ingin mengganti password anda"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('password', '', ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Masukan password']) }}
                                {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span>Password Hint</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Jika anda 2x salah memasukan password ada saat login, maka password hint akan muncul"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('password_hint', $user->password_hint, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('password_hint') ? ' is-invalid' : ''), 'placeholder' => 'Masukan password_hint']) }}
                                {!! $errors->first('password_hint', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span>Email</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email harus aktif"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('email', $user->email, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Email']) }}
                                {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Jabatan</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('position', $user->position, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('position') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Jabatan']) }}
                                {!! $errors->first('position', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Jenis Kelamin</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::select('gender', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], $user->gender, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Jenis Kelamin']) }}
                                {!! $errors->first('gender', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span>Alamat</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::textarea('address', $user->address, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Alamat']) }}
                                {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--end::Card body-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Telp
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Telp harus aktif"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::text('phone', $user->phone, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Nomor Telp']) }}
                                {!! $errors->first('phone', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Agama</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::select('religion', ['Islam' => 'Islam', 'Katolik' => 'Katolik', 'Protestan' => 'Protestan', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghucu' => 'Konghucu'], $user->religion, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('religion') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Agama Kepercayaan']) }}
                                {!! $errors->first('religion', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Pendidikan Terakhir</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::select('education', ['SD Sederajat' => 'SD Sederajat', 'SMP Sederajat' => 'SMP Sederajat', 'SMP Sederajat' => 'SMP Sederajat', 'SMA Sederajat' => 'SMA Sederajat', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'], $user->education, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('education') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Pendidikan Terakhir']) }}
                                {!! $errors->first('education', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Status Pernikahan</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::select('marital_status', ['Belum Menikah' => 'Belum Menikah', 'Menikah' => 'Menikah', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati'], $user->marital_status, ['class' => 'form-control form-control-lg form-control-solid' . ($errors->has('marital_status') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Status Pernikahan']) }}
                                {!! $errors->first('marital_status', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Tanggal Lahir</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                {{ Form::date('birth_date', $user->birth_date, ['class' => 'form-control form-control-lg form-control-solid flatpickr' . ($errors->has('birth_date') ? ' is-invalid' : ''), 'placeholder' => 'Masukan Tanggal Lahir']) }}
                                {!! $errors->first('birth_date', '<p class="invalid-feedback">:message</p>') !!}
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batalkan</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Update Profile</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
</div>
@endsection
