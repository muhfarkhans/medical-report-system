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
                        <span class="card-label fw-bold text-dark">Current</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Current order number</span>
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
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5" hidden></div>
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="current-order-number" class="text-success" style="font-size: 12rem;">0</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Order</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Last order number</span>
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
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5" hidden></div>
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="w-full d-flex justify-content-center align-items-center">
                        <h1 id="order-number" class="text-primary" style="font-size: 12rem;">0</h1>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Menu options</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Manage the queue</span>
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
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5" hidden></div>
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <div class="d-flex flex-column gap-5">
                        <button id="btn-order" class="btn btn-primary btn-lg">Order</button>
                        <button id="btn-next" class="btn btn-success btn-lg">Next</button>
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

@push('js')
<script type="module">
    import { io } from "https://cdn.socket.io/4.7.5/socket.io.esm.min.js";
    const elNumberCurrent = document.getElementById("current-order-number");
    const elNumber = document.getElementById("order-number");
    const btnOrder = document.getElementById("btn-order");
    const btnNext = document.getElementById("btn-next");

    const socket = io('http://localhost:3000');

    socket.on('connect', () => {
        console.log('Connected to server');
    });

    socket.on('disconnect', () => {
        console.log('Disconnected from server');
    });

    socket.on('newOrder', (message) => {
        console.log('Message received from server:', message);
        elNumber.innerHTML = parseInt(message);
    });

    socket.on('newCurrent', (message) => {
        console.log('Message received from server:', message);
        elNumberCurrent.innerHTML = parseInt(message);
    });

    btnOrder.addEventListener("click", function() {
        let number = parseInt(elNumber.innerText);
        socket.emit("nextOrder", number + 1);
    })

    btnNext.addEventListener("click", function() {
        let number = parseInt(elNumberCurrent.innerText);
        socket.emit("nextCurrent", number + 1);
    })
</script>
@endpush