@extends('template.v_template')

@section('content')

                <div class="home-u">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Monitoring Machine Albea Surabaya<b>( Welcome {{ auth()->user()->opt_name}} )</b></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exam"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="modal fade" id="exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Reason</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Change Over the Design
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Maintenance
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Shifting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked>
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Not Connection
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked>
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Sparepart change
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>


                    <div id="disini">
             
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script language="javascript" type="text/javascript">


                (function worker() {
                $.ajax({
                    url: '/dash', 
                    success: function(data) {
                    $('#disini').html(data);
                    },
                    complete: function() {
                    setTimeout(worker, 1000);
                    }
                });
                })();

                </script>

@endsection()

               