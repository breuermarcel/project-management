<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex"/>
    <meta name="google" content="notranslate">

    <title>Project Management Tool</title>

    @include("project-management::components.styling")
    @include("project-management::components.scripts")
</head>
<body id="bm__body">

@include('project-management::components.navbar')

<div class="container-fluid">
    <div class="row">
        @include('project-management::components.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-sm-3 my-2" id="bm__main">
            <div id="bm__searchResultsContainer"></div>

            @include("project-management::components.status")

            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
