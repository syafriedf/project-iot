@extends('template.v_template')

@section('content')


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Monitoring Machine Albea Surabaya</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                                Running</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">1</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fan fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">
                                                NOT Running</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">2</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-power-off fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->

                        <div class=" col-xl-4 col-lg-6 mb-4">

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="background: #32a852;">
                                    <h3 class="m-0 font-weight-bold" style="color: black;">Kautek-1</h3>
                                </div>
                                <div class="card-body">
                                    <h2 style="color: #32a852"><b>Running</b></h2>
                                    <p class="mb-0" style="color: black">Running Hours:   <b style="font-size: 19px">  5 Hours</b></p>
                                    <p class="mb-0"  style="color: black">Downtime:    <b style="font-size: 19px;">-</b></p>
                                    <p class="mb-0"  style="color: black">Work Order: <b style="font-size: 19px;">  3000</b></p>
                                </div>
                            </div>

                        </div>


                        <div class=" col-xl-4 col-lg-6 mb-4">

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="background: #d42613;">
                                    <h3 class="m-0 font-weight-bold" style="color: black;">Kautek-2</h3>
                                </div>
                                <div class="card-body">
                                    <h2 style="color: #d42613"><b>Not Running</b></h2>
                                    <p class="mb-0" style="color: black">Running Hours:   <b style="font-size: 19px;">  6 Hours</b></p>
                                    <p class="mb-0"  style="color: black">Downtime:    <b style="font-size: 19px;color:#d42613 ">3 Hours</b></p>
                                    <p class="mb-0"  style="color: black">Work Order: <b style="font-size: 19px;">  8000</b></p>
                                </div>
                            </div>

                        </div>

                                 <div class=" col-xl-4 col-lg-6 mb-4">

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="background: #d42613;">
                                    <h3 class="m-0 font-weight-bold" style="color: black;">Kautek-3</h3>
                                </div>
                                <div class="card-body">
                                    <h2 style="color: #d42613"><b>Change Over Design</b></h2>
                                    <p class="mb-0" style="color: black">Running Hours:   <b style="font-size: 19px;">  6 Hours</b></p>
                                    <p class="mb-0"  style="color: black">Downtime:    <b style="font-size: 19px;">3 Hours</b></p>
                                    <p class="mb-0"  style="color: black">Work Order: <b style="font-size: 19px;">  8000</b></p>
                                </div>
                            </div>

                        </div>
                    </div>

@endsection()

               