<!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/end/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/end/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/end/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/end/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/end/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/end/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/end/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/end/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="/end/assets/libs/flot/excanvas.js"></script>
    <script src="/end/assets/libs/flot/jquery.flot.js"></script>
    <script src="/end/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/end/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/end/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/end/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/end/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/end/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    @yield('scripts')
    {{-- declare other file script use private --}}
    @stack('js')
