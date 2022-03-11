<?php
$serverName = "192.168.16.75,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AdmDura", "UID"=>"sa", "PWD"=>"AngJua1289");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>