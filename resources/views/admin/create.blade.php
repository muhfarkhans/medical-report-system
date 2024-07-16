@extends("template.layout")

@section("content")
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-fluid">
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-md-12 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Admin</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Create a new admin</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar" hidden>
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("admin.create") }}">Create new admin</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <form method="post" action="{{ route("admin.store") }}">
                        @csrf
                        <div class="mb-10">
                            <label for="" class="required form-label">Name</label>
                            <input name="name" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('name'))
                                <p class="alert text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Email</label>
                            <input name="email" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('email'))
                                <p class="alert text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Password</label>
                            <input name="email" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('password'))
                                <p class="alert text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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

@section("css")
<!-- <link href="{{ asset("saul/assets/plugins/custom/datatables/datatables.bundle.css") }}" rel="stylesheet" type="text/css"/> -->
<!-- <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> -->
@endsection

@push("js")
<script>
    $("#kt_datatable_horizontal_scroll").DataTable({
        "scrollX": true
    });
</script>
@endpush