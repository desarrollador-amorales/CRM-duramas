<?php
session_start();
error_reporting();
include("dbconnection.php");

if(isset($_GET['email']))
{

$email_user=$_GET['email'];
$row1=mysqli_query($con,"select email,password from user where email='".$_GET['email']."'");
$row2=mysqli_fetch_array($row1);
$from="desarrollador@duramas.com.ec";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
//$headers .= 'From: '.$from."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
 

if ($row2>0) {
    $subject = " CRM Duramas - Credenciales de Usuario";
    $password=$row2['password'];

    // Compose a simple HTML email message

    $url= "http://duramas.com.ec/crm-duramas/"; 
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
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
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

<body>
    <?php include("header.php"); ?>
    <div class="page-container row">

        <?php include("leftbar.php"); ?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>

    <div class="page-content">

        <h2>Alert Methods</h2>

        <div class="alert alert-success" id="myAlert">
            <a href="manage-users.php" class="close"></a>
            <strong>Se enviaron las credenciales correctamente..!</strong>.
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
else{
    $_SESSION['msg']= "*Email no registrado en nuestro sistema.";
}
    }
   
	?>