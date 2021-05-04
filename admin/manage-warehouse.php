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
                                <h2 class="modal-title" id="exampleModalLabel">Local</h2>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="">Nombre:</label>
                                        <input class="form-control" required type="text" name="txt_name" value=""
                                            placeholder="" id="txt_name">
                                        <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^ para mostrar la informacion que nosotros enviamos a traves del formulario y no se pierda-->
                                        <br>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Reparto:</label>
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
                                <button class="btn btn-success" <?php echo $accionAgregar?> value="btnAgregar"
                                    type="submit" name="accion">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Modal -->

            <!--Modal aviso-->
            <div class="modal" id ="closeModal" tabindex="-1" ole="dialog">
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

                                    <table class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Reparto</th>
                                                <th>Accion</th>
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
                                                        <a href="edit-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>"
                                                            class="btn btn-primary btn-xs btn-mini">Editar</a>


                                                        <a href="delete-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>"
                                                            class="btn btn-danger btn-xs btn-mini">Eliminar</a>
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
    <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="../assets/js/datatables.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="../assets/js/core.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <script src="../assets/js/demo.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->

    <!--funcion que servira para mostrar el registro en el modal cuando el usuario la seleccione-->
    <?php if($mostrarCloseModal) {?>
    <script>
    $('#closeModal').modal('show');
    </script>
    <?php }?>
</body>

</html>