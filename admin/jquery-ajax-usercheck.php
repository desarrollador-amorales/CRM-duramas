<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_users'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date'];
    $final_date = $_REQUEST['final_date'];

    if(!empty($initial_date) && !empty($final_date)){
        $date_range = " AND logindate BETWEEN '".$initial_date."' AND '".$final_date."' ";
    }else{
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
        $date_range = " AND logindate BETWEEN '".$initial_date."' AND '".$final_date."' ";
    }


    $columns = ' user_id, username, logindate, logintime, email, ip, mac, city, country ';
    $table = ' usercheck ';
    $where = " WHERE username!='' ".$date_range;

    $columns_order = array(
        0 => 'user_id',
        1 => 'username',
        2 => 'logindate',
        3 => 'logintime',
        4 => 'email',
        5 => 'ip',
        6 => 'mac',
        7 => 'city',
        8 => 'country'
    );

    $sql = "SELECT ".$columns." FROM ".$table." ".$where;

    $result = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    //Si es que el buscador esta lleno ingresa a la condicion
    if( !empty($requestData['search']['value']) ) {
        $sql.=" AND ( username LIKE '%".$requestData['search']['value']."%' ";
        $sql.=" OR logindate LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR email LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR ip LIKE '".$requestData['search']['value']."'";
        $sql.=" OR mac LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR city LIKE '%".$requestData['search']['value']."%' ";
        $sql.=" OR country LIKE '%".$requestData['search']['value']."%' )";
    }

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

        $nestedData['counter'] = $count;
        $nestedData['user_id'] = $row["user_id"];
        $nestedData['username'] = $row["username"];
        $nestedData['ip'] = $row["ip"];
        $nestedData['mac'] = $row["mac"];
        $nestedData['email'] = '<a href="mailto:'.strtolower($row["email"]).'">'.strtolower($row["email"]).'</a>';
        $nestedData['city'] = $row["city"];
        $nestedData['country'] = $row["country"];
        $nestedData['logintime'] = $row["logintime"];

        $time = strtotime($row["logindate"]);
        //$nestedData['logindate'] = date('h:i:s A - d M, Y', $time);
        $nestedData['logindate'] = date('d-M-Y', $time);

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