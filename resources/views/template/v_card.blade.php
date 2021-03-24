                   
                    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">{{$count_mch_on}}</div>
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
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">{{$count_mch_off}}</div>
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

                    
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <!-- Content Row -->
                    <div class="row" id="card-u">

                        <!-- Content Column -->

                        @foreach ($get_opt as $data)
                            @php
                            $time1 = new DateTime($data->dwn_line[count($data->dwn_line)-1]->date_end);
                            $time2 = new DateTime($data->dwn_line[count($data->dwn_line)-1]->date_start);
                            $time3 = new DateTime();
                            $time_diff = $time2->diff($time3);
                            $time_now = $time1->diff($time3);

                            $downtime = $time_diff->h.' Hours '.$time_diff->i. ' Minutes ';
                            $run_hour = $time_now->h. ' Hours ' .$time_now->i. ' Minutes ';

                            $color = '#32a852';

                            if ($data->sts_line->sts_id == 0){
                                $run_hour = " - ";
                                $color = '#d42613';
                            }
                            else{
                                $downtime = " - ";
                                $color = '#32a852';
                            }
                            @endphp

                        <div class=" col-xl-4 col-lg-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4 the-card">
                                <div class="card-header py-3" style="background: <?php echo $color; ?>">
                                    <h3 class="m-0 font-weight-bold" style="color: black;">{{$data->mch_line->mch_name}}</h3>
                                </div>
                                <div class="card-body">
                                    <h2 style="color: <?php echo $color; ?>"><b>{{ $data->sts_line->sts_name }}</b></h2>
                                    <p class="mb-0" style="color: black">Running Hours:   <b style="font-size: 19px">{{$run_hour}}</b></p>
                                    <p class="mb-0"  style="color: Red">Downtime:    <b style="font-size: 19px;">{{$downtime}}</b></p>
                                    <p class="mb-0"  style="color: black">Work Order: <b style="font-size: 19px;">{{ $data->wop_line->wop_target }}</b></p>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>