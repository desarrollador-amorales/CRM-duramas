<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
if(isset($_POST['update']))
{
	$name=$_POST['name'];
	$a=mysqli_query($con,"update supervisor set name='$name' where email='".$_SESSION['login']."'");
if($a)
{
echo "<script>alert('Se actualizo el perfil satisfactoriamente.');</script>";
}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Cuenta Supervisor</title>
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
                <h3>Cuenta: <?php echo $_SESSION['name_supervisor'];?></h3>
                <?php
$query=mysqli_query($con,"select * from supervisor where email='".$_SESSION['login']."'");
	 while($row=mysqli_fetch_array($query))
	 {
	  ?>

                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Perfil</h3>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"><b>Nombres</b></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-pencil"></span></span>
                                                <input type="text" name="name" value="<?php echo $row['name'];?>"
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"><b>Email Principal</b></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-pencil"></span></span>
                                                <input type="text" name="email" value="<?php echo $row['email'];?>"
                                                    disabled="disabled" class="form-control" />
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"><b>Ciudades
                                                Asignadas</b></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-pencil"></span></span>
                                                <input type="text" name="email"
                                                    value="<?php echo $row['city_warehouse'];?>" disabled="disabled"
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"><b>Rol</b></label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span
                                                        class="fa fa-pencil"></span></span>
                                                <input type="text" name="email" value="<?php echo $row['rol'];?>"
                                                    disabled="disabled" class="form-control" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="panel-footer">
                                    <!-- <button class="btn btn-default" type="reset">Clear Form</button> -->
                                    <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>

    </div>
    <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
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