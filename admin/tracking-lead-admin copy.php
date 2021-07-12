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
            <div class="page-title"> <i><a href="dashboard-admin.php" class="icon-custom-left"></a></i>
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
                                        <th><label class="control-label"><b>Asesor</b></label></th>
                                        <?php if ($title == 'General') {?>
                                        <th><label class="control-label"><b>Estado</b></label></th>
                                        <?php }?>
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
                                    <?php 

                                     if ($title == 'General'){
                                        $ret=mysqli_query($con,"select * from tracking_lead ");
                                     }else{
                                        $ret=mysqli_query($con,"select * from tracking_lead where status_name='".$title."' ");
                                     }
                                    
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['tracking_lead_id_gen'];
												?>
                                    <tr>
                                        <td>
                                            <form action="" method="post">

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
                                        <td><strong><?php echo $row['user_name'];?></strong></td>
                                        <?php if ($title == 'General') {?>
                                        <td><strong><?php echo $row['status_name'];?></strong></td>
                                        <?php }?>
                                        <?php if ($row['platform'] == 'fb'){ ?>
                                        <td><strong><i class="fa fa-facebook-square"
                                                    style="font-size:30px;"></i></strong></td>
                                        <?php }?>
                                        <?php if ($row['platform'] == 'ig'){ ?>
                                        <td><strong><i class="fa fa-instagram" style="font-size:30px;"></i></strong>
                                        </td>
                                        <?php }?>
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
                                                <li role="presentation"><a href="#estadoTab" aria-controls="estadoTab"
                                                        role="tab" data-toggle="tab"><b>Estados</b></a>

                                                </li>
                                                <li role="presentation"><a href="#proformasTab"
                                                        aria-controls="proformasTab" role="tab"
                                                        data-toggle="tab"><b>Proformas</b></a>

                                                </li>
                                                <li role="presentation"><a href="#facturasTab"
                                                        aria-controls="facturasTab" role="tab"
                                                        data-toggle="tab"><b>Facturas</b></a>

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
                                                            <div class="form-group">
                                                                <label for="men_not" class="control-label"><b>
                                                                        Agregar nota</b></label>
                                                                <textarea class="form-control" name="note_description"
                                                                    id="note_description" rows="4"></textarea>
                                                                <input type="hidden" name="user_name" id="user_name"
                                                                    value="<?php echo $_SESSION['name_admin'];?>"
                                                                    readonly="">

                                                                <input type="hidden" name="tracking_lead_id_gen"
                                                                    id="tracking_lead_id_gen"
                                                                    value="<?php echo $id_tracking_lead;?>" readonly="">
                                                            </div>
                                                            <div class="col-12 text-center mb-4">
                                                                <button type="submit" class="btn btn-sm btn-info"
                                                                    name="save_note" id="save_note"><i
                                                                        class="fa fa-save"></i> Guardar</button>
                                                            </div>
                                                            <hr>
                                                            <div class="col-12 pl-0 pr-0">
                                                                <h4 class=" bg-info p-2 mb-0 text-center text-black">
                                                                    <b>HISTORIAL</b>
                                                                </h4>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-condensed"
                                                                        id="table-lead-notes">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><b>Fecha</b></th>
                                                                                <th><b>Usuario</b></th>
                                                                                <th><b>Nota</b></th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div role="tabpanel" class="tab-pane" id="estadoTab">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <input type="hidden" name="tracking_lead_id_gen"
                                                                id="tracking_lead_id_gen"
                                                                value="<?php echo $id_tracking_lead;?>" readonly="">

                                                            <input type="hidden" name="user_name" id="user_name"
                                                                value="<?php echo $_SESSION['name_admin'];?>"
                                                                readonly="">

                                                            <div class="form-group">
                                                                <label for="estado"
                                                                    class="control-label"><b>Estado</b></label>
                                                                <select class="form-control width-250px ml-auto mr-auto"
                                                                    name="estado" id="estado" require>
                                                                    <option value=""></option>
                                                                    <?php 
                                                                    $rt=mysqli_query($con,"select * from status where status = 1");
                                                                    
                                                                    while($status_campaing= mysqli_fetch_array($rt)) {?>
                                                                    <option
                                                                        value="<?php echo $status_campaing['name'];?>">
                                                                        <?php echo $status_campaing['name'];?>
                                                                    </option>
                                                                    <?php }?>

                                                                </select>
                                                            </div>
                                                            <div class="col-12 text-center mb-4">
                                                                <button type="submit" class="btn btn-sm btn-info"
                                                                    name="save_status" id="save_status"><i
                                                                        class="fa fa-save"></i> Guardar</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12">
                                                            <h4 class="bg-info p-25 mb-0 text-center text-black">
                                                                <b>HISTORIAL</b>
                                                            </h4>
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-condensed"
                                                                    id="table-lead-status">
                                                                    <!--Tipo de tabla diferemte table table-striped -->
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Usuario</th>
                                                                            <th>Estado</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="proformasTab">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6 text-center">

                                                                    <input type="hidden" name="tracking_lead_id_gen"
                                                                        id="tracking_lead_id_gen"
                                                                        value="<?php echo $id_tracking_lead;?>"
                                                                        readonly="">

                                                                    <input type="hidden" name="user_name" id="user_name"
                                                                        value="<?php echo $_SESSION['name_admin'];?>"
                                                                        readonly="">


                                                                    <div class="form-group">
                                                                        <label for="pro_num"
                                                                            class="control-label"><b>Número</b></label>
                                                                        <input type="text" name="pro_num" id="pro_num"
                                                                            class="form-control text-center">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 text-center">
                                                                    <div class="form-group">
                                                                        <label for="pro_val"
                                                                            class="control-label"><b>Valor</b></label>
                                                                        <input type="number" step="0.01" name="pro_val"
                                                                            id="pro_val"
                                                                            class="form-control text-center">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 text-center">
                                                                    <div class="form-group">
                                                                    <label for="men_not" class="control-label"><b>
                                                                        Descripción</b></label>
                                                                        <textarea class="form-control"
                                                                            name="note_description_pro"
                                                                            id="note_description_pro" rows="3"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 text-center mb-4">
                                                                    <button type="submit" class="btn btn-sm btn-info"
                                                                        name="save_proforma" id="save_proforma"><i
                                                                            class="fa fa-save"></i> Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12">
                                                            <h4 class="bg-info p-25 mb-0 text-center text-black">
                                                                <b>HISTORIAL</b>
                                                            </h4>
                                                            <div class="table-responsive">

                                                                &nbsp; <table class="table table-hover table-condensed"
                                                                    id="table-lead-proforma">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Usuario</th>
                                                                            <th>Número</th>
                                                                            <th>Valor</th>
                                                                            <th>Descripción</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div role="tabpanel" class="tab-pane" id="facturasTab">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6 text-center">

                                                                    <input type="hidden" name="tracking_lead_id_gen"
                                                                        id="tracking_lead_id_gen"
                                                                        value="<?php echo $id_tracking_lead;?>"
                                                                        readonly="">

                                                                    <input type="hidden" name="user_name" id="user_name"
                                                                        value="<?php echo $_SESSION['name_admin'];?>"
                                                                        readonly="">


                                                                    <div class="form-group">
                                                                        <label for="fac_num"
                                                                            class="control-label"><b>Número</b></label>
                                                                        <input type="text" name="fac_num" id="fac_num"
                                                                            class="form-control text-center">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6 text-center">
                                                                    <div class="form-group">
                                                                        <label for="fac_val"
                                                                            class="control-label"><b>Valor</b></label>
                                                                        <input type="number" step="0.01" name="fac_val"
                                                                            id="fac_val"
                                                                            class="form-control text-center">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 text-center">
                                                                    <div class="form-group">
                                                                    <label for="men_not" class="control-label"><b>
                                                                        Descripción</b></label>
                                                                        <textarea class="form-control"
                                                                            name="note_description_fac"
                                                                            id="note_description_fac" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 text-center mb-4">
                                                                    <button type="submit" class="btn btn-sm btn-info"
                                                                        name="save_factura" id="save_factura"><i
                                                                            class="fa fa-save"></i> Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12">
                                                            <h4 class="bg-info p-25 mb-0 text-center text-black">
                                                                <b>HISTORIAL</b>
                                                            </h4>
                                                            <div class="table-responsive">

                                                                &nbsp; <table class="table table-hover table-condensed"
                                                                    id="table-lead-factura">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Usuario</th>
                                                                            <th>Número</th>
                                                                            <th>Valor</th>
                                                                            <th>Descripción</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-light" class="close"
                                            data-dismiss="modal"><i class="fa fa-reply"></i> Cerrar</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- BEGIN CHAT -->

    </div>
    <!--incio nuevo-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>



    <script type="text/javascript">
    var minDate, maxDate;

    // funcion de filtrado de acuerdo a la columna en donde este la fecha
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            <?php if ($title == 'General'){?>
            var date = new Date(data[12]);
            <?php } else {?>
            var date = new Date(data[11]);
            <?php }?>

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
    /**Incia Funcion para notas */
    function save_and_load_data(note_description, user_name, tracking_lead_id_gen) {
        var ajax_url = "../jquery-ajax-history-notes.php";

        $('#table-lead-notes').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0, 1, 2]
            }],
            "processing": false,
            "serverSide": true,
            "stateSave": false,
            "bFilter": false,
            "paging": false,
            "autoWidth": false,
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
    save_and_load_data("", user_name, tracking_lead_id_gen); // first load



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
            save_and_load_data("", user_name, tracking_lead_id_gen);
        } else {
            $('#table-lead-notes').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data(note_description, user_name, tracking_lead_id_gen);
            document.getElementById("note_description").value = "";
            $("#note_description").focus();
        }

    });
    //Termina Funcion para notas
    </script>




    <script>
    /**Inicia Funcion para estados */
    function save_and_load_data_status(estado, user_name, tracking_lead_id_gen) {
        var ajax_url = "../jquery-ajax-history-status.php";

        $('#table-lead-status').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0, 1, 2]
            }],
            "processing": false,
            "serverSide": true,
            "stateSave": false,
            "bFilter": false,
            "paging": false,
            "autoWidth": false,
            "ajax": {
                "url": ajax_url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    "action": "fetch_status_lead",
                    "estado": estado,
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
                    "data": "estado"
                }
            ]
        });
    }

    var user_name = $("#user_name").val();
    var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();

    $('#table-lead-status').DataTable().destroy(); // reinicializa la tabla
    save_and_load_data_status("", user_name, tracking_lead_id_gen); // first load

    $("#save_status").click(function() {
        var estado = $("#estado").val();
        var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();
        var user_name = $("input[name='user_name']").val();


        if (estado == "") {
            alert("Debe seleccionar un estado de la lista");
            $('#table-lead-status').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data_status("", user_name, tracking_lead_id_gen);
        } else {
            $('#table-lead-status').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data_status(estado, user_name, tracking_lead_id_gen);
            document.getElementById("estado").value = "";
        }

    });
    /**Termina Funcion para estados */
    </script>

    <script>
    /**Inicia funcion para proformas */

    function save_and_load_data_proforma(number_proforma, value_proforma, description, user_name, tracking_lead_id_gen) {
        var ajax_url = "../jquery-ajax-history-proforma.php";

        $('#table-lead-proforma').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0, 1, 2, 3,4]
            }],
            "processing": false,
            "serverSide": true,
            "stateSave": false,
            "bFilter": false,
            "paging": false,
            "autoWidth": false,
            "ajax": {
                "url": ajax_url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    "action": "fetch_proforma_lead",
                    "number_proforma": number_proforma,
                    "value_proforma": value_proforma,
                    "description": description,
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
                    "data": "number_proforma"
                },
                {
                    "data": "value_proforma"
                },
                {
                    "data": "description"
                }
            ]
        });
    }

    var user_name = $("#user_name").val();
    var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();


    $('#table-lead-proforma').DataTable().destroy(); // reinicializa la tabla
    save_and_load_data_proforma("", "","", user_name, tracking_lead_id_gen); // first load

    $("#save_proforma").click(function() {
        var number_proforma = $("#pro_num").val();
        var value_proforma = $("#pro_val").val();
        var description = $("#note_description_pro").val();
        var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();
        var user_name = $("input[name='user_name']").val();


        if (number_proforma == "") {
            alert("Debe ingresar un numero de proforma");
            $("#pro_num").focus();
            $('#table-lead-proforma').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data_proforma("", "","", user_name, tracking_lead_id_gen);
        } else {
            if (value_proforma == "") {
                alert("Debe ingresar un valor para la proforma");
                $("#pro_val").focus();
                $('#table-lead-proforma').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_proforma("", "","", user_name, tracking_lead_id_gen);
            }
            if (description == "") {
                alert("Debe ingresar una breve descripcion para la proforma");
                $("#note_description_pro").focus();
                $('#table-lead-proforma').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_proforma("", "","", user_name, tracking_lead_id_gen);
            }
            else {
                $('#table-lead-proforma').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_proforma(number_proforma, value_proforma,description, user_name, tracking_lead_id_gen);
                document.getElementById("pro_num").value = "";
                document.getElementById("pro_val").value = "";
                document.getElementById("note_description_pro").value = "";
            }
        }




    });
    /**Termina funcion para proformas */
    </script>


    <script>
    /**Inicia funcion para facturas */

    function save_and_load_data_factura(number_factura, value_factura,description, user_name, tracking_lead_id_gen) {
        var ajax_url = "../jquery-ajax-history-factura.php";

        $('#table-lead-factura').DataTable({
            "order": [
                [0, "desc"]
            ],
            dom: 'Blfrtip',
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0, 1, 2, 3, 4]
            }],
            "processing": false,
            "serverSide": true,
            "stateSave": false,
            "bFilter": false,
            "paging": false,
            "autoWidth": false,
            "ajax": {
                "url": ajax_url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    "action": "fetch_factura_lead",
                    "number_factura": number_factura,
                    "value_factura": value_factura,
                    "description": description,
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
                    "data": "number_factura"
                },
                {
                    "data": "value_factura"
                },
                {
                    "data": "description"
                }
            ]
        });
    }

    var user_name = $("#user_name").val();
    var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();


    $('#table-lead-factura').DataTable().destroy(); // reinicializa la tabla
    save_and_load_data_factura("", "","", user_name, tracking_lead_id_gen); // first load

    $("#save_factura").click(function() {
        var number_factura = $("#fac_num").val();
        var value_factura = $("#fac_val").val();
        var description = $("#note_description_fac").val();
        var tracking_lead_id_gen = $("#tracking_lead_id_gen").val();
        var user_name = $("input[name='user_name']").val();


        if (number_factura == "") {
            alert("Debe ingresar un numero de factura");
            $("#fac_num").focus();
            $('#table-lead-factura').DataTable().destroy(); // reinicializa la tabla
            save_and_load_data_factura("", "","", user_name, tracking_lead_id_gen);
        } else {
            if (value_factura == "") {
                alert("Debe ingresar un valor para la factura");
                $("#fac_val").focus();
                $('#table-lead-factura').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_factura("", "","", user_name, tracking_lead_id_gen);
            }
            if (description == "") {
                alert("Debe ingresar una breve descripcion para la factura");
                $("#note_description_fac").focus();
                $('#table-lead-factura').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_factura("", "","", user_name, tracking_lead_id_gen);
            }
            
            else {
                $('#table-lead-factura').DataTable().destroy(); // reinicializa la tabla
                save_and_load_data_factura(number_factura, value_factura,description, user_name, tracking_lead_id_gen);
                document.getElementById("fac_num").value = "";
                document.getElementById("fac_val").value = "";
                document.getElementById("note_description_fac").value = "";
            }
        }

    });
    /**Termina funcion para facturas */
    </script>


    <script>
    $('#myModal').on('hidden.bs.modal', function() {
        //Para recargar la página descartando los datos POST (realizar una solicitud GET)
        window.location.href = window.location.href;
        //Para recargar la página manteniendo los datos POST use window.location.reload();
    });
    </script>

    <?php if($mostrarModalTrackLead) {?>
    <script>
    $('#myModal').modal('show');
    </script>
    <?php }?>
</body>

</html>