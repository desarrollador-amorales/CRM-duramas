<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

$txt_name=(isset($_POST['txt_name']))?$_POST['txt_name']:"";
$txt_reparto=(isset($_POST['txt_reparto']))?$_POST['txt_reparto']:null;
//$txt_parent_category=(isset($_POST['txt_parent_category']))?$_POST['txt_parent_category']:null;

$accion=(isset($_POST['accion']))?$_POST['accion']:""; // validar si accion tiene valor.

$error=array();

$accionAgregar =$accionCancelar=""; // manera para habilitar los botones
//$accionModificar=$accionEliminar=$accionCancelar="disabled"; //manera para desahilitar los botones
$mostrarCloseModal=false;

switch($accion){ // evalua las acciones que envia el formulario al presionar los botones del mismo..
    case 'btnAgregar':


        mysqli_query($con,"insert into warehouse(name,distribution) values('$txt_name','$txt_reparto')");

        //header('#');
        $mostrarCloseModal=true;

        //echo "Presionaste btnAgregar";
    break;
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin | Administracion de Locales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <!--formato tabla-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

    <!-- fin formato tabla-->

    <!-- nuevo alerta-->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--nuevo fin-->

    <style>

</style>

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
            <div class="modal-body">Widget settings form goes here</div>
        </div>
        <div class="clearfix"></div>
        <div class="content">

            <div class="page-title"> <i> <a href="home.php" class="icon-custom-left"></a> </i>

                <h3>Administracion de Locales</h3>
            </div>

            <div class="pull-right">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <span class="fa fa-plus"></span> Añadir Local</button>

                <p></p>
                <p></p>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel"><b>Local</b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label"><b>Nombre:</b></label>
                                        <input class="form-control" required type="text" name="txt_name" value=""
                                            placeholder="" id="txt_name">
                                        <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^ para mostrar la informacion que nosotros enviamos a traves del formulario y no se pierda-->
                                        <br>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label"><b>Reparto:</b></label>
                                        <select class="form-control" name="txt_reparto" id="txt_reparto" required>
                                            <option value="">Seleccione</option>
                                            <option value="Naipe">Naipe</option>
                                            <option value="Shark Tank">Shark Tank</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-success" <?php echo $accionAgregar?> value="btnAgregar"
                                    type="submit" name="accion">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Modal -->

            <!--Modal aviso-->
            <div class="modal" id="closeModal-old" tabindex="-1" ole="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 class="modal-title">CRM Duramas</h2>
                        </div>
                        <div class="modal-body">
                            <p>El local fue registrado con exito!.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="closeModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Listo!</h4>
                            <p>El local se ha registrado correctamente.</p>
                            <button class="btn btn-success" data-dismiss="modal"><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal aviso-->

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                                    <h4>Detalles de Locales</h4>
                                    <div class="tools"> <a href="javascript:;" class="collapse"></a>
                                        <a href="#grid-config" data-toggle="modal" class="config"></a>
                                        <a href="javascript:;" class="reload"></a>
                                        <a href="javascript:;" class="remove"></a>
                                    </div>
                                </div>
                                <div class="grid-body no-border">

                                    <table id="manage-warehouse" class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th><label class="control-label"><b>#</b></label></th>
                                                <th><label class="control-label"><b>Nombre</b></label></th>
                                                <th><label class="control-label"><b>Reparto</b></label></th>
                                                <th><label class="control-label"><b>Accion</b></label></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ret=mysqli_query($con,"select * from warehouse");
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['id_warehouse_gen'];
												?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['distribution'];?></td>

                                                <td>
                                                    <form name="abc" action="" method="post">

                                                        <button type="button" class="btn btn-info btn-xs"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Editar Registro"
                                                            onclick="location.href='edit-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>'"><i
                                                                class=" fa fa-edit text-white mr-0"></i>
                                                        </button>


                                                        <button type="button" class="btn btn-danger btn-sm px-3"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Eliminar Registro"
                                                            onclick="location.href='delete-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>'"><i
                                                                class="fa fa-trash-o text-white mr-0"></i>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>
    <div class="addNewRow"></div>
    <!-- END PAGE -->
    </div>

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <!--<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>


    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
   



    <!--funcion que servira para mostrar el registro en el modal cuando el usuario la seleccione-->
    <?php if($mostrarCloseModal) {?>
    <script>
    $('#closeModal').modal('show');
    </script>
    <?php }?>

    <script>
    $(document).ready(function() {
        $('#manage-warehouse').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            /**
            Sirve para exportar a csv excel pdf o imprimir
            dom: 'Blfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]**/
        });
    });
    </script>


</body>

</html>