<?php
session_start();
include("checklogin.php");
check_login();

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_seller_warehouse'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date_user_warehouse'];
    $final_date = $_REQUEST['final_date_user_warehouse'];
    $email_user_name=  $_SESSION['login']; // realiza consulta con email del usuario  que inicio sesion

    if(empty($initial_date) && empty($final_date)){
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
    }
     

    $sql =" SELECT x.*,(x.Solicitud + x.Seguimiento + x.Concretado + x.Cancelado) as Total ";
    $sql.=" FROM ";
	$sql.=" ( ";
        $sql.=" SELECT ";
		$sql.=" tl.city_warehouse , ( ";
            $sql.=" SELECT ";
			$sql.=" COUNT(*) ";
            $sql.=" FROM ";
			$sql.=" tracking_lead tl2 ";
            $sql.=" where ";
			$sql.=" tl2.email_user_name = tl.email_user_name ";
			$sql.=" AND tl.city_warehouse = tl2.city_warehouse ";
			$sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
			$sql.=" AND tl2.status_name = 'Solicitud' ) as Solicitud , ( ";
                $sql.=" SELECT ";
                $sql.=" COUNT(*) ";
                $sql.=" FROM ";
                $sql.=" tracking_lead tl2 ";
                $sql.=" where ";
                $sql.=" tl2.email_user_name = tl.email_user_name ";
                $sql.=" AND tl.city_warehouse = tl2.city_warehouse ";
                $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                $sql.=" AND tl2.status_name = 'Seguimiento' ) as Seguimiento, ( ";
                    $sql.=" SELECT ";
                    $sql.=" COUNT(*) ";
                    $sql.=" FROM ";
                    $sql.=" tracking_lead tl2 ";
                    $sql.=" where ";
                    $sql.=" tl2.email_user_name = tl.email_user_name ";
                    $sql.=" AND tl.city_warehouse = tl2.city_warehouse ";
                    $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                    $sql.=" AND tl2.status_name = 'Concretado' ) as Concretado, ( ";
                        $sql.=" SELECT ";
                        $sql.=" COUNT(*) ";
                        $sql.=" FROM ";
                        $sql.=" tracking_lead tl2 ";
                        $sql.=" where ";
                        $sql.=" tl2.email_user_name = tl.email_user_name ";
                        $sql.=" AND tl.city_warehouse = tl2.city_warehouse ";
                        $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                        $sql.=" AND tl2.status_name = 'Cancelado' ) as Cancelado ";
                        $sql.=" FROM ";
                        $sql.=" tracking_lead tl WHERE tl.user_name != '' and tl.email_user_name ='".$email_user_name."' ";
                        //Si es que el buscador esta lleno ingresa a la condicion
                         if( !empty($requestData['search']['value']) ) {
                            $sql.=" AND ( tl.city_warehouse LIKE '%".$requestData['search']['value']."%' )";
                           } 
                        $sql.=" group by ";
                        $sql.=" tl.city_warehouse ";
                        $sql.=" order by ";
                        $sql.=" tl.city_warehouse) as x ";
                        


    $result = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    if($requestData['length'] != "-1"){
        //importante escoger de acuerdo al numero de entradas que escoja el usuario
        $sql .= " LIMIT ".$requestData['start']." ,".$requestData['length'];
    }

    $result = mysqli_query($con, $sql);
    $data = array();
    $counter = $start;

    $count = $start;
    while($row = mysqli_fetch_array($result)){
        $count++;
        $nestedData = array();

        $nestedData['counter'] = $count;
        $nestedData['city_warehouse'] = $row["city_warehouse"];
        $nestedData['Solicitud'] = $row["Solicitud"];
        $nestedData['Seguimiento'] = $row["Seguimiento"];
        $nestedData['Concretado'] = $row["Concretado"];
        $nestedData['Cancelado'] = $row["Cancelado"];
        $nestedData['Total'] = $row["Total"];
        
        $data[] = $nestedData;
    }

    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),
        "recordsTotal"    => intval( $totalData),
        "recordsFiltered" => intval( $totalFiltered ),
        "records"         => $data
    );

    echo json_encode($json_data);
}

?>