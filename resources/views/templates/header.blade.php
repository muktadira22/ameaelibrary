<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AMEAeLibrary</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets') }}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets') }}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('assets') }}/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('assets') }}/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    {{-- <link href="{{ asset('assets') }}/vendor/morrisjs/morris.css" rel="stylesheet"> --}}

    <!-- Jquery UI -->
    <link href="{{ asset('assets') }}/vendor/jquery-ui/jquery-ui.min.css">
    <link href="{{ asset('assets') }}/vendor/jquery-ui/jquery-ui.theme.min.css">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Loader Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/custom-loader.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack("style")

</head>

<body style="background-color: #fff">

        @include('templates/navigation')
    <div id="wrapper">
        @yield('content')
    </div>

    @include("templates/loader")

    @include("templates/footer")
