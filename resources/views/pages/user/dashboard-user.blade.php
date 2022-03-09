@extends('layouts.user')

@section('content')




<div class="container-fluid">

    <style>
        .coba{
            font-size: 8px !important;
        }
    </style>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="coba text-xs font-weight-bold text-primary text-uppercase mb-1">
                               TOTAL RUANGAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_ruangan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-sm fa-1 text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" coba text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL RUANGAN DIPINJAM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_ruangan_yang_bisa_dipinjam }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-sm fa-1x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" coba text-xs font-weight-bold text-warning text-uppercase mb-1">
                                TOTAL RUANGAN YANG BISA DIPINJAM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_ruangan_yang_tidak_bisa_dipinjam }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-1x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->



</div>
@endsection
