<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Akadem.kz</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/education_icon.svg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('modules.front.parts.styles')
</head>
<body>
<div class="container-fluid">
    @yield('content')
</div>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
