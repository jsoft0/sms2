<!DOCTYPE html>
<html lang="en">
<x-head />
@stack('css')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-header />

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <x-sidebar-skin/>

            <x-right-sidebar/>


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <x-sidebar />
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
    @stack('js')

</body>

</html>
