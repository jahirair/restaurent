@include('admin.layouts.header');

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.layouts.topbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                                admin template</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- plugins:js -->
    <script src="{{ asset('public/admin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('public/admin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/admin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('public/admin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('public/admin') }}/assets/js/misc.js"></script>
    <script src="{{ asset('public/admin') }}/assets/js/settings.js"></script>
    <script src="{{ asset('public/admin') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('public/admin') }}/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
        jQuery('#customer_add').submit(function(e) {
            e.preventDefault();
            //alert('hello new');
            jQuery.ajax({
                url: "{{ url('store-customer') }}",
                data: jQuery('#customer_add').serialize(),
                type: 'post',
                success: function(result) {

                    jQuery('#message').html(result.msg);
                    jQuery('#customer_add')[0].reset();

                }
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.delete-customer', function() {

                var userURL = $(this).data('url');
                var trObj = $(this);

                if (confirm("Are you sure you want to delete this user?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            //alert(data.success);
                            trObj.parents("tr").remove();
                            $('#message').html(data.success);
                        }
                    });
                }

            });

        });
    </script>


    <script type="text/javascript">
        $('#searchUser').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('searchorderajax') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#userList').html(data);
                }
            })
        });
    </script>





</body>

</html>
