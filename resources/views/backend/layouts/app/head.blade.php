<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Umair Rathore') }}</title>--}}
    <title>GossipGirls - @yield('title')</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon')}}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <!--Datatable-->
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('admin/assets/css/umair-rathore.css')}}?v=1.0.0" rel="stylesheet" />
{{--    <link href="{{ asset('admin/assets/css/theme.css')}}" rel="stylesheet" />--}}
</head>
<style>
    body, html {
        height: 100%;
    }
    .bg {
        /* The image used */
        background-image: url(admin/assets/img/authbanner.jpeg);

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

