<?php

include("dbconnection.php");

if($_REQUEST['action'] == 'fetch_pro_fac'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date_pro_fac'];
    $final_date = $_REQUEST['final_date_pro_fac'];

    if(empty($initial_date) && empty($final_date)){
        $initial_date = date("Y-m-01"); //fecha inicio de mes actual
        $final_date = date("Y-m-t"); // fecha fin de mes actual
    }
     

    $sql =" SELECT ";
	$sql.=" x.city_warehouse, ";
	$sql.=" (CASE ";
	$sql.=" 	WHEN x.number_proforma is null then 0 ";
	$sql.=" 	else x.number_proforma end ) number_proforma, ";
	$sql.=" (CASE ";
	$sql.=" 	WHEN x.total_proforma is null then 0 ";
	$sql.=" 	else x.total_proforma end) total_proforma, ";
	$sql.=" (CASE ";
	$sql.=" 	WHEN x.number_fac is null then 0 ";
	$sql.=" 	else x.number_fac end) number_factura, ";
	$sql.=" (CASE ";
	$sql.=" 	WHEN x.total_factura is null then 0 ";
	$sql.=" 	else x.total_factura end) total_factura ";
    $sql.=" FROM ";
	$sql.=" ( ";
        $sql.=" SELECT ";
		$sql.=" tl.city_warehouse , ( ";
            $sql.=" SELECT ";
			$sql.="  count(*) as num_proforma ";
            $sql.=" FROM ";
			$sql.=" history_lead_proforma hlp_n, tracking_lead tl4 ";
            $sql.=" where ";
			$sql.=" tl4.tracking_lead_id_gen = hlp_n.tracking_lead_id ";
			$sql.=" and tl4.city_warehouse = tl.city_warehouse ";
			$sql.=" and cast(hlp_n.date_create as date) between '".$initial_date."' and '".$final_date."' ";
            $sql.=" group by ";
			$sql.=" tl4.city_warehouse) as number_proforma, ( ";
                $sql.=" SELECT ";
                $sql.=" sum(hlp_v.value_proforma) as total_proforma ";
                $sql.=" FROM ";
                $sql.=" history_lead_proforma hlp_v, tracking_lead tl5 ";
                $sql.=" where ";
                $sql.=" tl5.tracking_lead_id_gen = hlp_v.tracking_lead_id ";
                $sql.=" and tl5.city_warehouse = tl.city_warehouse ";
                $sql.=" and cast(hlp_v.date_create as date) between '".$initial_date."' and '".$final_date."' ";
                $sql.=" group by ";
                $sql.=" tl5.city_warehouse ) as total_proforma, ( ";
                    $sql.=" SELECT ";
                    $sql.=" count(*)as num_factura ";
                    $sql.=" FROM ";
                    $sql.=" history_lead_factura hlf_n, tracking_lead tl2 ";
                    $sql.=" where ";
                    $sql.=" tl2.tracking_lead_id_gen = hlf_n.tracking_lead_id ";
                    $sql.=" and tl2.city_warehouse = tl.city_warehouse ";
                    $sql.=" and cast(hlf_n.date_create as date) between '".$initial_date."' and '".$final_date."' ";
                    $sql.=" group by ";
                    $sql.=" tl2.city_warehouse) as number_fac, ( ";
                        $sql.=" SELECT ";
                        $sql.=" sum(hlf_v.value_factura) as total_factura ";
                        $sql.=" FROM ";
                        $sql.=" history_lead_factura hlf_v, tracking_lead tl3 ";
                        $sql.=" where ";
                        $sql.=" tl3.tracking_lead_id_gen = hlf_v.tracking_lead_id  ";
                        $sql.=" and tl3.city_warehouse = tl.city_warehouse ";
                        $sql.=" and cast(hlf_v.date_create as date) between '".$initial_date."' and '".$final_date."' ";
                        $sql.=" group by ";
                        $sql.=" tl3.city_warehouse ) as total_factura ";
                        $sql.=" FROM ";
                        $sql.=" tracking_lead tl WHERE tl.city_warehouse != '' ";
                        //Si es que el buscador esta lleno ingresa a la condicion
                        if( !empty($requestData['search']['value']) ) {
                            $sql.=" AND ( tl.city_warehouse LIKE '%".$requestData['search']['value']."%' )";
                        } 
                        $sql.=" group by ";
                        $sql.=" tl.city_warehouse )as x ";
                        


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
        $nestedData['number_proforma'] = $row["number_proforma"];
        $nestedData['total_proforma'] = $row["total_proforma"];
        $nestedData['number_factura'] = $row["number_factura"];
        $nestedData['total_factura'] = $row["total_factura"];
                
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