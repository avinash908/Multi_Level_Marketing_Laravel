<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/sweetalert2/dist/sweetalert2.min.css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('/')}}css/app.min.css">
    <style>
        .table-responsive{
            overflow: auto;
        }
        td {
            white-space: nowrap;
        }

        th {
            white-space: nowrap;
        }

        .text-primary {
            color: white !important
        }

        .btn-primary {
            background-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #28a745;
        }

        .form-control {
            margin-bottom: 2rem;
        }

        option {
            background: #171615
        }
        .list-group-item {
            margin-bottom: 1px;
            background-color: #00000026;
        }
        .card-body{
            padding: 1.2rem;
        }
    </style>
    @section('css')
</head>

<body data-sa-theme="3">

    <main class="main">
        <div class="page-loader">
            <div class="page-loader__spinner">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>

        @include('layouts.admin.navbars.navbar')

        @include('layouts.admin.navbars.sidebar')

        <section class="content">
            @yield('content')
        </section>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Confirm Modal</h5>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-danger">Are you sure want delete?</h3>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="" method="post" id="delete_form">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>



    <script src="{{asset('/')}}vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

    <!-- Vendors: Data tables -->
    <script src="{{asset('/')}}vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- <script src="{{asset('/')}}vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/flot/jquery.flot.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/peity/jquery.peity.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script> -->

    <!-- <script src="{{asset('/')}}demo/js/flot-charts/curved-line.js"></script>
    <script src="{{asset('/')}}demo/js/flot-charts/line.js"></script>
    <script src="{{asset('/')}}demo/js/flot-charts/dynamic.js"></script>
    <script src="{{asset('/')}}demo/js/flot-charts/chart-tooltips.js"></script>
    <script src="{{asset('/')}}demo/js/other-charts.js"></script>
    <script src="{{asset('/')}}demo/js/jqvmap.js"></script> -->

    <!-- App functions and actions -->
    <script src="{{asset('/')}}js/app.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }
                });
            });


        });


        $(document).on('click', '.cb-value', function() {
            var mainParent = $(this).parent('.toggle-btn');
            if ($(mainParent).find('input.cb-value').is(':checked')) {
                $(mainParent).addClass('active');

                $(this).attr('checked', 'checked');
            } else {
                $(mainParent).removeClass('active');
                $(this).removeAttr('checked');
            }

        })

        loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $(document).on('click', '.delete_btn', function() {
            var url = $(this).attr('data-route');

            $("#delete_form").attr('action', url);

            $('#delete_modal').modal('show');
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        <?php 
            if(!isset($referral_page)){
        ?>
        $(document).ready(function() {
            $('table').DataTable({
                "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                    $("td:first", nRow).html(iDisplayIndex + 1);
                    return nRow;
                },
            });
        });

        <?php } ?>
    </script>
    
    @if(session()->has('success'))
    <script>
            swal({
            title: 'Success!',
            text: '<?=session()->get('success')?>',
            type: 'success',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-sm btn-light',
            background: 'rgba(0, 0, 0, 0.96)'
        })
    </script>
    @endif
    @yield('js')
    @stack('js')

    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>