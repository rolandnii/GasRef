<!--Jquery -->
<script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
<!--Data tables js -->
{{-- <link rel="stylesheet" href="{{ asset('assets/datatable/datatables.min.js') }}">
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script> --}}

@stack('i-script')
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
