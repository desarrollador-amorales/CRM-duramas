<?php
session_start();
error_reporting();
include("dbconnection.php");

if(isset($_GET['email']))
$rol=(isset($_GET['rol']))?$_GET['rol']:"";
{
    $email_user=$_GET['email'];
 if ($rol == 'Admin'){
    $row1=mysqli_query($con,"select user,password from admin where user='".$_GET['email']."'");
    $row2=mysqli_fetch_array($row1);
    echo ' contraseña de admin--->'.$row2['password'];
 }
 elseif ($rol == 'Supervisor'){
    $row1=mysqli_query($con,"select email,password from supervisor where email='".$_GET['email']."'");
    $row2=mysqli_fetch_array($row1);
    echo ' contraseña de supervisor--->'.$row2['password'];
 } else{
    $row1=mysqli_query($con,"select email,password from user where email='".$_GET['email']."'");
    $row2=mysqli_fetch_array($row1);
    echo 'contraseña de usuario-->'.$row2['password'];
 }


$from="desarrollador@duramas.com.ec";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
 

if ($row2>0) {
    $subject = " CRM Duramas - Credenciales de Usuario";
    $password=$row2['password'];

    // Compose a simple HTML email message

    $url= "http://crm.duramas.com.ec/"; 
    $message_user = "Para acceder a CRM Duramas hacer click en el siguiente enlace ".$url;

    $message = '<html><body>';
    $message .= '<h1 style="color:#666;">Bienvenido a CRM Duramas!</h1>';
    $message .= '<p style="color:#080;font-size:18px;">'.$message_user.'</p>';
    $message .= '<br>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Usuario:</strong> </td><td><strong>Clave:</strong></td></tr>";
    $message .= "<tr><td>". strip_tags($email_user) ."</td><td>" . strip_tags($password) . "</td></tr>";
    $message .= '</body></html>';    

    mail($email_user, $subject, $message, $headers); 
    $mostrarCredentialModal= true;
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Administracion de Usuarios </title>
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
        <div class="clearfix"></div>
        <div class="content">



            <div id="credentialModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">vpn_key</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Listo!</h4>
                            <br>
                            <p>Las credenciales fueron enviadas correctamente.</p>
                            <?php if ($rol == 'Admin'){ ?>
                                <button class="btn btn-success" data-dismiss="modal"
                                onclick="location.href='manage-users-admin.php'"><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                            <?php }
                             elseif ($rol == 'Supervisor'){ ?>
                                <button class="btn btn-success" data-dismiss="modal"
                                onclick="location.href='manage-users-supervisor.php'"><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                            <?php }
                            else {?>
                            <button class="btn btn-success" data-dismiss="modal"
                                onclick="location.href='manage-users.php'"><span>Aceptar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                            <?php }?>
                            
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

    <?php if($mostrarCredentialModal) {?>
    <script>
    $('#credentialModal').modal('show');
    </script>
    <?php }?>

</body>

</html>
<?php
}
else{
    $_SESSION['msg']= "*Email no registrado en nuestro sistema.";
}
    }
   
	?>