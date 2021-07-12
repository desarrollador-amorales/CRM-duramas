<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_tracking_lead'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date'];
    $final_date = $_REQUEST['final_date'];
    $status= $_REQUEST['status'];


    if(!empty($initial_date) && !empty($final_date)){
        $date_range = " AND tl.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
    }else{
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
        $date_range = " AND tl.date_create BETWEEN '".$initial_date."' AND '".$final_date."' ";
    }

    if ($status == 'General'){
        $sql="select tl.* from tracking_lead tl WHERE tl.user_name!=''".$date_range;
     }else{
        $sql="select tl.* from tracking_lead tl WHERE tl.user_name!='' AND tl.status_name='".$status."' ".$date_range;
     }

/**
    $columns_order = array(
        1 => 'tracking_lead_id_gen',
        2 => 'name_lead',
        3 => 'email_lead',
        4 => 'mobile_number',
        5 => 'city_warehouse',
        6 => 'user_name',
        7 => 'status_name',
        8 => 'campaing',
        9 => 'platform',
        10 => 'proforma',
        11 => 'proforma_total',
        12 => 'factura',
        13 => 'factura_total',
        14 => 'date_create'

    ); */
   
    

    //Si es que el buscador esta lleno ingresa a la condicion
     if( !empty($requestData['search']['value']) ) {
        $sql.=" AND ( user_name LIKE '%".$requestData['search']['value']."%' ";
        $sql.=" OR status_name LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR tracking_lead_id_gen LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR city_warehouse LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR mobile_number LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR email_lead LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR proforma LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR proforma_total LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR factura LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR factura_total LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR date_create LIKE '%".$requestData['search']['value']."%'";
        $sql.=" OR name_lead LIKE '".$requestData['search']['value']."%')";
    }

    //$sql .= " ORDER BY ". $columns_order[$requestData['order'][1]['column']]."   ".$requestData['order'][1]['dir'];

    
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
        
        $req=mysqli_query($con, "select description from campaing where name='".$row['form_id']."'");
        $name_campaing=mysqli_fetch_array($req);

        $nestedData['tracking_lead_id_gen'] = '<b>'.$row["tracking_lead_id_gen"].'</b>';
        $nestedData['name_lead'] = '<b>'.$row["name_lead"].'</b>';
        $nestedData['email_lead'] = '<a href="mailto:'.strtolower($row["email_lead"]).'">'.strtolower($row["email_lead"]).'</a>';
        $nestedData['mobile_number'] = '<b>'.$row["mobile_number"].'</b>';
        $nestedData['city_warehouse'] = '<b>'.$row["city_warehouse"].'</b>';
        $nestedData['user_name'] = '<b>'.$row["user_name"].'</b>';
        $nestedData['status_name'] = '<b>'.$row["status_name"].'</b>';
        if ($row['platform'] == 'fb') {
            $nestedData['platform'] = '<td><strong><i class="fa fa-facebook-square"
            style="font-size:30px;"></i></strong></td>';
        }
        if ($row['platform'] == 'ig') {
            $nestedData['platform'] = '<td><strong><i class="fa fa-instagram" style="font-size:30px;"></i></strong>
            </td>';
        }
        
        $nestedData['campaing'] = '<b>'.$name_campaing['description'].'</b>';
        $nestedData['proforma'] = '<b>'.$row["proforma"].'</b>';
        $nestedData['proforma_total'] = '<b>'.$row["proforma_total"].'</b>';
        $nestedData['factura'] = '<b>'.$row["factura"].'</b>';
        $nestedData['factura_total'] = '<b>'.$row["factura_total"].'</b>';
        $time = strtotime($row["date_create"]);
        //$nestedData['logindate'] = date('h:i:s A - d M, Y', $time);
        $nestedData['date_create'] = '<b>'.date('Y-m-d', $time).'</b>';
        

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