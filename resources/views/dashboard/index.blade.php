@extends('dashboard.layouts.app')


@section('content')
<!-- ============================================================== -->
            <!-- Three charts -->
            <!-- ============================================================== -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">العملاء</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-success">{{ $customers }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">المناديب</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash2"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-purple">{{ $delegates }}</span></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
@endsection