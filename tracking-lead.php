<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

$mostrarModalTrackLead=false;

$id_tracking_lead=(isset($_POST['tracking_lead_id']))?$_POST['tracking_lead_id']:""; 
$name_lead=(isset($_POST['name_lead']))?$_POST['name_lead']:""; 
$mobile_number=(isset($_POST['mobile_number']))?$_POST['mobile_number']:""; 
$email_lead=(isset($_POST['email_lead']))?$_POST['email_lead']:""; 
$city_warehouse=(isset($_POST['city_warehouse']))?$_POST['city_warehouse']:""; 
$date_create=(isset($_POST['date_create']))?$_POST['date_create']:""; 

$accion=(isset($_POST['accion']))?$_POST['accion']:""; // validar si accion tiene valor.

switch($accion){
    case 'btnEditarRegistro':
        $mostrarModalTrackLead=true;
    break;
}


$email=$_GET['email_user_name'];

if(isset($_GET['status_name'])){
    $title=$_GET['status_name'];
    
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Seguimiento Lead </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />


    <!--Estilo de tabla y fechas en los campos-->


    <link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <!--librerias para dar estilos a la fecha-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

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
            <div class="page-title"> <i><a href="dashboard.php" class="icon-custom-left"></a></i>
                <h3><b><?php echo $title?></b></h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><span class="semi-bold"><b> Administracion de Clientes en <?php echo $title?>
                                    </b></span></h4>
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
                                    <input class="form-control datepicker" type="text" name="min" id="min"
                                        value="<?php echo date("Y-m-01")?>" placeholder="yyyy-mm-dd"
                                        style="height: 20px;" />
                                </div>

                                <div class="col-sm-2">
                                    <label class="control-label">Hasta</label>
                                    <input class="form-control datepicker" type="text" name="max" id="max"
                                        value="<?php echo date("Y-m-t")?>" placeholder="yyyy-mm-dd"
                                        style="height: 20px;" />
                                </div>

                                <div class="col-sm-12 text-danger" id="error_log"></div>
                            </div>

                            <table id="example-date" class="display nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th><label class="control-label"><b></b></label></th>
                                        <th><label class="control-label"><b>Nombre</b></label></th>
                                        <th><label class="control-label"><b>Teléfono</b></label></th>
                                        <th><label class="control-label"><b>Ciudad</b></label></th>
                                        <!--<th style="width:30%"><label class="control-label"><b>Usuario</b></label></th>-->
                                        <th><label class="control-label"><b>Canal</b></label></th>
                                        <th><label class=" control-label"><b>Campaña</b></label></th>
                                        <th><label class=" control-label"><b># Proformas</b></label></th>
                                        <th><label class=" control-label"><b>Total $</b></label></th>
                                        <th><label class=" control-label"><b>Facturas #</b></label></th>
                                        <th><label class=" control-label"><b>Total $</b></label></th>
                                        <th><label class=" control-label"><b>Fecha</b></label></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ret=mysqli_query($con,"select * from tracking_lead where email_user_name='".$email."' and status_name='".$title."'");
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['tracking_lead_id_gen'];
												?>
                                    <tr>
                                        <td>
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <input type="hidden" id="tracking_lead_id" name="tracking_lead_id"
                                                    class="form-control"
                                                    value="<?php echo $row['tracking_lead_id_gen']?>">

                                                <input type="hidden" id="name_lead" name="name_lead"
                                                    class="form-control" value="<?php echo $row['name_lead']?>">

                                                <input type="hidden" id="city_warehouse" name="city_warehouse"
                                                    class="form-control" value="<?php echo $row['city_warehouse']?>">

                                                <input type="hidden" id="email_lead" name="email_lead"
                                                    class="form-control" value="<?php echo $row['email_lead']?>">

                                                <input type="hidden" id="mobile_number" name="mobile_number"
                                                    class="form-control" value="<?php echo $row['mobile_number']?>">

                                                <input type="hidden" id="date_create" name="date_create"
                                                    class="form-control" value="<?php echo $row['date_create']?>">

                                                <button type="submit" class="btn btn-info btn-xs" data-placement="top"
                                                    title="Detalles" value="btnEditarRegistro" name="accion"><i
                                                        class="fa fa-search-plus text-white mr-0"></i>
                                                </button>

                                            </form>
                                        </td>

                                        <?php $req=mysqli_query($con, "select description from campaing where name='".$row['form_id']."'");
                                          $name_campaing=mysqli_fetch_array($req);
                                        ?>

                                        <td><strong><?php echo $row['name_lead'];?></strong></td>
                                        <td><strong><?php echo $row['mobile_number'];?></strong></td>
                                        <td><strong><?php echo $row['city_warehouse'];?></strong></td>
                                        <td><strong><?php echo $row['platform'];?></strong></td>
                                        <td><strong><?php echo $name_campaing['description'];?></strong></td>
                                        <td><strong><?php echo $row['proforma'];?></strong></td>
                                        <td><strong><?php echo $row['proforma_total'];?></strong></td>
                                        <td><strong><?php echo $row['factura'];?></strong></td>
                                        <td><strong><?php echo $row['factura_total'];?></strong></td>
                                        <td><strong><?php echo $row['date_create'];?></strong></td>

                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>
                                </tbody>
                            </table>

                        </div>

                        <div class="modal fade-show" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" aria-modal="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-2 bg-light">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span>

                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"><b><?php echo $title; ?></b></h4>

                                    </div>
                                    <div class="modal-body bg-light">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#dataLeadTab"
                                                        aria-controls="dataLeadTab" role="tab"
                                                        data-toggle="tab"><b>Datos Principales</b></a>

                                                </li>
                                                <li role="presentation"><a href="#notasTab" aria-controls="notasTab"
                                                        role="tab" data-toggle="tab"><b>Notas</b></a>

                                                </li>
                                                <li role="presentation"><a href="#browseTab" aria-controls="browseTab"
                                                        role="tab" data-toggle="tab"><b>Estados</b></a>

                                                </li>
                                                <li role="presentation"><a href="#browseTab" aria-controls="browseTab"
                                                        role="tab" data-toggle="tab"><b>Proformas</b></a>

                                                </li>
                                                <li role="presentation"><a href="#browseTab" aria-controls="browseTab"
                                                        role="tab" data-toggle="tab"><b>Facturas</b></a>

                                                </li>
                                                <li role="presentation"><a href="#browseTab" aria-controls="browseTab"
                                                        role="tab" data-toggle="tab"><?php echo $_SESSION['name'];?></a>

                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="dataLeadTab">
                                                    <form class="pt-3">
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label mb-0 pr-0">Nombre:</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            value="<?php echo $name_lead;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label mb-0 pr-0">Ciudad:</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="email"
                                                                            class="form-control form-control-sm"
                                                                            value="<?php echo $city_warehouse;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label mb-0 pr-0">Email:</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            value="<?php echo $email_lead;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label mb-0 pr-0">Teléfono:</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            value="<?php echo $mobile_number;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label mb-0 pr-0">Fecha:</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            value="<?php echo $date_create;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="notasTab">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!--<form id="frmNota" name="frmNota">-->
                                                            <div class="form-group">
                                                                <label for="men_not" class="control-label"><b>
                                                                        Agregar nota</b></label>
                                                                <textarea class="form-control" name="note_description"
                                                                    id="note_description" rows="4"></textarea>
                                                                <input type="hidden" name="user_name" id="user_name"
                                                                    value="<?php echo $_SESSION['name'];?>" readonly="">

                                                                <input type="hidden" name="tracking_lead_id_gen"
                                                                    id="tracking_lead_id_gen"
                                                                    value="<?php echo $id_tracking_lead;?>" readonly="">
                                                            </div>
                                                            <div class="col-12 text-center mb-4">
                                                                <button type="submit" class="btn btn-sm btn-info"
                                                                    name="save_note" id="save_note">Guardar</button>
                                                            </div>
                                                            <!--</form>-->
                                                            <hr>
                                                            <div class="col-12 pl-0 pr-0">
                                                                <h4 class="p-2 mb-0 text-center text-black">
                                                                    <b>HISTORIAL</b>
                                                                </h4>
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table-lead-notes">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><b>Fecha</b></th>
                                                                                <th><b>Usuario</b></th>
                                                                                <th><b>Nota</b></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <!-- <tbody id="notasHistorial">
                                                                        </tbody>-->
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i
                                                class="fa fa-reply"></i> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="addNewRow"></div>
    </div>
    <!-- BEGIN CHAT -->

    </div>
    <!--incio nuevo-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



    <script type="text/javascript">
    var minDate, maxDate;

    // funcion de filtrado de acuerdo a la columna en donde este la fecha
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[10]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });

        // DataTables initialisation
        var table = $('#example-date').DataTable({
            "scrollX": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
    </script>

    <script>
    
    function save_and_load_data(note_description,user_name, tracking_lead_id_gen) {
        var ajax_url = "jquery-ajax-history-notes.php";

        $('#table-lead-notes').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "processing": false,
            "serverSide": true,
            "stateSave": false,
            "cache":false,
            "bFilter": false,
            "paging": false,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "Todo"]
            ],
            "ajax": {
                "url": ajax_url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    "action": "fetch_notes_lead",
                    "note_description": note_description,
                    "user_name": user_name,
                    "tracking_lead_id_gen": tracking_lead_id_gen
                },

                "dataSrc": "records"
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "columns": [{
                    "data": "date_create"
                },
                {
                    "data": "user_name"
                },
                {
                    "data": "note"
                }
            ]
        });
    }

    var user_name = $("#user_name").val();
    var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();
    $('#table-lead-notes').DataTable().destroy(); // reinicializa la tabla
    save_and_load_data("",user_name, tracking_lead_id_gen); // first load


    $("#save_note").click(function() {
        //var user_name = $("#user_name").val();
        var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();
        //var note_description = $("#note_description").val();
        var user_name = $("input[name='user_name']").val();
        var note_description = $("textarea[name='note_description']").val();

        if (note_description == "") {
            alert("Debe ingresar su nota");
            $("#note_description").focus();
            $('#table-lead-notes').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data("",user_name, tracking_lead_id_gen);
        } else {
            $('#table-lead-notes').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data(note_description, user_name, tracking_lead_id_gen);
            document.getElementById("note_description").value = "";
            $("#note_description").focus();

            $('#table-lead-notes').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data("",user_name, tracking_lead_id_gen);
        }
        
    });
    </script>

    <?php if($mostrarModalTrackLead) {?>
    <script>
    $('#myModal').modal('show');
    </script>
    <?php }?>

    <!--fin de lo nuevo-->

</body>

</html>