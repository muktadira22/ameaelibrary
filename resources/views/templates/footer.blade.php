
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>

    <!-- Jquery UI -->
    <script src="{{ asset('assets') }}/vendor/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets') }}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    {{-- <script src="{{ asset('assets') }}/vendor/raphael/raphael.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/vendor/morrisjs/morris.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/data/morris-data.js"></script> --}}

     <!-- DataTables JavaScript -->
    <script src="{{ asset('assets') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Vue Core -->
    <script src="{{ asset('assets') }}/vendor/vue/vue.min.js"></script>

    <!-- Axios Core -->
    <script src="{{ asset('assets') }}/vendor/axios/axios.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets') }}/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        var baseUrl = "http://localhost:8000/api/v1/";
        var idUser = "{{ Auth::id() }}";
        localStorage.setItem("api_token", "{{ Auth::user()->api_token }}");
    </script>

    @stack("script")

</body>

</html>
