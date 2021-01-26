<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
</head>
<body>
@include('modules.front.parts.top-banner')
    @include('modules.front.parts.navigation')
<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
        @yield('content')
</main>
@include('modules.front.parts.footer')
@include('modules.front.parts.scripts')
</body>
</html>
