<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>
<x-admin.header :user="auth()->user()"/>
<main class="u-main">
    <x-admin.sidebar :user="auth()->user()"/>
    <div class="u-content">
        <div class="u-body">
            @yield('content')
        </div>
        <x-admin.footer/>
    </div>
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>
