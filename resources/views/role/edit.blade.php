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
            <!--end::Toolbar-->
                <div class="card card-default">
                    <div class="card-header py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title">
                                <h4 class="m-0">{{ __('Update '.$pageTitle) }}</h4>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route($routePath.'.update', $role->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="form-group">
                                {{ Form::label('name') }}
                                {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'required' => 'required']) }}
                                {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <label>Permission</label>
                                <table class="table table-bordered">
                                    <tr class="bg-success">
                                        <td width="1%">
                                            <label class="checkbox" style="margin-left: 10px" >
                                                <input id="head" type="checkbox" >
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="head" class="m-0 text-white" style="margin-left: 10px" >Check All</label>
                                        </td>
                                    </tr>
                                    @php
                                    $lastp = "";
                                    @endphp
                                    @foreach($permissions as $value)
                                        @php
                                            $v = "";
                                            $title = explode('-', $value->name);
                                            foreach ($title as $key => $ve) {
                                                if ($key != (count($title) - 1)) {
                                                    $v .= ucfirst($ve.' ');
                                                }
                                            }
                                            $v = str_replace(' ', '-', $v);
                                        @endphp

                                        @if($lastp != $v)
                                            <tr class="bg-primary">
                                                <td>
                                                    <label style="margin-left: 10px" style="margin-left: 10px" class="checkbox checkbox-success">
                                                        <input class="head-2" data-child=".{{ $v }}" type="checkbox" id="{{ $v }}-head">
                                                        <span></span>
                                                    <label class="checkbox" style="margin-left: 10px" >
                                                </td>
                                                <td>
                                                    <label for="{{ $v }}-head" class="m-0 text-white">{{ str_replace('-', ' ', $v) }}</label>
                                                </td>
                                            </tr>
                                        @endif
                                        
                                        <tr>
                                            <td width="1%">
                                                <label class="checkbox" style="margin-left: 10px" >
                                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name all '.$v, 'id' => $value->name]) }}
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="{{ $value->name }}" class="m-0">{{ $value->name }}</label>
                                            </td>
                                        </tr>

                                        @php
                                            $lastp = $v;
                                        @endphp
                                    @endforeach
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#head').click(function() {
            $(".all").prop('checked', this.checked);
            $(".head-2").prop('checked', this.checked);
        });
        
        $('.head-2').click(function() {
            var v = $(this).data('child');
            $(v).prop('checked', this.checked);
        });

        $('.head-2').each(function (index, element) {
            var child = $(this).data('child');
            var length = $(child).length;
            var checked = 0;
            $(child).each(function (ii, ee) {
                if($(this).is(':checked')) {
                    checked++;
                }
            });
            if (length == checked) {
                $(this).prop('checked', true);
            }
            
        });
    </script>
@endsection