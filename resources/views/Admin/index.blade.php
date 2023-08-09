@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Dashboard</h2>

        </div>
        <br>
        <br>

        <div class="row gx-3">

            <div class="col-6 col-lg-4 col-xl-3">
                <div class="card primary-border-hover">
                    <div class="card-body">
                        <div class="salesCard d-flex align-items-center gap-3">
                            <div class="icon flex-shrink-0">
                                <!-- <i class="fa fa-burger-soda font-28px text-primary"></i> -->
                                <img src="https://cdn-icons-png.flaticon.com/512/3239/3239045.png" alt=""
                                    style="width: 30px; filter:var(--image-primary-filter)">
                            </div>
                            <div>
                                <h3 class="fw-600 font-25px font-md-32px mb-1">
                                    {{ $totalUser }}
                                </h3>
                                <h6 class=" fw-400 font-14px m-0">Total Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 col-xl-3">
                <div class="card primary-border-hover">
                    <div class="card-body">
                        <div class="salesCard d-flex align-items-center gap-3">
                            <div class="icon flex-shrink-0">
                                <img src="https://cdn-icons-png.flaticon.com/512/3239/3239045.png" alt=""
                                    style="width: 30px; filter:var(--image-primary-filter)">
                            </div>
                            <div>
                                <h3 class="fw-600 font-25px font-md-32px mb-1">
                                    {{ $totalSupportUser }}
                                </h3>
                                <h6 class=" fw-400 font-14px m-0">Total Support Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 col-xl-3">
                <div class="card primary-border-hover">
                    <div class="card-body">
                        <div class="salesCard d-flex align-items-center gap-3">
                            <div class="icon flex-shrink-0">
                                <img src="https://cdn-icons-png.flaticon.com/512/3239/3239045.png" alt=""
                                    style="width: 30px; filter:var(--image-primary-filter)">
                            </div>
                            <div>
                                <h3 class="fw-600 font-25px font-md-32px mb-1">
                                    {{ $totalUserNames }}
                                </h3>
                                <h6 class=" fw-400 font-14px m-0">
                                    Total User Names
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                            <h3 class="card-title">
                                Users Growth Graph
                            </h3>
                            <!--<select class="select-box select2Height-40px" data-placeholder="Select..."-->
                            <!--    data-minimum-results-for-search="Infinity" style=" max-width: 150px">-->
                            <!--    <option></option>-->
                            <!--    <option>Daily</option>-->
                            <!--    <option>Monthly</option>-->
                            <!--    <option>Yearly</option>-->
                            <!--</select>-->
                        </div>

                        <br>
                        <div id="chart"></div>
                        <h3 class=" position-absolute top-50 font-18px font-weight-600 m-0 fst-italic"
                            style="writing-mode: tb-rl; transform: translateY(-50%) rotate(180deg);     left: 19px;">No. Of
                            Users</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-nowrap gap-lg-16 gap-xl-3">
                            <h5 class="card-title mb-0 flex-shrink-0">
                                Active Users
                            </h5>
                        </div>
                        <br>
                        <div style="height: 350px; overflow-y: auto">
                            <ul class="bl-spacing-5px">
                                @foreach($activeUsers as $user)
                                <li>
                                    <div class="d-flex align-items-start align-items-lg-center trendingItems gap-2">
                                        <h3 class="font-18px mb-0 flex-shrink-0" style="width: 43px;">
                                            #{{ $user->id }}
                                        </h3>
                                        <div class="d-flex align-items-center flex-wrap gap-2 gap-lg-3">
                                             <img src="{{asset($user->profile_picture)}}" alt="" style="width: 50px; height: 50px;box-shadow: 0px 0px 8px 0px #1F1F1F40; border:1px solid var(--bs-primary)" class="border-radius-6px" draggable="false" loading="lazy"> 
                                            <div>
                                                <ul>
                                                    <li>
                                                        <a href="#" class="link-dark font-16px d-block text-truncate"
                                                            style="width: 190px;">
                                            {{ $user->getName() }}
                                                </a>
                                            </li>
                                        </ul>
                                                <p class="fw-400 m-0 font-14px text-primary"><span
                                                        class=" fw-600">created_at:</span> 
                                                {{ date('d, F, Y', strtotime($user->created_at)) }} </p>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-nowrap gap-lg-16 gap-xl-3">
                            <h5 class="card-title mb-0 flex-shrink-0">
                                In-Active Users
                            </h5>
                        </div>
                        <br>
                        <div style="height: 350px; overflow-y: auto">
                            <ul class="bl-spacing-5px">
                                @foreach($inactiveUsers as $user)
                                <li>
                                    <div class="d-flex align-items-start align-items-lg-center trendingItems gap-2">
                                        <h3 class="font-18px mb-0 flex-shrink-0" style="width: 43px;">
                                            #{{ $user->id }}
                                        </h3>
                                        <div class="d-flex align-items-center flex-wrap gap-2 gap-lg-3">
                                             <img src="{{asset($user->profile_picture)}}" alt="" style="width: 50px; height: 50px;box-shadow: 0px 0px 8px 0px #1F1F1F40; border:1px solid var(--bs-primary)" class="border-radius-6px" draggable="false" loading="lazy"> 
                                            <div>
                                                <ul>
                                                    <li>
                                                        <a href="#" class="link-dark font-16px d-block text-truncate"
                                                            style="width: 190px;">
                                            {{ $user->getName() }}
                                                </a>
                                            </li>
                                        </ul>
                                                <p class="fw-400 m-0 font-14px text-primary"><span
                                                        class=" fw-600">created_at:</span> 
                                                {{ date('d, F, Y', strtotime($user->created_at)) }} </p>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('extra-js')
        <script>
        
            window.Promise ||
                document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
                )
            window.Promise ||
                document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
                )
            window.Promise ||
                document.write(
                    '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
                )
        </script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var userChartData = @json(userChart());

            var options = {
                series: [{
                    name: 'Actual',
                    data: userChartData.map(user => ({
                        x: user.month,
                        y: user.count,
                        goals: [{
                            name: 'Expected',
                            value: user.count * 10, // You can update the expected value if needed
                            strokeHeight: 5,
                            strokeColor: '#FF8100'
                        }]
                    }))
                }],
                chart: {
                    height: 350,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '60%'
                    }
                },
                colors: ['#d1a022'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false,

                },
                xaxis: {
                    categories: userChartData.map(user => user.month) // Update x-axis categories
                },
                yaxis: {
                    show: true,

                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    @endpush
@endsection
