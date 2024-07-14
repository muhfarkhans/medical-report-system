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
                        <span class="card-label fw-bold text-dark">Users</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Update data user</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar" hidden>
                        <ul class="nav" id="kt_chart_widget_8_tabs">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary fw-bold px-4 me-1" id="" href="{{ route("user.create") }}">Create new user</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <form method="post" action="{{ route("user.update", ["id" => $user->id])}}">
                        @csrf
                        <div class="mb-10">
                            <label for="" class="required form-label">Name</label>
                            <input name="name" type="text" class="form-control form-control-solid" placeholder="..." value="{{ $user->name }}" />
                            @if($errors->has('name'))
                                <p class="alert text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Email</label>
                            <input name="email" type="text" class="form-control form-control-solid" placeholder="..." value="{{ $user->email }}" />
                            @if($errors->has('email'))
                                <p class="alert text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Address</label>
                            <textarea name="address" class="form-control form-control-solid">{{ $user->profile->address }}</textarea>
                            @if($errors->has('address'))
                                <p class="alert text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Birthdate</label>
                            <input name="birth" type="date" class="form-control form-control-solid" placeholder="..." value="{{ $user->profile->birth }}" />
                            @if($errors->has('birth'))
                                <p class="alert text-danger">{{ $errors->first('birth') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Gender</label>
                            <select name="gender" class="form-select form-select-solid" aria-label="Select example">
                                <option value="m" {{ $user->profile->gender == 'm' ? 'selected' : '' }}>Male</option>
                                <option value="f" {{ $user->profile->gender == 'f' ? 'selected' : '' }}>Female</option>
                            </select>
                            @if($errors->has('gender'))
                                <p class="alert text-danger">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Blood type</label>
                            <select name="blood_type" class="form-select form-select-solid" aria-label="Select example">
                                <option value="">Open this select menu</option>
                                <option value="a" {{ $user->profile->blood_type == 'a' ? 'selected' : '' }}>A</option>
                                <option value="b" {{ $user->profile->blood_type == 'b' ? 'selected' : '' }}>B</option>
                                <option value="ab" {{ $user->profile->blood_type == 'ab' ? 'selected' : '' }}>AB</option>
                                <option value="o" {{ $user->profile->blood_type == 'o' ? 'selected' : '' }}>O</option>
                            </select>
                            @if($errors->has('blood_type'))
                                <p class="alert text-danger">{{ $errors->first('blood_type') }}</p>
                            @endif
                        </div>
                        <div class="mb-10">
                            <label for="" class="required form-label">Phone</label>
                            <input name="phone" type="number" class="form-control form-control-solid" placeholder="..." value="{{ $user->profile->phone }}"/>
                            @if($errors->has('phone'))
                                <p class="alert text-danger">{{ $errors->first('phone') }}</p>
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