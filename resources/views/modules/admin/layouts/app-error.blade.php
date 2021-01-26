<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>
<x-admin.error-header/>
<main class="u-error-content-wrap">
    @yield('content')
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>
