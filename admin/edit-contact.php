<?php
session_start();
//include("checklogin.php");
//check_login();
include("dbconnection.php");
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
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Administracion de Contactos</title>
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

<body>
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>

    <div class="page-content">
        <h2>Alert Methods</h2>

        <div class="alert alert-info" id="myAlert">
            <a href="manage-contacts.php" class="close"></a>
            <strong>Contacto Actualizado Correctamente..!</strong>.
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $(".close").click(function() {
            $("#myAlert").alert("close");
        });
    });
    </script>

</body>

</html>

<?php
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
                            <select class="form-control" id="selectCity" name="city"
                                        required>
                                        <option value="<?php echo $rw['name_warehouse'];?>"><?php echo $rw['name_warehouse'];?></option>
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
        </div>
    </div>
    </div>
    </div>
    <!--<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="../assets/js/core.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <script src="../assets/js/demo.js" type="text/javascript"></script>

</body>

</html>