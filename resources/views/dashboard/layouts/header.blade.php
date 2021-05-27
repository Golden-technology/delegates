<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;500;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">

    <style>
        * {
            direction: rtl;
            font-family: 'Tajawal', sans-serif;
        }
        
        #main-wrapper[data-layout=vertical][data-sidebartype=full] .page-wrapper {
            margin-left: unset;
            margin-right: 240px;
        }

        /* #main-wrapper.show-sidebar .left-sidebar{right:0} */

        @media max-width(900px) {
            .page-wrapper {
                margin-left: unset;
                margin-right : 240px;
            }
        }

        @media (max-width: 767px) {}
        .modal-header .btn-close {
            margin: unset
            
        }

        .box-title button , .box-title a {
            float: left !important
        }

        #search-result {
            position: absolute;
            background-color: #ebebec;
            left: 5%;
            width: 18%;
            padding: 15px;
            top: 46px;
            border-radius: 10px;
            display: none
        }

        #search-result p {
            border-bottom: 1px solid #cecece;
        }

        #search-result p a {
            color: #000
        }
    </style>

</head>
