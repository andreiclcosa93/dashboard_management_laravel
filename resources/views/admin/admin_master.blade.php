@include('admin.body.head')

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <div id="layout-wrapper">

          @include('admin.body.header')

            <!-- ========== Left Sidebar Start ========== -->
           @include('admin.body.sidebar')
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->
            <div class="main-content">

               @yield('admin')
                <!-- End Page-content -->

                @include('admin.body.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('admin.body.scripts')
