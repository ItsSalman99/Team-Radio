<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="{{ env('APP_NAME') }}" />
    <meta name="copyright" content="" />
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap/bootstrap.css') }}">
    <!-- data table -->
    <link rel="stylesheet" href="{{ asset('vendor/css/datatable/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/select2/select2-bootstrap-5-theme.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/css/datetime/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/tagify/tagify.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/css/icons/bootstrapIcons/css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/icons/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/icons/fontawesome/css/regular.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/icons/fontawesome/css/solid.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- css file -->

    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mediaCss/media.css') }}">
    @stack('extra-css')
</head>

<body>
    <!-- start side bar -->
    <!-- <div class="preloader position-fixed top-0 start-0 w-100 h-100 bg-white" style="
        z-index: 999999;
        background: url(assets/images/icons/loading-bg.svg) no-repeat
          center/cover;
      ">
        <div class="centercontent h-100 d-flex align-items-center justify-content-center flex-column gap-4">
            <img src="assets/images/logo.png" alt="" class="width-50 width-md-25" />
            <div class="fill-bar"></div>
            <img src="assets/images/icons/loading-bg2.svg" alt="" class="width-60 width-md-40 position-absolute top-50 start-50 rotate360" />
        </div>
    </div> -->

    <div id="layoutSidenav" class="d-flex height-100vh">
        @include('Admin.partials.sidebar')
        @include('Admin.partials.top-bar')



        @yield('content')

        </main>
    </div>
    </div>

    <!-- end side bar -->

    <!-- bootstrap js file -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="{{ asset('vendor/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ asset('vendor/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/js/datatable/dataTables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('vendor/js/datetime/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('vendor/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/js/tagify/tagify.min.js') }}"></script>
    <script src="{{ asset('vendor/js/tagify/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        function goBack() {
            window.history.back();
        };
        $(".whishbutton").click(function() {
            $(this).toggleClass("heartactive");
        });
        $('.select-box').select2({
            theme: 'bootstrap-5',
            templateResult: formatState,
            templateSelection: formatState
            // dropdownParent: $(".modal")
            // allowClear: true
            // dropdownCssClass: "testing",
        });
        $('.select2Checkbox').select2({
            theme: 'bootstrap-5',
            templateResult: formatState,
            templateSelection: formatState,
            dropdownCssClass: "CheckboxResult",
        });
        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.select-box').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).find('.modal-content'),
                templateResult: formatState,
                templateSelection: formatState,
            });
            $(this).find('.select2Checkbox').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).find('.modal-content'),
                templateResult: formatState,
                templateSelection: formatState,
                dropdownCssClass: "CheckboxResult",
            });
        })

        $('.withoutBorderSelectBox').select2({
            theme: 'bootstrap-5',
            dropdownCssClass: "withoutBorderSelectBoxDropdown",
        });
        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.select-box').select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).find('.modal-content')
            });
        })

        function formatState(opt) {
            if (!opt.id) {
                return opt.text;
            }
            var optimage = $(opt.element).attr('data-image');
            if (!optimage) {
                return opt.text;
            } else {
                var $opt = $(
                    '<span  class="d-flex align-items-center gap-2 flex-row-reverse justify-content-between" style="min-width:75px;"><img src="' +
                    optimage + '" style="width:30px" /> ' + opt.text + '</span>'
                );
                return $opt;
            }
        };
        $("body, .modal").on("scroll", function() {
            $(".selectDate, .selectTime, .startDate, .endDate").datetimepicker("hide");

        });
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    @stack('extra-js')


</body>

</html>
