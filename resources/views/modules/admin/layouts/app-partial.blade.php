<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>
<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
    <div class="container py-11 my-auto">
        @yield('content')
    </div>
    <x-admin.footer/>
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>