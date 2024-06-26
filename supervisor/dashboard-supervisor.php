<?php
session_start();
include("checklogin.php");
check_login();
include("dbconnection.php");
$initial_date = date("Y-m-01"); //fecha inicio de mes actual
$final_date = date("Y-m-t");    //fecha fin del mes actual
$id_supervisor=$_SESSION['id_supervisor'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Dashboard Admin </title>
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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <h3><b>Administracion de Leads</b></h3>
                <div class="row 2col">
                    <!--Solicitud-->
                    <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
                        <div class="tiles blue added-margin">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <?php $ret=mysqli_query($con,"select tl.* from tracking_lead tl, user_supervisor_warehouse usw where usw.name_warehouse =tl.city_warehouse and usw.id_user_supervisor='".$id_supervisor."' and tl.status_name ='Solicitud' and tl.date_create between '".$initial_date."' and '".$final_date."' ");
                                    $num=mysqli_num_rows($ret);
                                    ?>
                                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>"
                                        data-animation-duration="1200">0</span>| <a
                                        href="tracking-lead-supervisor.php?status_name=Solicitud" style="color:#FFF">
                                        Solicitud </a></div>

                                <div class="progress transparent progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="<?php echo $num;?>%"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Seguimiento-->
                    <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
                        <div class="tiles black added-margin">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <?php $ret=mysqli_query($con,"select tl.* from tracking_lead tl, user_supervisor_warehouse usw where usw.name_warehouse =tl.city_warehouse and usw.id_user_supervisor='".$id_supervisor."' and tl.status_name ='Seguimiento' and tl.date_create between '".$initial_date."' and '".$final_date."'  ");
                                    $num=mysqli_num_rows($ret);
                                    ?>
                                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>"
                                        data-animation-duration="1200">0</span>| <a
                                        href="tracking-lead-supervisor.php?status_name=Seguimiento" style="color:#FFF">
                                        Seguimiento </a></div>

                                <div class="progress transparent progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="<?php echo $num;?>%"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Concretado-->
                    <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
                        <div class="tiles green added-margin">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <?php $ret=mysqli_query($con,"select tl.* from tracking_lead tl, user_supervisor_warehouse usw where usw.name_warehouse =tl.city_warehouse and usw.id_user_supervisor='".$id_supervisor."' and tl.status_name ='Concretado' and tl.date_create between '".$initial_date."' and '".$final_date."' ");
                                    $num=mysqli_num_rows($ret);
                                    ?>
                                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>"
                                        data-animation-duration="1200">0</span>| <a
                                        href="tracking-lead-supervisor.php?status_name=Concretado" style="color:#FFF">
                                        Concretado </a></div>

                                <div class="progress transparent progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="<?php echo $num;?>%"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Cancelado-->
                    <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
                        <div class="tiles red added-margin">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <?php $ret=mysqli_query($con,"select tl.* from tracking_lead tl, user_supervisor_warehouse usw where usw.name_warehouse =tl.city_warehouse and usw.id_user_supervisor='".$id_supervisor."' and tl.status_name ='Cancelado' and tl.date_create between '".$initial_date."' and '".$final_date."' ");
                                    $num=mysqli_num_rows($ret);
                                    ?>
                                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>"
                                        data-animation-duration="1200">0</span>| <a
                                        href="tracking-lead-supervisor.php?status_name=Cancelado" style="color:#FFF">
                                        Cancelado </a></div>

                                <div class="progress transparent progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="<?php echo $num;?>%"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                      <!--Total-->
                      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
                        <div class="tiles purple added-margin">
                            <div class="tiles-body">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <?php $ret=mysqli_query($con,"select tl.* from tracking_lead tl, user_supervisor_warehouse usw where usw.name_warehouse =tl.city_warehouse and usw.id_user_supervisor='".$id_supervisor."' and tl.date_create between '".$initial_date."' and '".$final_date."' ");
                                    $num=mysqli_num_rows($ret);
                                    ?>
                                <div class="heading"> <span class="animate-number" data-value="<?php echo $num;?>"
                                        data-animation-duration="1200">0</span>| <a
                                        href="tracking-lead-supervisor.php?status_name=General" style="color:#FFF">
                                        Total </a></div>

                                <div class="progress transparent progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="<?php echo $num;?>%"></div>
                                </div>

                            </div>
                        </div>
                    </div>

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