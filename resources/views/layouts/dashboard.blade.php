<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.dashboard._head')
        @yield('styles')
    </head>
    <body>
        @include('partials.dashboard._preloader')
        <div id="wrapper">
            @include('partials.dashboard._nav')
            <div id="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
                @include('partials.dashboard._footer')
            </div>
        </div>
        @include('partials.dashboard._javascript')
        @yield('scripts')
    </body>
</html>
