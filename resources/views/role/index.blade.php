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
                    <a href="{{ url('application/dashboard') }}" class="text-muted text-hover-primary">Content Management</a>
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
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-flush h-md-100">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Administrator</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Users-->
                        <div class="fw-bold text-gray-600 mb-5">Total users with this role: 5</div>
                        <!--end::Users-->
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column text-gray-600">
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>All Admin Controls</div>
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>View and Edit Financial Summaries</div>
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>Enabled Bulk Reports</div>
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>View and Edit Payouts</div>
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>View and Edit Disputes</div>
                            <div class='d-flex align-items-center py-2'>
                                <span class='bullet bg-primary me-3'></span>
                                <em>and 7 more...</em>
                            </div>
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer flex-wrap pt-0">
                        <a href="../../demo1/dist/apps/user-management/roles/view.html" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                        <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <!--end::Col-->
            <!--begin::Add new card-->
            <div class="ol-md-4 mb-5">
                <!--begin::Card-->
                <div class="card h-md-100" style="margin-bottom: 100px;">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center">
                        <a href="{{ route($routePath.'.create') }}" class="btn btn-clear d-flex flex-column flex-center" >
                        <!--begin::Button-->
                            <!--begin::Illustration-->
                            <img src="{{ asset('metronic/dist') }}/assets/media/illustrations/sketchy-1/4.png" alt="" class="mw-100 mh-150px mb-7" />
                            <!--end::Illustration-->
                            <!--begin::Label-->
                            <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Tambah {{ $pageTitle }}</div>
                            <!--end::Label-->
                        </a>
                        <!--begin::Button-->
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--begin::Card-->
            </div>
            <!--begin::Add new card-->
        </div>
        <!--end::Row-->

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#DataTable').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route($routePath.'.index') }}"
            , columns: [{
                    title: 'No'
                    , class: 'text-center'
                    , width: '1%'
                    , data: 'id'
                }
                , {
                    title: 'name'
                    , data: 'name'
                }
                , {
                    title: 'Action'
                    , class: 'text-center'
                    , width: '1%'
                    , data: 'id'
                    , orderable: false
                    , render: function(id) {
                        return `
                                <form action="{{ route($routePath.'.index') }}/${id}" method="POST" class="d-flex">
                                    @can($permissionName.'-show')
                                        <a class="btn btn-primary btn-xs d-flex justify-content-center align-items-center" href="{{ route($routePath.'.index') }}/${id}"><i class="fa fa-fw fa-eye p-0"></i></a>
                                    @endcan
                                    @can($permissionName.'-edit')
                                        <a class="btn btn-success btn-xs d-flex justify-content-center align-items-center" href="{{ route($routePath.'.index') }}/${id}/edit"><i class="fa fa-pencil-alt p-0"></i></a>
                                    @endcan
                                    @can($permissionName.'-delete')
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs d-flex justify-content-center align-items-center btn-delete"><i class="fa fa-trash-alt p-0"></i></button>
                                    @endcan
                                </form>
                            `;
                    }
                }
            , ]
            , order: [
                [0, "DESC"]
            ]
        });

        table.on('draw.dt', function() {
            var info = table.page.info();
            var i = 0;
            for (let x = (info.start + 1); x <= info.end; x++) {
                table.column(0).nodes()[i].innerHTML = x;
                i++;
            }
        }).draw();

        $('body').on('click', '.btn-delete', function(event) {
            event.preventDefault();

            var form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
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

                            table.ajax.reload();
                        }
                        , error: function(e) {
                            Swal.fire({
                                icon: 'error'
                                , title: 'An error occurred.'
                            });
                        }
                    , });
                }
            })
        });
    });

</script>
@endsection
