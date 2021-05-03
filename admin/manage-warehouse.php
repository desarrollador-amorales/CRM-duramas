<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
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

<body class="">
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>

            </div>
            <div class="modal-body">Widget settings form goes here</div>
        </div>
        <div class="clearfix"></div>
        <div class="content">

            <div class="page-title"> <i> <a href="home.php" class="icon-custom-left"></a> </i>

                <h3>Administracion de Locales</h3>
            </div>

            <div class="pull-right">
                <a href="../registration.php" class="btn btn-primary "><span class="fa fa-plus"></span> Añadir Local</a>
                <p></p>
                <p></p>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                                    <h4>Detalles de Locales</h4>
                                    <div class="tools"> <a href="javascript:;" class="collapse"></a>
                                        <a href="#grid-config" data-toggle="modal" class="config"></a>
                                        <a href="javascript:;" class="reload"></a>
                                        <a href="javascript:;" class="remove"></a>
                                    </div>
                                </div>
                                <div class="grid-body no-border">

                                    <table class="table table-hover no-more-tables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Reparto</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ret=mysqli_query($con,"select * from warehouse");
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['id_warehouse_gen'];
												?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['distribution'];?></td>

                                                <td>
                                                    <form name="abc" action="" method="post">
                                                        <a href="edit-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>"
                                                            class="btn btn-primary btn-xs btn-mini">Editar</a>

                                                    
                                                            <a href="delete-warehouse.php?id_warehouse_gen=<?php echo $row['id_warehouse_gen'];?>"
                                                                class="btn btn-danger btn-xs btn-mini">Eliminar</a>

                                                       <!-- <button type="submit" class="btn btn-danger btn-xs btn-mini"
                                                            data-toggle="modal" data-target="#myModal"
                                                            name="delete">Eliminar</button> -->

                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END PAGE -->
    </div>

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
    //Too Small for new file - Helps the to tick all options in the table 
    $('table .checkbox input').click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().toggleClass('row_selected');
        } else {
            $(this).parent().parent().parent().toggleClass('row_selected');
        }
    });
    // Demo charts - not required 
    $('.customer-sparkline').each(function() {
        $(this).sparkline('html', {
            type: $(this).attr("data-sparkline-type"),
            barColor: $(this).attr("data-sparkline-color"),
            enableTagOptions: true
        });
    });
    </script>
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="../assets/js/core.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <script src="../assets/js/demo.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
</body>

</html>