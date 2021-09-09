@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                <div class="card border-0 shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="m-0 font-weight-bold">PENDAPATAN BULAN INI</div>
                    </div>
                    <div class="card-body">
                        <h5>{{ moneyFormat($revenueMonth) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">PENDAPATAN TAHUN INI</h6>
                </div>
                <div class="card-body">
                    <h5>{{ moneyFormat($revenueYear) }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">SEMUA PENDAPATAN</h6>
                </div>
                <div class="card-body">
                    <h5>{{ moneyFormat($revenueAll) }}</h5>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    PENDING
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-circle-notch fa-spin fa-2x" style="color: #4d72df"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-mr-2">
                                <div class="text-xs font weight-bold text-success text-uppercase mb-1">SUCCESS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $success }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x" style="color: #1cc88a"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-mr-2">
                                <div class="text-xs font weight-bold text-warning text-uppercase mb-1">EXPIRED</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $expired }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x" style="color: #f6c23e"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-mr-2">
                                <div class="text-xs font weight-bold text-danger text-uppercase mb-1">FAILED</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $failed }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x" style="color: darkred"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection