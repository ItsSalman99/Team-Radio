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
                                <img src="https://cdn-icons-png.flaticon.com/512/2975/2975883.png" alt=""
                                    style="width: 30px; filter:var(--image-primary-filter)">
                            </div>
                            <div>
                                <h3 class="fw-600 font-25px font-md-32px mb-1">230</h3>
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
                                <h3 class="fw-600 font-25px font-md-32px mb-1">20</h3>
                                <h6 class=" fw-400 font-14px m-0">Total Blocked Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                            <h3 class="card-title">
                                Users Growth Graph
                            </h3>
                            <select class="select-box select2Height-40px" data-placeholder="Select..."
                                data-minimum-results-for-search="Infinity" style=" max-width: 150px">
                                <option></option>
                                <option>Daily</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
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
                            <h5 class="card-title mb-0 flex-shrink-0">Active/InActive Users</h5>
                            <!-- <div class="tabs-style-1 width-100 width-lg-auto">
                                    <div class="tabs-links">
                                        <ul class="nav nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="tabv2-1-tab" data-bs-toggle="tab" data-bs-target="#tabv2-1" type="button" role="tab" aria-controls="tabv2-1" aria-selected="true">Monthly</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="tabv2-2-tab" data-bs-toggle="tab" data-bs-target="#tabv2-2" type="button" role="tab" aria-controls="tabv2-2" aria-selected="false" tabindex="-1">Weekly</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="tabv2-3-tab" data-bs-toggle="tab" data-bs-target="#tabv2-3" type="button" role="tab" aria-controls="tabv2-3" aria-selected="false" tabindex="-1">Today</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            <select class="select-box select2Height-40px" data-placeholder="Monday"
                                data-minimum-results-for-search="Infinity" style="min-width: 157px; max-width: 100px">
                                <option></option>
                                <option selected default>Active</option>
                                <option>InActive</option>
                            </select>
                        </div>
                        <br>
                        <div style="height: 350px; overflow-y: auto">
                            <ul class="bl-spacing-5px">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                <li>
                                    <div class="d-flex align-items-start align-items-lg-center trendingItems gap-2">
                                        <h3 class="font-18px mb-0 flex-shrink-0" style="width: 43px;">#<?php echo $i; ?>
                                        </h3>
                                        <div class="d-flex align-items-center flex-wrap gap-2 gap-lg-3">
                                            <!-- <img src="assets/images/product/1.jpg" alt="" style="width: 50px; height: 50px;box-shadow: 0px 0px 8px 0px #1F1F1F40; border:1px solid var(--bs-primary)" class="border-radius-6px" draggable="false" loading="lazy"> -->
                                            <div>
                                                <ul>
                                                    <li>
                                                        <a href="#" class="link-dark font-16px d-block text-truncate"
                                                            style="width: 190px;">
                                                            John Doe
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p class="fw-400 m-0 font-14px text-primary"><span
                                                        class=" fw-600">created_at:</span> 1 July 2023</p>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <?php } ?>



                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Body -->
    <div class="modal fade" id="addPromoteModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Add Promot Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3 p-md-5">
                    <div class="row g-4">

                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Discount Name</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Discount Code</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Discount Type</label>
                                <select class="select-box form-control" data-placeholder="Choose..."
                                    data-minimum-results-for-search="Infinity" aria-hidden="true">
                                    <option>Percentage</option>
                                    <option>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Discount amount</label>
                                <input type="number" class=" form-control">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Starts</label>
                                <input type="text" class=" form-control startDate">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group m-0">
                                <label for="">Ends</label>
                                <input type="text" class=" form-control endDate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Uses Type</label>
                                <select class="select-box form-control" data-placeholder="Choose..."
                                    data-minimum-results-for-search="Infinity" aria-hidden="true" id="discountLimit">
                                    <option>Unlimited</option>
                                    <option>Limited</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" id="showLimit">
                            <div class="form-group m-0">
                                <label for="">Limit</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <!-- <div class="col-12">
                                <div class="form-group m-0">
                                    <label for="">Discription</label>
                                    <textarea rows="10" class=" form-control" placeholder="Discription"></textarea>
                                </div>
                            </div> -->


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary extra-btn-padding-25"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary extra-btn-padding-25 fw-500">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Body -->
    <div class="modal fade" id="editRestaurantModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Edit Restaurant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3 p-md-5">
                    <div class="upload-image-box-v1 mb-6">
                        <label for="BBigImage1" class="BBigImage mx-auto" style="--width: 360; --height: 316px">
                            <img src="https://images.unsplash.com/photo-1555992457-b8fefdd09069?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                alt="image" id="bigBannerImage1" style="z-index: 8;">
                            <input type="file" id="BBigImage1" hidden=""
                                onchange="document.getElementById('bigBannerImage1').src = window.URL.createObjectURL(this.files[0])">
                            <i class="bi bi-camera-fill font-40px opacity-5" style="color: inherit;"></i>
                            <p class=" font-14px">Upload Your Image
                            </p>
                            <p class=" fst-italic font-13px text-danger">(360 x 316)</p>
                        </label>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <label for="">Restaurant Name</label>
                            <input type="text" class=" form-control" value="Japanese Sushi & Rolls">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Restaurant Email</label>
                            <input type="email" class=" form-control" value="info@gmail.com">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Restaurant Phone</label>
                            <input type="text" class=" form-control" value="+51 8390 388 838">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Restaurant Password</label>
                            <input type="password" class=" form-control" value="23435">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Latitude</label>
                            <input type="text" class=" form-control" value="23.32">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Longitude</label>
                            <input type="text" class=" form-control" value="23.42">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Address</label>
                            <input type="address" class=" form-control" value="Germany North Rhine-Westphalia">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary extra-btn-padding-25"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary extra-btn-padding-25 fw-500">Update</button>
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
            var options = {
                series: [{
                    name: 'Actual',
                    data: [{
                            x: '',
                            y: 1292,
                            goals: [{
                                name: 'Expected',
                                value: 1400,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 4432,
                            goals: [{
                                name: 'Expected',
                                value: 5400,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 5423,
                            goals: [{
                                name: 'Expected',
                                value: 5200,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6653,
                            goals: [{
                                name: 'Expected',
                                value: 6500,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 8133,
                            goals: [{
                                name: 'Expected',
                                value: 6600,
                                strokeHeight: 13,
                                strokeWidth: 0,
                                strokeLineCap: 'round',
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 7132,
                            goals: [{
                                name: 'Expected',
                                value: 7500,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 7332,
                            goals: [{
                                name: 'Expected',
                                value: 8700,
                                strokeHeight: 5,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6553,
                            goals: [{
                                name: 'Expected',
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6578,
                            goals: [{
                                name: 'Expected',
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6778,
                            goals: [{
                                name: 'Expected',
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6278,
                            goals: [{
                                name: 'Expected',
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FF8100'
                            }]
                        },
                        {
                            x: '',
                            y: 6878,
                            goals: [{
                                name: 'Expected',
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: '#FF8100'
                            }]
                        },
                    ]
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

                yaxis: {
                    show: true,

                },
                xaxis: {
                    categories: [
                        "Jan",
                        " Feb",
                        "Mar",
                        " Apr",
                        "May",
                        " Jun",
                        " July",
                        " Aug",
                        " Seb",
                        " Ocy",
                        " Nov",
                        " Dev",

                    ]
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    @endpush
@endsection
