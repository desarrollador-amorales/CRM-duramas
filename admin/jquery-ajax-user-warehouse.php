<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_users_warehouse'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date_user_warehouse'];
    $final_date = $_REQUEST['final_date_user_warehouse'];

    if(empty($initial_date) && empty($final_date)){
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
    }
     

    $sql =" SELECT x.*,(x.Solicitud + x.Seguimiento + x.Concretado + x.Cancelado) as Total ";
    $sql.=" FROM ";
	$sql.=" ( ";
        $sql.=" SELECT ";
		$sql.=" uw.name_warehouse , u2.name, ( ";
            $sql.=" SELECT ";
			$sql.=" COUNT(*) ";
            $sql.=" FROM ";
			$sql.=" tracking_lead tl2 ";
            $sql.=" where ";
			$sql.=" u2.name = tl2.user_name ";
			$sql.=" AND uw.name_warehouse = tl2.city_warehouse ";
			$sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
			$sql.=" AND tl2.status_name = 'Solicitud' ) as Solicitud , ( ";
                $sql.=" SELECT ";
                $sql.=" COUNT(*) ";
                $sql.=" FROM ";
                $sql.=" tracking_lead tl2 ";
                $sql.=" where ";
                $sql.=" u2.name = tl2.user_name ";
                $sql.=" AND uw.name_warehouse = tl2.city_warehouse ";
                $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                $sql.=" AND tl2.status_name = 'Seguimiento' ) as Seguimiento, ( ";
                    $sql.=" SELECT ";
                    $sql.=" COUNT(*) ";
                    $sql.=" FROM ";
                    $sql.=" tracking_lead tl2 ";
                    $sql.=" where ";
                    $sql.=" u2.name = tl2.user_name ";
                    $sql.=" AND uw.name_warehouse = tl2.city_warehouse ";
                    $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                    $sql.=" AND tl2.status_name = 'Concretado' ) as Concretado, ( ";
                        $sql.=" SELECT ";
                        $sql.=" COUNT(*) ";
                        $sql.=" FROM ";
                        $sql.=" tracking_lead tl2 ";
                        $sql.=" where ";
                        $sql.=" u2.name = tl2.user_name ";
                        $sql.=" AND uw.name_warehouse = tl2.city_warehouse ";
                        $sql.=" AND tl2.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                        $sql.=" AND tl2.status_name = 'Cancelado' ) as Cancelado ";
                        $sql.=" FROM ";
                        $sql.=" user u2, user_warehouse uw WHERE u2.id = uw.id_user AND u2.status = 1  ";
                        //Si es que el buscador esta lleno ingresa a la condicion
                         if( !empty($requestData['search']['value']) ) {
                            $sql.=" AND ( uw.name_warehouse LIKE '%".$requestData['search']['value']."%' ";
                            $sql.=" OR u2.name LIKE '%".$requestData['search']['value']."%' )";
                        } 
                        $sql.=" group by ";
                        $sql.=" u2.name , uw.name_warehouse ";
                        $sql.=" order by ";
                        $sql.=" uw.name_warehouse) as x ";
                        


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
        $nestedData['city_warehouse'] = $row["name_warehouse"];
        $nestedData['user_name'] = $row["name"];
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