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
     

    $sql =" SELECT x.city_warehouse,x.name,sum(x.Solicitud) as Solicitud,sum(x.Seguimiento) as Seguimiento,sum(x.Concretado) as Concretado, ";
    $sql.=" sum(x.Cancelado) as Cancelado, ";
	$sql.=" sum(x.Solicitud+x.Seguimiento+x.Concretado+x.Cancelado) as Total ";
        $sql.=" FROM ";
		$sql.=" ( ";
            $sql.=" SELECT ";
			$sql.=" tl.city_warehouse , u2.name,tl.status_name , ";
            $sql.=" (CASE WHEN tl.status_name = 'Solicitud' Then count(tl.status_name) else 0 END) AS Solicitud, ";
			$sql.=" (CASE WHEN tl.status_name = 'Seguimiento' Then count(tl.status_name) else 0 END) AS Seguimiento, ";
            $sql.=" (CASE WHEN tl.status_name = 'Concretado' Then count(tl.status_name) else 0 END) AS Concretado, ";
			$sql.=" (CASE WHEN tl.status_name = 'Cancelado' Then count(tl.status_name) else 0 END) AS Cancelado ";
			$sql.=" FROM ";
			$sql.=" user u2, tracking_lead tl ";
			$sql.=" WHERE ";
                $sql.=" u2.status = 1 ";
                $sql.=" AND tl.email_user_name = u2.email ";
                $sql.=" AND tl.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
                $sql.=" AND tl.status_name in ('Solicitud', 'Seguimiento', 'Concretado', 'Cancelado') ";
                        //Si es que el buscador esta lleno ingresa a la condicion
                         if( !empty($requestData['search']['value']) ) {
                            $sql.=" AND ( tl.city_warehouse LIKE '%".$requestData['search']['value']."%' ";
                            $sql.=" OR u2.name LIKE '%".$requestData['search']['value']."%' )";
                        } 
                        $sql.=" group by ";
                        $sql.=" u2.name , tl.city_warehouse, tl.status_name ";
                        $sql.=" order by ";
                        $sql.=" tl.city_warehouse) as x ";
                        $sql.=" group by x.name, x.city_warehouse order by x.city_warehouse ";
                        


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