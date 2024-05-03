<!DOCTYPE html>
<html lang="en">
<x-head />
@stack('css')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-teacher.header />

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <x-sidebar-skin/>

            <x-right-sidebar/>


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <x-teacher.sidebar />
            <!-- partial -->
            <div class="main-panel">

                <!-- content-wrapper start -->
                @yield('content')
                <!-- content-wrapper ends -->

                <x-footer />
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <x-foot />
    @include('flashy::message')
    @stack('js')

</body>

</html>
