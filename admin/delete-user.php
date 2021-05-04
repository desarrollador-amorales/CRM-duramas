<?php
session_start();
//include("checklogin.php");
//check_login();
include("dbconnection.php");
if(isset($_GET['id']))
{
$userid=$_GET['id'];
	$ret=mysqli_query($con,"delete from user where id='$userid'");
	if($ret)
    {
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
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>

    <div class="page-content">

        <h2>Alert Methods</h2>

        <div class="alert alert-danger " id="myAlert">
            <a href="manage-users.php" class="close"></a>
            <strong>Se eliminó el usuario correctamente..!</strong>.
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