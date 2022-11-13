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
                <li class="breadcrumb-item text-muted">{{ $pageTitle }}</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            @can($permissionName.'-create')
            <a href="{{ route($routePath.'.create') }}" class="btn btn-primary btn-sm float-right font-weight-bolder">
                <i class="fa fa-plus-circle"></i>Tambah {{ $pageTitle }}
            </a>
            @endcan
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
        @endif

        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            <!--begin::Col-->
            @foreach ($data as $dta)
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{ $dta['name'] }}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <!--begin::Users-->
                            <div class="fw-bold text-gray-600 mb-5">Total user dengan role ini : {{ $dta['user_count'] }}</div>
                            <!--end::Users-->
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                @php
                                    $count = 0;

                                    $count = count($dta['permissions']);

                                    $roleId = $dta['id'];
                                @endphp
                                @foreach($dta['permissions'] as $key => $permission)

                                    @if($loop->iteration <= '7')
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                        </div>
                                        
                                    @endif
                                 
                                @endforeach
                            </div>
                            @if($count - 7 > 0)
                                <div class='d-flex align-items-center py-2'>
                                    <span class='bullet bg-primary me-3'></span>
                                    <em>dan {{ $count - 7 }} lainnya...</em>
                                </div>
                                
                            @endif
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            <form action="{{ route($routePath.'.index') }}/{{ $roleId }}" method="POST" class="form-inline">
                                @can($permissionName.'-show')
                                    <a href="{{ route($routePath.'.index') }}/{{ $dta['id'] }}" class="btn btn-light btn-active-primary my-1 me-1 p-4">View</a>
                                @endcan
                                @can($permissionName.'-edit')
                                    <a href="{{ route($routePath.'.index') }}/{{ $dta['id'] }}/edit" class="btn btn-light btn-active-light-primary my-1 me-1 p-4">Edit</a>
                                @endcan
                                @can($permissionName.'-delete')
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-active-light-primary my-1 btn-delete p-4">Delete</button>
                                @endcan
                            </form>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
                
            @endforeach
            <!--end::Col-->
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        $('body').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var form = $(this).closest('form');

            var card = $(this).closest('.card');

            Swal.fire({
                title: 'Apakah anda yakin?'
                , text: "Tindakan ini tidak bisa diurungkan."
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Lanjutkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: form.attr('method')
                        , url: form.attr('action')
                        , data: form.serialize()
                        , success: function(r) {
                            Swal.fire({
                                icon: 'success'
                                , title: r.message
                            });

                            card.remove();

                        }
                        , error: function(e) {
                            Swal.fire({
                                icon: 'error'
                                , title: 'Terjadi kesalahan'
                            });
                        }
                    , });
                }
            })
        });
    });

</script>
@endsection
