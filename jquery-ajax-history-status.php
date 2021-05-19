<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_status_lead'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $estado = (isset($_REQUEST['estado']))?$_REQUEST['estado']:""; 
    $user_name = $_REQUEST['user_name'];
    $tracking_lead_id_gen = $_REQUEST['tracking_lead_id_gen'];

    if(!empty($estado) || $estado!= ""){
        mysqli_query($con,"update tracking_lead set status_name='".$estado."' where tracking_lead_id_gen='".$tracking_lead_id_gen."'");
        mysqli_query($con,"insert into history_lead_status (tracking_lead_id,user_name,status) values('$tracking_lead_id_gen','$user_name','$estado')");
    }

    $columns = ' date_create, user_name, status';
    $table = ' history_lead_status ';
    $where = " WHERE user_name!='' and tracking_lead_id = '".$tracking_lead_id_gen."'";

    $columns_order = array(
        0 => 'date_create',
        1 => 'user_name',
        2 => 'status'
    );

    $sql = "SELECT ".$columns." FROM ".$table." ".$where;

    $result = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    //Si es que el buscador esta lleno ingresa a la condicion
    /**if( !empty($requestData['search']['value']) ) {
        $sql.=" AND ( user_name LIKE '%".$requestData['search']['value']."%' ";
        $sql.=" OR date_create LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR note LIKE '%".$requestData['search']['value']."%' )";

    }**/

    $result = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    $sql .= " ORDER BY ". $columns_order[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir'];

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
        $time = strtotime($row["date_create"]);
        //$nestedData['logindate'] = date('h:i:s A - d M, Y', $time);
        $nestedData['date_create'] = date('d-M-Y h:i:sa', $time);

        $nestedData['user_name'] = $row["user_name"];
        $nestedData['estado'] = $row["status"];
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