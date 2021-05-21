<?php
session_start();
error_reporting(0);
include("checklogin.php");
check_login();
include("dbconnection.php");
if(isset($_POST['change']))
{
 $sql=mysqli_query($con,"SELECT password FROM  user where password='".$_POST['oldpass']."' && email='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update  user set password='".$_POST['newpass']."' where email='".$_SESSION['login']."'");
$_SESSION['msg1']="Se cambió la contraseña con exito !!";
//header('location:user.php');
}
else
{
$_SESSION['msg1']="Su contraseña actual no coincide !!";
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Cambiar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript">
    function valid() {
        if (document.form1.oldpass.value == "") {
            alert(" Debe llenar el campo: Contraseña Actual !!");
            document.form1.oldpass.focus();
            return false;
        } else if (document.form1.newpass.value == "") {
            alert(" Debe llenar el campo: Nueva Contraseña !!");
            document.form1.newpass.focus();
            return false;
        } else if (document.form1.confirmpassword.value == "") {
            alert(" Debe llenar el campo: Confirmar Contraseña !!");
            document.form1.confirmpassword.focus();
            return false;
        } else if (document.form1.newpass.value.length < 6) {
            alert(" Campo Nueva Contraseña debe al menos tener 6 caracteres !!");
            document.form1.newpass.focus();
            return false;
        } else if (document.form1.confirmpassword.value.length < 6) {
            alert(" Campo Confirmar Contraseña debe al menos tener 6 caracteres !!");
            document.form1.confirmpassword.focus();
            return false;
        } else if (document.form1.newpass.value != document.form1.confirmpassword.value) {
            alert("Nueva Contraseña y Confirmar Contraseña no coincide  !!");
            document.form1.newpass.focus();
            return false;
        }
        return true;
    }
    </script>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '3967f769c67279a8c09dd8370b3bb38d41bef63d';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
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
            <div class="page-title">
                <h3>Cambiar Contraseña</h3>
                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="panel panel-default">


                                <div class="panel-body">
                                    <p align="center" style="color:#FF0000">
                                        <?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Contraseña Actual</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="oldpass" id="oldpass" value=""
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nueva Contraseña</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="newpass" id="newpass" value=""
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Confirmar Contraseña</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="confirmpassword" id="confirmpassword"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <!--<button class="btn btn-default">Clear Form</button>-->
                                    <input type="submit" value="Cambiar" name="change"
                                        class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN CHAT -->



    </div>
    </div>
    </div>
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/js/core.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>

</body>

</html>