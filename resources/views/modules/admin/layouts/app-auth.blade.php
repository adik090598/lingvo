<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>
<main class="d-flex flex-column u-hero u-hero--end mnh-100vh"
      style="background-image: url({{asset('modules/admin/assets/img-temp/bg/bg-1.png')}});">
    <div class="container py-11 my-auto">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6 offset-lg-3 mb-4 mb-md-0">
                @yield('content')
            </div>
        </div>
    </div>
    <x-admin.footer/>
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>
