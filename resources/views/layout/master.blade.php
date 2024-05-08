@include('inc.head')

<body>
    <!-- Start Switcher -->
    @include('inc.switcher')
    <!-- End Switcher -->
    
    <!-- Start::main-header-container -->
    @include('inc.header')
    <!-- End::main-header-container -->
    
     <!-- Start sidebar -->
     @include('inc.sidebar')
     <!-- End sidebar -->

    <!-- Start::app-content -->
        @yield('content')
    <!-- End::app-content -->

    <!-- Start Footer -->
    @include('inc.footer')
    <!-- End Footer -->
</body>
@include('inc.footerjs')
