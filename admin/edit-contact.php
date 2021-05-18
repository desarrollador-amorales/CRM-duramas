<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");

$mostrarUpdateModal=false;
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$name_warehouse=$_POST['city'];
$contactid=$_GET['contact_id_gen'];

   $ret=mysqli_query($con,"update contact set name='$name', email='$email',mobile='$mobile',name_warehouse='$name_warehouse' where contact_id_gen='$contactid'");
  
	if($ret)
  {
    $mostrarUpdateModal=true;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Editar Usuario </title>
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

    <!-- nuevo alerta-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--nuevo fin-->


</head>

<body class="">
    <?php include("header.php");?>
    <div class="page-container row-fluid">
        <?php include("leftbar.php");?>
        <div class="clearfix"></div>
    </div>
    </div>
    <a href="#" class="scrollup">Scroll</a>
    <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>
        </div>
        <div class="pull-right">
        </div>
    </div>
    <div class="page-content">
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <div class="page-title"> <i> <a href="manage-contacts.php" class="icon-custom-left"></a> </i>

                <h3>Editar Contacto</h3>
            </div>

            <div class="page-title">
                <?php $rt=mysqli_query($con,"select * from contact where contact_id_gen='".$_GET['contact_id_gen']."'");
			  while($rw=mysqli_fetch_array($rt))
			  {?>
                <h3>Usuario: <?php echo $rw['name'];?> </h3>

                <form name="muser" method="post" action="" enctype="multipart/form-data">

                    <table width="75%" border="0">
                        <tr>
                            <td><label class="control-label"><b>Nombres</b></label></td>
                            <td><input type="text" name="name" id="name" value="<?php echo $rw['name'];?>"
                                    class="form-control"><br>
                            </td>

                        </tr>
                        <tr>
                            <td><label class="control-label"><b>Correo Electronico</b></label></td>
                            <td><input type="text" name="email" id="email" value="<?php echo $rw['email'];?>"
                                    class="form-control"><br></td>
                        </tr>
                        <tr>
                            <td><label class="control-label"><b>Teléfono</b></label></td>
                            <td><input type="text" name="mobile" id="mobile" value="<?php echo $rw['mobile'];?>"
                                    class="form-control"><br></td>
                        </tr>
                        <tr>
                            <td><label class="control-label"><b>Local</b></label></td>
                            <td>
                                <select class="form-control" id="selectCity" name="city" required>
                                    <option value="<?php echo $rw['name_warehouse'];?>">
                                        <?php echo $rw['name_warehouse'];?></option>
                                    <?php 
                                    $rt=mysqli_query($con,"select * from warehouse where active = 1");
                                    
                                    while($almacen= mysqli_fetch_array($rt)) {?>
                                    <option value="<?php echo $almacen['name'];?>">
                                        <?php echo $almacen['name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="42">
                                <br>
                                <button type="submit" name="update" class="btn btn-primary">Guardar Cambios</button>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <?php } ?>
                </form>
            </div>

            <div id="myModalUpdate" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">update</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Listo!</h4>
                            <br>
                            <p>El contacto se actualizo correctamente.</p>
                            <button class="btn btn-success" data-dismiss="modal"
                                onclick="location.href='manage-contacts.php'"><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>


    <?php if($mostrarUpdateModal) {?>
    <script>
    $('#myModalUpdate').modal('show');
    </script>
    <?php }?>



</body>

</html>