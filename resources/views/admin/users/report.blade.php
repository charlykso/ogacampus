@extends('admin.layouts.wrapper')

@section('title', $title)
@section('content')

    <div class="content">
        <div class="container-fluid">
            <h2 class="font-weight-bold">{{$title}}</h2>
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <div class="card p-4 card-report rounded">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$reports['totalUser']}}</span>
                                    <span class="font-weight-light">All Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="fa fa-list"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-md-4">
                    <a href="#">
                        <div class="card p-4 card-report rounded">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$reports['activeUser']}}</span>
                                    <span class="font-weight-light">Active Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#">
                        <div class="card p-4 card-report rounded">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$reports['pendingUser']}}</span>
                                    <span class="font-weight-light">Inactive Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="fa fa-list"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="#">
                        <div class="card p-4 card-report rounded">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$verifiedUsers->total()}}</span>
                                    <span class="font-weight-light">Verified Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="#">
                        <div class="card p-4 card-report rounded">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{$unVerifiedUsers->total()}}</span>
                                    <span class="font-weight-light">Unverified Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="fa fa-list"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All User Report
                        </div>

                        <div class="card-body p-0">
                            <div class="container-fluid">
                                <div class="float-right bg-danger">
                                    <form action="{{route('dashboard')}}" method="get">
                                        <select name="rfilter" id="" class="form-control" style="width:100px" onchange="this.form.submit()">
                                            <option>2022</option>
                                            <option>2021</option>
                                            <option>2020</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="p-1">
                                <!-- Chart's container -->
                                <div id="chart" style="height: 400px;" class="w-100"></div>
                            </div>

                            <div class="justify-content-around mt-4 p-4 bg-light d-flex border-top d-md-down-none">
                                <div class="text-center">
                                    <div class="text-muted small">Total users</div>
                                    <div>{{$reports['totalUser']}} users</div>
                                </div>

                                <div class="text-center">
                                    <div class="text-muted small">Active Users</div>
                                    <div>{{$reports['activeUser']}} users</div>
                                </div>

                                <div class="text-center">
                                    <div class="text-muted small">Pending Activation</div>
                                    <div>{{$reports['pendingUser']}} users</div>
                                </div>

                                <div class="text-center">
                                    <div class="text-muted small">Total Deactivated</div>
                                    <div>{{$reports['deactivatedUser']}} users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                Users report
                        </div>

                        <div class="card-body p-0">
                            <div class="p-1">
                                <!-- Chart's container -->
                                <div class="chart-container">
                                    <div class="chart has-fixed-height" id="pie_basic" style="height: 400px;"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- Charting library -->
    <script src="{{asset('js/echarts.min.js')}}"></script>
    <!-- Chartisan -->
    <script src="{{asset('js/chartisan_echarts.js')}}"></script>
    <!-- Your application script -->
    <script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('user_report_chart')" + "?rfilter={{isset($_GET['rfilter'])? $_GET['rfilter'] : date('Y')}}"
    });


    const chart2 = new Chartisan({
        el: '#pie_basic',
        url: "@chart('user_report_chart_pie')",
        hooks: new ChartisanHooks()
            .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                .datasets('pie')
                .axis(true)
    });
    </script>

    @endpush
@endsection
