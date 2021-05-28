<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");

$mostrarUpdateModal=false;
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $user_name=$_POST['user_name'];
    $userid=$_GET['id'];

  $ret=mysqli_query($con,"update admin set name='$name', user='$user_name' where id='$userid'");
	if($ret)
  {
    $mostrarUpdateModal= true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Editar Administrador </title>
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


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- nuevo alerta-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--nuevo fin-->

    <script type="text/javascript">
    $(document).ready(function() {
        $('.cityEditSelect').select2();
    });
    </script>
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
            <div class="page-title"> <i> <a href="manage-users-admin.php" class="icon-custom-left"></a> </i>

                <h3>Editar Administrador</h3>
            </div>

            <div class="page-title">
                <?php $rt=mysqli_query($con,"select * from admin where id='".$_GET['id']."'");
			  while($rw=mysqli_fetch_array($rt))
			  {?>
                <h3>Usuario: <?php echo $rw['name'];?> </h3>

                <form name="muser" method="post" action="" enctype="multipart/form-data">

                    <table width="75%" border="0">
                        <tr>
                            <td height="42"><label class="control-label"><b>Nombres</b></label></td>
                            <td><input type="text" name="name" id="name" value="<?php echo $rw['name'];?>"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td height="42"><label class="control-label"><b>Usuario</b></label></td>
                            <td><input type="text" name="user_name" id="user_name" value="<?php echo $rw['user'];?>"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="42">
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
                            <p>El Administrador se actualizo correctamente.</p>
                            <button class="btn btn-success" data-dismiss="modal"
                            onclick="location.href='manage-users-admin.php'"
                            ><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    
    
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

    <?php if($mostrarUpdateModal) {?>
    <script>
    $('#myModalUpdate').modal('show');
    </script>
    <?php }?>

</body>

</html>