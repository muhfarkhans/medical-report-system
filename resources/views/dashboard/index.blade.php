@extends('template.layout')

@section('content')
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-fluid">
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-md-3 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Total Doctor / Admin</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Number of all admin</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <!-- <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("user.create") }}">Create new user</a>
                            </li>
                        </ul>
                    </div> -->
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="" class="text-primary" style="font-size: 4rem;">{{ $total_admin }}</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
        <div class="col-md-3 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Total Patient / User</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Number of all patient</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <!-- <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("user.create") }}">Create new user</a>
                            </li>
                        </ul>
                    </div> -->
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="" class="text-primary" style="font-size: 4rem;">{{ $total_user }}</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
        <div class="col-md-3 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Total Report</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Number of all report</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <!-- <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("user.create") }}">Create new user</a>
                            </li>
                        </ul>
                    </div> -->
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="" class="text-info" style="font-size: 4rem;">{{ $total_report }}</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
        <div class="col-md-3 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Total Report Today</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Number of all report today</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <!-- <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("user.create") }}">Create new user</a>
                            </li>
                        </ul>
                    </div> -->
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="" class="text-success" style="font-size: 4rem;">{{ $total_report_today }}</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Content container-->
@endsection