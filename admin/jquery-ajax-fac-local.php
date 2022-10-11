<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_fac_local'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date_fac_local'];
    $final_date = $_REQUEST['final_date_fac_local'];

    if(empty($initial_date) && empty($final_date)){
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
    }
     

    $sql =" SELECT tl.tracking_lead_id_gen, tl.city_warehouse,tl.name_lead,  hlf.user_name , hlf.number_factura , hlf.value_factura FROM history_lead_factura hlf, tracking_lead tl WHERE tl.tracking_lead_id_gen = hlf.tracking_lead_id  AND cast(hlf.date_create as date) BETWEEN '".$initial_date."' AND '".$final_date."' ";
       //Si es que el buscador esta lleno ingresa a la condicion
    if( !empty($requestData['search']['value']) ) {
        $sql.=" AND ( tl.city_warehouse LIKE '%".$requestData['search']['value']."%' )";
    } 

    $result = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    if($requestData['length'] != "-1"){
        //importante escoger de acuerdo al numero de entradas que escoja el usuario
        $sql .= " LIMIT ".$requestData['start']." ,".$requestData['length'];
    }

    $result = mysqli_query($con, $sql);
    $data = array();


    while($row = mysqli_fetch_array($result)){
        $nestedData = array();

        $nestedData['tracking_lead_id_gen'] = $row["tracking_lead_id_gen"];
        $nestedData['city_warehouse'] = $row["city_warehouse"];
        $nestedData['name_lead'] = $row["name_lead"];
        $nestedData['user_name'] = $row["user_name"];
        $nestedData['number_factura'] = $row["number_factura"];
        $nestedData['value_factura'] = $row["value_factura"];
                
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