<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/png" sizes="64x64" href="assets/images/fav.png"> -->
    <meta name="description" content="">

    <!-- og -->
    <meta property="og:description" content="" />
    <!-- boostrap -->
    <link rel="stylesheet" href="vendor/css/bootstrap/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="vendor/css/bootstrap/icons/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- css file -->

    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/utility/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mediaCss/media.css') }}">
    <title>{{ env('APP_NAME') }}</title>

</head>

<body class="cover-signup">
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

    @yield('content')


@include('partials.footer')
