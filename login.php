<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE email='".$_POST['email']."' and password='".$_POST['password']."'and status = 1");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    $_SESSION['login']=$_POST['email'];
    $_SESSION['id']=$num['id'];
    $_SESSION['name']=$num['name'];
    $val3 =date("Y/m/d");
    date_default_timezone_set("America/Guayaquil");
    $time=date("h:i:sa");
    $tim = $time;
    $ip_address=$_SERVER['REMOTE_ADDR'];
    $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
    $addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 
    $city = $addrDetailsArr['geoplugin_city']; 
    $country = $addrDetailsArr['geoplugin_countryName'];
    ob_start();
    system('ipconfig /all');
    $mycom=ob_get_contents();
    ob_clean();
    $findme = "Physical";
    $pmac = strpos($mycom, $findme);
    $mac=substr($mycom,($pmac+36),17);
    $ret=mysqli_query($con,"insert into usercheck(logindate,logintime,user_id,username,email,ip,mac,city,country)values('".$val3."','".$tim."','".$_SESSION['id']."','".$_SESSION['name']."','".$_SESSION['login']."','$ip_address','$mac','$city','$country')");
    
    //empieza la distribucion de los leads pendientes a los asesores y su actualizacion
    $name_warehouse_user=mysqli_query($con,"SELECT name_warehouse FROM user_warehouse where id_user = '".$num['id']."' order by name_warehouse");
    //echo 'contador de ciudades'.$name_warehouse_user->num_rows;
    //echo "<br>";

     
      while($city_user=mysqli_fetch_array($name_warehouse_user)){
        //echo"<br>";  
        //echo '<h3>'.$city_user['name_warehouse'].'</h3>';
        //echo"<br>";

          $list_lead=mysqli_query($con,"SELECT * FROM lead where status = 'P' and city_warehouse= '".$city_user['name_warehouse']."'");          
          $row_cnt_leads =$list_lead->num_rows;

         // echo 'contador de leads-->'.$row_cnt_leads;
         // echo "<br>";
         // echo "<br>";

         $contUser=0;
         $contLead=0;
          while($lead= mysqli_fetch_array($list_lead)){
            $contUserLoop=0;

            //if ($contLead == 0) {
                $list_users=mysqli_query($con, "SELECT u.email, u.name, u.id FROM user_warehouse uw, user u where u.id=uw.id_user and uw.name_warehouse='".$city_user['name_warehouse']."' and u.status = 1 and uw.last_assignment != 1 order by uw.last_assignment asc");
                $row_cnt_users = $list_users->num_rows;
                //mysqli_query($con,"update user_warehouse set last_assignment = '0' where name_warehouse='".$city_user['name_warehouse']."'");
            //}
            
            while($user= mysqli_fetch_array($list_users)){

                if($contUserLoop == $contUser){
                    //asignar y actualizar a la tabla de leads
                    //echo 'El cliente '.$lead['name_lead'].' fue asignado a el usuario '.$user['name'];                   
                    //mysqli_query($con,"update lead set status='A' where id_lead_gen='".$lead['id_lead_gen']."'");
                    //echo "<br>";
                    break;
               }
            
                $contUserLoop+=1;
        
                continue;  
                
            }
            $contUser+=1;
            $contLead+=1;

            if($contUser == $row_cnt_users){
                //echo "<br>";
                //echo 'pasa por aqui---- ultimo y actualiza';
                //echo "<br>";
               mysqli_query($con,"update user_warehouse set last_assignment = '0' where name_warehouse='".$city_user['name_warehouse']."'");
               $contUser = 0;
            }

            if($contLead == $row_cnt_leads ){
                //cuando el contador de leads sea el mismo al de su tamaño de la lista de leads
                //actualizaremos el ultimo asignado en la tabla user
                //echo "<br>";
                //echo'ultimo asesor '.$user['name'].' con id = '.$user['id'].' asignado en el local '.$city_user['name_warehouse'].' contador-->'.$contLead;
                
                mysqli_query($con,"update user_warehouse set last_assignment = '1' where id_user='".$user['id']."' and name_warehouse='".$city_user['name_warehouse']."'");
                //echo "<br>";
                

            }          

        }

      }

    $extra="dashboard.php";
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
}
else
{
$_SESSION['action1']="Invalid username or password";
$extra="login.php";

echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Acceder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

</head>

<body class="error-body no-top">
    <div class="container">
        <div class="row login-container column-seperation">
            <div class="col-md-5 col-md-offset-1">
                <h2>Acceder a CRM Duramas</h2>
                <!--<p>
                    <a href="registration.php">Registrate Ahora!</a> ...
                </p>-->
                <br>


            </div>
            <div class="col-md-5 "> <br>
                <p style="color:#F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
                <form id="login-form" class="login-form" action="" method="post">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Email</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input type="email" name="email" id="txtusername" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Contraseña</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input type="password" name="password" id="txtpassword" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group  col-md-10">
                            <!--<div class="checkbox checkbox check-success"> <a href="forgot-password.php">Olvido su
                                    Contraseña</a>&nbsp;&nbsp;
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-primary btn-cons pull-right" name="login"
                                type="submit">Acceder</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/js/login.js" type="text/javascript"></script>
</body>

</html>