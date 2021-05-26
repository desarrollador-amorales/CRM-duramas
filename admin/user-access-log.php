<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin | User Access Log </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />


    <link href="../assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <!--Estilo de tabla y fechas en los campos-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />

</head>

<body class="">
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <div class="page-title"> <i><a href="home.php" class="icon-custom-left"></a></i>
                <h3>Administracion de Acceso de Usuarios</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><span class="semi-bold">Acceso de Usuarios</span></h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#grid-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="grid-body ">

                            <div class="row well input-daterange">
                                <div class="col-sm-2">
                                    <label class="control-label">Desde</label>
                                    <input class="form-control datepicker" type="text" name="initial_date"
                                        id="initial_date" value="<?php echo date("Y-m-01")?>" placeholder="yyyy-mm-dd"
                                        style="height: 20px;" />
                                </div>

                                <div class="col-sm-2">
                                    <label class="control-label">Hasta</label>
                                    <input class="form-control datepicker" type="text" name="final_date" id="final_date"
                                        value="<?php echo date("Y-m-t")?>" placeholder="yyyy-mm-dd"
                                        style="height: 20px;" />
                                </div>

                                <div class="col-sm-2">
                                    <button class="btn btn-info btn-xs" type="submit" name="filter" id="filter"
                                        style="margin-top: 25px" data-toggle="tooltip" data-placement="top"
                                        title="Filtrar">
                                        <i class="fa fa-filter"></i></button>
                                </div>

                                <div class="col-sm-12 text-danger" id="error_log"></div>
                            </div>


                            <table class="table table-hover table-condensed" id="table-user-access">
                                <thead>
                                    <tr>
                                        <br>
                                        <br>
                                        <th>#</th>
                                        <th>#Uid</th>
                                        <th>Usuario</th>
                                        <th>Fecha Login</th>
                                        <th>Hora Login</th>
                                        <th>Email </th>
                                        <th>IP</th>
                                        <th>Mac id</th>
                                        <th>Ciudad</th>
                                        <th>Pais</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="addNewRow"></div>
    </div>
    <!-- BEGIN CHAT -->

    </div>

    <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

    <!--incio nuevo-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>



    <script type="text/javascript">
    load_data("", ""); // first load

    function load_data(initial_date, final_date) {
        var ajax_url = "jquery-ajax-usercheck.php";

        $('#table-user-access').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "Todo"]
            ],
            "ajax": {
                "url": ajax_url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    "action": "fetch_users",
                    "initial_date": initial_date,
                    "final_date": final_date
                },
                "dataSrc": "records"
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "columns": [{
                    "data": "counter"
                },
                {
                    "data": "user_id"
                },
                {
                    "data": "username"
                },
                {
                    "data": "logindate"
                },
                {
                    "data": "logintime"
                },
                {
                    "data": "email"
                },
                {
                    "data": "ip"
                },
                {
                    "data": "mac"
                },
                {
                    "data": "city"
                },
                {
                    "data": "country"
                }
            ]
        });
    }

    $("#filter").click(function() {
        var initial_date = $("#initial_date").val();
        var final_date = $("#final_date").val();
        //var gender = $("#gender").val();

        if (initial_date == '' && final_date == '') {
            $('#table-user-access').DataTable().destroy();
            load_data("", ""); // filter immortalize only
        } else {
            var date1 = new Date(initial_date);
            var date2 = new Date(final_date);
            var diffTime = Math.abs(date2 - date1);
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (initial_date == '' || final_date == '') {
                $("#error_log").html("Advertencia: Debe seleccionar la fecha inicial y final.</span>");
            } else {
                if (date1 > date2) {
                    $("#error_log").html("Advertencia: La fecha Hasta debe ser mayor quela fecha Desde .");
                } else {
                    $("#error_log").html("");
                    $('#table-user-access').DataTable().destroy();
                    load_data(initial_date, final_date);
                }
            }
        }
    });

    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });
    </script>

    <!--fin de lo nuevo-->


    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>

    <!--fin de lo nuevo-->

</body>

</html>