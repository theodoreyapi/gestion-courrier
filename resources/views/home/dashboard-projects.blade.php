@extends('layouts.master', [
    'title' => 'Tableau de bord',
])

@push('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- projects js -->
    <script src="{{ URL::asset('') }}assets/js/pages/dashboard-projects.init.js"></script>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Tableau de bord</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a>
                                </li>
                                <li class="breadcrumb-item active">Tableau de bord</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row project-wrapper">
                <div class="col-xxl-8">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                                <i data-feather="briefcase" class="text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-3">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                Total courrier</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="825">825</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                                <i data-feather="award" class="text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Courrier encours</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="725">725</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                                <i data-feather="clock" class="text-info"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-3">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                                Courrier traité</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                        data-target="100">100</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end row -->

                    {{-- <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Projects Overview</h4>
                                    <div>
                                        <button type="button" class="btn btn-soft-secondary btn-sm material-shadow-none">
                                            ALL
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm material-shadow-none">
                                            1M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm material-shadow-none">
                                            6M
                                        </button>
                                        <button type="button" class="btn btn-soft-primary btn-sm material-shadow-none">
                                            1Y
                                        </button>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-header p-0 border-0 bg-light-subtle">
                                    <div class="row g-0 text-center">
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="9851">0</span>
                                                </h5>
                                                <p class="text-muted mb-0">Number of Projects</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="1026">0</span>
                                                </h5>
                                                <p class="text-muted mb-0">Active Projects</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1">$<span class="counter-value"
                                                        data-target="228.89">0</span>k</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                <h5 class="mb-1 text-success"><span class="counter-value"
                                                        data-target="10589">0</span>h</h5>
                                                <p class="text-muted mb-0">Working Hours</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body p-0 pb-2">
                                    <div>
                                        <div id="projects-overview-chart"
                                            data-colors='["--vz-primary", "--vz-warning", "--vz-success"]'
                                            data-colors-minimal='["--vz-primary", "--vz-primary-rgb, 0.1", "--vz-primary-rgb, 0.50"]'
                                            data-colors-interactive='["--vz-primary", "--vz-info", "--vz-warning"]'
                                            data-colors-creative='["--vz-secondary", "--vz-warning", "--vz-success"]'
                                            data-colors-corporate='["--vz-primary", "--vz-secondary", "--vz-danger"]'
                                            data-colors-galaxy='["--vz-primary", "--vz-primary-rgb, 0.1", "--vz-primary-rgb, 0.50"]'
                                            data-colors-classic='["--vz-primary", "--vz-secondary", "--vz-warning"]'
                                            dir="ltr" class="apex-charts"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row --> --}}
                </div><!-- end col -->


            </div><!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
