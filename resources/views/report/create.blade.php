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
                        <span class="card-label fw-bold text-dark">Reports</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Create a new report</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar" hidden>
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("report.create") }}">Create new report</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <form method="post" action="{{ route("report.store") }}">
                        @csrf
                        <div class="mb-10">
                            <label for="" class="required form-label">Patient</label>
                            <select name="patient_id" class="form-control form-control-solid">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->profile != null ? $user->profile->address : ""}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('patient_id'))
                                <p class="alert text-danger">{{ $errors->first('patient_id') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Blood pressure</label>
                            <input name="blood_pressure" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('blood_pressure'))
                                <p class="alert text-danger">{{ $errors->first('blood_pressure') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Medical condition</label>
                            <input name="medical_condition" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('medical_condition'))
                                <p class="alert text-danger">{{ $errors->first('medical_condition') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Medical history</label>
                            <input name="medical_history" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('medical_history'))
                                <p class="alert text-danger">{{ $errors->first('medical_history') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Family history</label>
                            <input name="family_history" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('family_history'))
                                <p class="alert text-danger">{{ $errors->first('familiy_history') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Immunizations</label>
                            <input name="immunizations" type="text" class="form-control form-control-solid" placeholder="..."/>
                            @if($errors->has('immunizations'))
                                <p class="alert text-danger">{{ $errors->first('immunizations') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Lab results</label>
                            <textarea name="lab_results" class="form-control form-control-solid" ></textarea>
                            @if($errors->has('lab_results'))
                                <p class="alert text-danger">{{ $errors->first('lab_results') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Diagnosis</label>
                            <textarea name="diagnosis" class="form-control form-control-solid" ></textarea>
                            @if($errors->has('diagnosis'))
                                <p class="alert text-danger">{{ $errors->first('diagnosis') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Treatment</label>
                            <textarea name="treatment" class="form-control form-control-solid" ></textarea>
                            @if($errors->has('treatment'))
                                <p class="alert text-danger">{{ $errors->first('treatment') }}</p>
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