<?php
session_start();
//include("checklogin.php");
//check_login();
include("dbconnection.php");
if(isset($_POST['update']))
{
$name=$_POST['name'];
$altemail=$_POST['altemail'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$city=implode(', ',$_POST['city']);
$city_values= $_POST['city'];
$userid=$_GET['id'];

	$ret=mysqli_query($con,"update user set name='$name', alt_email='$altemail',mobile='$contact',gender='$gender',address='$address', city_warehouse='$city' where id='$userid'");
  mysqli_query($con,"delete from user_warehouse where id_user='$userid'");
  for ($i=0;$i<count($city_values);$i++)    
    {     
    mysqli_query($con,"insert into user_warehouse(id_user,name_warehouse) values('$userid','$city_values[$i]')");
    }
	if($ret)
  {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Administracion de Usuarios</title>
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
            <a href="manage-users.php" class="close"></a>
            <strong>Usuario Actualizado Correctamente..!</strong>.
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


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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
            <div class="page-title"> <i> <a href="manage-users.php" class="icon-custom-left"></a> </i>

                <h3>Editar Usuario</h3>
            </div>

            <div class="page-title">
                <?php $rt=mysqli_query($con,"select * from user where id='".$_GET['id']."'");
			  while($rw=mysqli_fetch_array($rt))
			  {?>
                <h3>Usuario: <?php echo $rw['name'];?> </h3>

                <form name="muser" method="post" action="" enctype="multipart/form-data">

                    <table width="100%" border="0">
                        <tr>
                            <td height="42">Nombres</td>
                            <td><input type="text" name="name" id="name" value="<?php echo $rw['name'];?>"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td height="42">Email Principal</td>
                            <td><input type="text" name="email" id="email" value="<?php echo $rw['email'];?>"
                                    class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td height="42">Email Secundario</td>
                            <td><input type="text" name="altemail" id="altemail" value="<?php echo $rw['alt_email'];?>"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td height="42">Contact no.</td>
                            <td><input type="text" name="contact" id="contact" value="<?php echo $rw['mobile'];?>"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td height="42">Genero</td>
                            <td><select name="gender" class="form-control">
                                    <option value="<?php echo $rw['gender'];?>">
                                        <?php $a=$rw['gender'];
                          if($a=='m')
                          {
                          echo "Masculino";
                          }
                            if($a=='f')
                          {
                          echo "Femenino";
                          }
                         
                          
                            if($a=='others')
                          {
                          echo "Otro";
                          }
                                                  
                          ?>
                                    </option>
                                    <option value="">___________</option>
                                    <option value="m">Masculino</option>
                                    <option value="f">Femenino</option>
                                    <option value="others">Otro</option>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td height="42">Ciudad</td>

                            <?php
                                  if (isset($_GET['id'])){
                                    $user_id = $_GET['id'];
                                    $user_city = mysqli_query($con,"select name_warehouse from user_warehouse where id_user= '$user_id'");
                                    $user_city_array = [];

                                    foreach($user_city as $name_warehouse){
                                     // echo ' // '.$name_warehouse['name_warehouse']; ver que locales tiene asignado
                                      $user_city_array[]= $name_warehouse['name_warehouse'];
                                    }
                                  }
                              ?>

                            <td><select multiple name="city[]" class="cityEditSelect form-control" required>
                                    <?php 
                                    $rt=mysqli_query($con,"select * from warehouse where active = 1");
                                    
                                    while($almacen= mysqli_fetch_array($rt)) {?>

                                    <option value="<?php echo $almacen['name'];?>"
                                        <?php echo in_array($almacen['name'],$user_city_array) ? 'selected':''?>>
                                        <?php echo $almacen['name'];?>
                                    </option>
                                    <?php }?>
                                </select>

                            </td>

                        </tr>
                        

                        <tr>
                        <br>
                            <td height="42">Direccion</td>
                            <td><textarea name="address" cols="64" rows="4"><?php echo $rw['address'];?></textarea></td>
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