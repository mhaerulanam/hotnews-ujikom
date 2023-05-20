<!DOCTYPE html>
<html lang="en">

@include('BE.layouts.url-css')

<body>
    <div id="app">
        @include('BE.layouts.sidebar')
        <div id="main">
            @yield('content')
            @include('BE.layouts.footer')
        </div>
    </div>
    @include('BE.layouts.url-js')
</body>

</html>
