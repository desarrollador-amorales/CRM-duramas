<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
$Solicitud='Solicitud';
$Seguimiento='Seguimiento';
$Concretado='Concretado';
$Cancelado='Cancelado';

$initial_date = date("Y-m-01"); //fecha inicio de mes actual
$final_date = date("Y-m-t"); // fecha fin de mes actual

//$initial_date = date("2021-05-01"); //fecha inicio de mes actual
//$final_date = date("2021-05-31"); // fecha fin de mes actual

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="../assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/shape-hover/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/shape-hover/css/component.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/owl-carousel/owl.theme.css" />
    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="../assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css"
        media="screen">
    <link rel="stylesheet" href="../assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">
    <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/magic_space.css" rel="stylesheet" type="text/css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body class="">
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content sm-gutter">
            <div class="page-title">
            </div>
            <!-- BEGIN DASHBOARD TILES -->
            <div class="row">
                <div class="col-md-3 col-vlg-3 col-sm-6">
                    <div class="tiles green m-b-10">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                                    class="remove"></a> </div>
                            <div class="tiles-title text-black">Visitas Generales </div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <?php $ov=mysqli_query($con,"select * from usercheck");
					  $num=mysqli_num_rows($ov);
					  ?>
                                    <span class="item-title">Visitas Generales</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $num;?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>


                            <div class="widget-stats ">
                                <div class="wrapper last">
                                    <?php
					   $tdate=date("Y/m/d");
					  
					    $tv1=mysqli_query($con,"select * from usercheck where logindate='$tdate'");
					  $num11=mysqli_num_rows($tv1);
					  ?>



                                    <span class="item-title">Hoy</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $num11;?>"
                                        data-animation-duration="700">0</span> <?php									
									
									?>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>
                <div class="col-md-3 col-vlg-3 col-sm-6">
                    <div class="tiles blue m-b-10">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                                    class="remove"></a> </div>
                            <div class="tiles-title text-black">Usuarios Registrados </div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <?php $rt=mysqli_query($con,"select * from user");
					  $rw=mysqli_num_rows($rt);?>
                                    <span class="item-title">Usuarios Registrados</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $rw;?>" data-
                                        animation-duration="700">0</span>
                                </div>
                            </div>
                            <div class="widget-stats ">
                                <div class="wrapper last">
                                    <?php 
					  $utd=date('Y-m-d');
					  $rt1=mysqli_query($con,"select * from user where DATE_FORMAT(posting_date,'%Y-%m-%d')='$utd'");
					  $rw1=mysqli_num_rows($rt1);?>
                                    <span class="item-title">Hoy</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $rw1;?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-vlg-4 col-sm-6">
                    <div class="tiles red m-b-10">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                                    class="remove"></a> </div>
                            <div class="tiles-title text-black">Leads</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <?php
                      $qr=mysqli_query($con,"select * from tracking_lead where status_name = '".$Solicitud."' and date_create between '".$initial_date."' and '".$final_date."'");
					  $oq=mysqli_num_rows($qr);
					  ?>
                                    <span class="item-title">Solicitud</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $oq?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <?php
                      $qr1=mysqli_query($con,"select * from tracking_lead where status_name = '".$Seguimiento."' and date_create between '".$initial_date."' and '".$final_date."'");
					  $oq1=mysqli_num_rows($qr1);
					  ?>
                                    <span class="item-title">Seguimiento</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $oq1;?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>
                            <div class="widget-stats ">
                                <div class="wrapper transparent">
                                    <?php
                      $qr2=mysqli_query($con,"select * from tracking_lead where status_name = '".$Concretado."' and date_create between '".$initial_date."' and '".$final_date."'");
					  $oq2=mysqli_num_rows($qr2);
					  ?>
                                    <span class="item-title">Concretado</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $oq2;?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>


                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <?php
                      $qr=mysqli_query($con,"select * from tracking_lead where status_name = '".$Cancelado."' and date_create between '".$initial_date."' and '".$final_date."'");
					  $oq=mysqli_num_rows($qr);
					  ?>
                                    <span class="item-title">Cancelado</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $oq?>"
                                        data-animation-duration="800">0</span>
                                </div>
                            </div>

                            <div class="widget-stats ">
                                <div class="wrapper last">
                                    <?php
                      $qr3=mysqli_query($con,"select * from tracking_lead where date_create between '".$initial_date."' and '".$final_date."'");
					  $oq3=mysqli_num_rows($qr3);
					  ?>
                                    <span class="item-title">Total</span> <span
                                        class="item-count animate-number semi-bold" data-value="<?php echo $oq3;?>"
                                        data-animation-duration="700">0</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD TILES -->
            <!-- START DASHBOARD CHART -->

            <div class="col-lg-12" style="min-height:280px;">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Visita de todos los Asesores
                        </h3>

                        <script type="text/javascript">
                        var visitorsCount = [];
                        var visitorsCount2 = [];
                        var myCat = [];
                        </script>
                        <?php
								$totaldays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); 
                                								
								$month_array=array();
                                $month_array2=array();
								for($i=1; $i<=$totaldays; $i++)
								{
									if(!array_key_exists($i,$month_array) )
									{
										$key = '';
										if($i<10)
										{
											$key = '0'.$i;
											$month_array[$key] = 0;

										}
										else
										{
											$month_array[$i] = 0;
                                            
										}


										?>
                        <script type="text/javascript">
                        var myKey = "Dia " + '<?php echo $i; ?>';

                        myCat.push(myKey);
                        </script>
                        <?php
										
									}
                                    }

								$results = mysqli_query($con,"SELECT logindate FROM usercheck where logindate between '".$initial_date."' and '".$final_date."'");

									//$month_array2= $month_array;
									if(mysqli_num_rows($results) >0)
									{
                                                                               
										while($row = mysqli_fetch_row($results))
										{
											$user_date = $row[0];
                                            $dateArray = explode('-',$user_date);
											$year = $dateArray[0];
											$monthName = date("M", mktime(0, 0, 0, $dateArray[1], 10));
											$currentMonth = date('m',mktime(0, 0, 0, $dateArray[1], 10));
                                            // echo $monthName; 
											//$month = date("M", strtotime($user_date));
											//echo $month;
											
											
											//echo $month.'<br/>';
											
											//$day = date('d',$dateArray));
											
											if($year == date("Y") && $currentMonth == date("m"))
											{
												
												if(array_key_exists($dateArray[2],$month_array))
												{
													$month_array[$dateArray[2]] = $month_array[$dateArray[2]] + 1; //por cada vez que encuentra una fecha se va sumando 1
												}
											}

                                            /**                                            
                                            if($year == date("Y") && $currentMonth == date("m"))
											{
												
												if(array_key_exists($dateArray[2],$month_array2))
												{
                                                    $month_array2[$dateArray[2]] = ($month_array2[$dateArray[2]] + 2);
                                                    echo $month_array2[$dateArray[2]];
                                                    echo "</br>";
												}
											}	**/
										}
                                        //$month_array2= $month_array; // se puede asignar el mismo array a uno nuevo y aumentar en 1 el contador para mostrar en otro push
									}
									//print_r($month_array);
                                    //print_r($month_array2);
									foreach($month_array as $key=>$value)
									{
                                    ?>
                        <script type="text/javascript">
                        visitorsCount.push(<?php echo $value;?>);
                        //visitorsCount2.push(<?php echo ($value)+6;?>); // se puede recorrer el mismo bucle asignando otros valores a la otra leyenda
                        </script>
                        <?php									
									}
                                    ?>



                        <script type="text/javascript">
                        var d = new Date();
                        var month = new Array();
                        month[0] = "Enero";
                        month[1] = "Febrero";
                        month[2] = "Marzo";
                        month[3] = "Abril";
                        month[4] = "Mayo";
                        month[5] = "Junio";
                        month[6] = "Julio";
                        month[7] = "Agosto";
                        month[8] = "Septiembre";
                        month[9] = "Octubre";
                        month[10] = "Noviembre";
                        month[11] = "Diciembre";
                        var n = month[d.getMonth()];
                        $(function() {
                            $('#container').highcharts({
                                title: {
                                    text: 'Visitas diarias de Asesores - Mes:' + n,
                                    x: -20 //center
                                },
                                subtitle: {
                                    text: '',
                                    x: -20
                                },
                                xAxis: {
                                    categories: myCat
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Contador de Visitas'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#808080'
                                    }]
                                },
                                tooltip: {
                                    valueSuffix: ' Asesores'
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 0
                                },
                                series: [{
                                    name: 'Visitantes',
                                    data: visitorsCount
                                }]
                            });
                        });
                        </script>
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    </div>
                    <div class="panel-body">
                        <div id="morris-line-chart"></div>
                        <div class="text-right">
                            <a href=manage-users.php>Ver Asesores <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD CHART -->

            <!-- START DASHBOARD LEADS CHART -->
            <div class="col-lg-12" style="min-height:280px;">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Leads
                        </h3>

                        <script type="text/javascript">
                        var leadsSolicitud = [];
                        var leadsSeguimiento = [];
                        var leadsConcretado = [];
                        var leadsCancelado = [];
                        var myCat2 = [];
                        </script>
                        <?php
								$totaldays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); 
                                								
								$month_array=array();
                                $month_array_seg=array();
                                $month_array_con=array();
                                $month_array_can=array();
								for($i=1; $i<=$totaldays; $i++)
								{
									if(!array_key_exists($i,$month_array) )
									{
										$key = '';
										if($i<10)
										{
											$key = '0'.$i;
											$month_array[$key] = 0;

										}
										else
										{
											$month_array[$i] = 0;
                                            
										}


										?>
                        <script type="text/javascript">
                        var myKeyw = "Dia " + '<?php echo $i; ?>';

                        myCat2.push(myKeyw);
                        </script>
                        <?php
										
									}
                                    }

                               
								$results = mysqli_query($con,"SELECT date_create, status_name FROM tracking_lead where date_create between '".$initial_date."' and '".$final_date."'");
                                    $month_array_seg=$month_array;
                                    $month_array_con=$month_array;
                                    $month_array_can=$month_array;

									//$month_array2= $month_array;
									if(mysqli_num_rows($results) >0)
									{
                                                                               
										while($row = mysqli_fetch_row($results))
										{
                                            //Solicitud
                                            if ($row[1] == $Solicitud ){
                                                $user_date = $row[0];            
                                                $dateArraySol = explode('-',$user_date);
                                                $year = $dateArraySol[0];
                                                $monthName = date("M", mktime(0, 0, 0, $dateArraySol[1], 10));
                                                $currentMonth = date('m',mktime(0, 0, 0, $dateArraySol[1], 10));
                                                
                                                if($year == date("Y") && $currentMonth == date("m"))
                                                {
                                                    
                                                    if(array_key_exists($dateArraySol[2],$month_array))
                                                    {
                                                        $month_array[$dateArraySol[2]] = $month_array[$dateArraySol[2]] + 1; //por cada vez que encuentra una fecha se va sumando 1
                                                    }
                                                }
                                            }

                                            //Seguimiento
                                            if ($row[1] == $Seguimiento ){
                                                $user_date = $row[0];            
                                                $dateArraySeg = explode('-',$user_date);
                                                $year = $dateArraySeg[0];
                                                $monthName = date("M", mktime(0, 0, 0, $dateArraySeg[1], 10));
                                                $currentMonth = date('m',mktime(0, 0, 0, $dateArraySeg[1], 10));
                                                
                                                if($year == date("Y") && $currentMonth == date("m"))
                                                {
                                                    
                                                    if(array_key_exists($dateArraySeg[2],$month_array_seg))
                                                    {
                                                        $month_array_seg[$dateArraySeg[2]] = $month_array_seg[$dateArraySeg[2]] + 1; //por cada vez que encuentra una fecha se va sumando 1
                                                    }
                                                }
                                            }

                                            
                                            //Concretado
                                            if ($row[1] == $Concretado ){
                                                $user_date = $row[0];            
                                                $dateArrayCon = explode('-',$user_date);
                                                $year = $dateArrayCon[0];
                                                $monthName = date("M", mktime(0, 0, 0, $dateArrayCon[1], 10));
                                                $currentMonth = date('m',mktime(0, 0, 0, $dateArrayCon[1], 10));
                                                
                                                if($year == date("Y") && $currentMonth == date("m"))
                                                {
                                                    
                                                    if(array_key_exists($dateArrayCon[2],$month_array_con))
                                                    {
                                                        $month_array_con[$dateArrayCon[2]] = $month_array_con[$dateArrayCon[2]] + 1; //por cada vez que encuentra una fecha se va sumando 1
                                                    }
                                                }
                                            }

                                            //Cancelado
                                            if ($row[1] == $Cancelado ){
                                                $user_date = $row[0];            
                                                $dateArrayCan = explode('-',$user_date);
                                                $year = $dateArrayCan[0];
                                                $monthName = date("M", mktime(0, 0, 0, $dateArrayCan[1], 10));
                                                $currentMonth = date('m',mktime(0, 0, 0, $dateArrayCan[1], 10));
                                                
                                                if($year == date("Y") && $currentMonth == date("m"))
                                                {
                                                    
                                                    if(array_key_exists($dateArrayCan[2],$month_array_can))
                                                    {
                                                        $month_array_can[$dateArrayCan[2]] = $month_array_can[$dateArrayCan[2]] + 1; //por cada vez que encuentra una fecha se va sumando 1
                                                    }
                                                }
                                            }
		

										}
                                        
									}
							                                    
									foreach($month_array as $key=>$value)
									{
                                    ?>
                                        <script type="text/javascript">
                                        leadsSolicitud.push(<?php echo $value;?>);
                                        </script>
                                        <?php									
									}
                                    ?>
                                    <?php
                                    foreach($month_array_seg as $key=>$value)
									{
                                    ?>
                                        <script type="text/javascript">
                                        leadsSeguimiento.push(<?php echo $value;?>);
                                        </script>
                                        <?php									
									}
                                    ?>
                                    <?php
                                    foreach($month_array_con as $key=>$value)
									{
                                    ?>
                                        <script type="text/javascript">
                                        leadsConcretado.push(<?php echo $value;?>);
                                        </script>
                                        <?php									
									}
                                    ?>
                                    <?php
                                    foreach($month_array_can as $key=>$value)
									{
                                    ?>
                                        <script type="text/javascript">
                                        leadsCancelado.push(<?php echo $value;?>);
                                        </script>
                                        <?php									
									}
                                    ?>



                        <script type="text/javascript">
                        var d = new Date();
                        var month = new Array();
                        month[0] = "Enero";
                        month[1] = "Febrero";
                        month[2] = "Marzo";
                        month[3] = "Abril";
                        month[4] = "Mayo";
                        month[5] = "Junio";
                        month[6] = "Julio";
                        month[7] = "Agosto";
                        month[8] = "Septiembre";
                        month[9] = "Octubre";
                        month[10] = "Noviembre";
                        month[11] = "Diciembre";
                        var n = month[d.getMonth()];
                        $(function() {
                            $('#container2').highcharts({
                                title: {
                                    text: 'Informe Leads - Mes:' + n,
                                    x: -20 //center
                                },
                                subtitle: {
                                    text: '',
                                    x: -20
                                },
                                xAxis: {
                                    categories: myCat2
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Cantidad de Leads'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#808080'
                                    }]
                                },
                                tooltip: {
                                    valueSuffix: ' Leads'
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 0
                                },
                                series: [{
                                    name: 'Solicitud',
                                    data: leadsSolicitud
                                },
                                {
                                    name: 'Seguimiento',
                                    data: leadsSeguimiento
                                },
                                {
                                    name: 'Concretado',
                                    data: leadsConcretado
                                },
                                {
                                    name: 'Cancelado',
                                    data: leadsCancelado
                                }
                            ]
                            });
                        });
                        </script>
                        <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    </div>
                    <div class="panel-body">
                        <div id="morris-line-chart"></div>
                        <div class="text-right">
                            <a href=manage-contacts.php>Ver Contactos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END DASHBOARD LEADS CHART -->

        </div>

    </div>

    </div>
    </div>
    <!-- BEGIN CHAT -->

    </div>
    <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="../assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="../assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="../assets/plugins/skycons/skycons.js"></script>
    <script src="../assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script type="../text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>
    <script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
    <script src="../assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
    <script src="../assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <script src="../assets/js/core.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <script src="../assets/js/demo.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard_v2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/exporting.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".live-tile,.flip-list").liveTile();
    });
    </script>
</body>

</html>