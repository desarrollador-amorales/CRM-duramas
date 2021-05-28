<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE email='".$_POST['email']."' and password='".$_POST['password']."'and status = 1");
$num=mysqli_fetch_array($ret);

$ret_admin=mysqli_query($con,"SELECT * FROM admin WHERE user='".$_POST['email']."' and password='".$_POST['password']."'");
$num_admin=mysqli_fetch_array($ret_admin);

$ret_supervisor=mysqli_query($con,"SELECT * FROM supervisor WHERE email='".$_POST['email']."' and password='".$_POST['password']."'");
$num_supervisor=mysqli_fetch_array($ret_supervisor);

if($num_admin>0)
{
    $extra="admin/home.php";
    $_SESSION['alogin']=$_POST['email'];
    $_SESSION['id']=$num_admin['id'];
    $_SESSION['name_admin']=$num_admin['name'];
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
}

if($num_supervisor>0)
{
    $extra="supervisor/dashboard-supervisor.php";
    $_SESSION['login']=$_POST['email'];
    $_SESSION['id_supervisor']=$num_supervisor['supervisor_id_gen'];
    $_SESSION['name_supervisor']=$num_supervisor['name'];
    $_SESSION['rol_supervisor']=$num_supervisor['rol'];
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
}


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
    
    //Estado inicial siempre tendra el orden 1
    $row_status=mysqli_query($con,"select name from status where order_status = 1");
    $status_initial_res=mysqli_fetch_array($row_status);
    //empieza la distribucion de los leads pendientes a los asesores y su actualizacion
    $name_warehouse_user=mysqli_query($con,"SELECT name_warehouse FROM user_warehouse where id_user = '".$num['id']."' order by name_warehouse");
    //echo 'contador de ciudades'.$name_warehouse_user->num_rows;
    //echo "<br>";

     
      while($city_user=mysqli_fetch_array($name_warehouse_user)){
        //echo"<br>";  
       // echo '<h3>'.$city_user['name_warehouse'].'</h3>';
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
                    //asignar y actualizar a la tabla de leads, tambien llenar la tabla contactos
                    //echo 'El cliente '.$lead['name_lead'].' fue asignado a el usuario '.$user['name'];                   
                    mysqli_query($con,"insert into tracking_lead(name_lead,mobile_number,city_warehouse,email_lead,user_name,email_user_name,date_create,platform,form_id,status_name)
                    values('".$lead['name_lead']."','".$lead['mobile_number']."','".$lead['city_warehouse']."','".$lead['email']."','".$user['name']."','".$user['email']."','".$lead['date_create']."','".$lead['platform']."','".$lead['form_id']."','".$status_initial_res['name']."')");
                    
                    mysqli_query($con,"insert into contact (name,email,mobile,name_warehouse)values('".$lead['name_lead']."','".$lead['email']."','".$lead['mobile_number']."','".$lead['city_warehouse']."')");
                   
                    mysqli_query($con,"update lead set status='A' where id_lead_gen='".$lead['id_lead_gen']."'");
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
    $extra="index.php";

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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="assets/css/style-login-user.css" rel="stylesheet" type="text/css" />
    <!------ Include the above in your HEAD tag ---------->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
        integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>
<body class="main-bg">
    <div class="login-container text-c animate__animated animate__flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">CRM DURAMAS</h3>
        <p class="text-whitesmoke">Iniciar Sesion</p>
        <div class="container-content">
            <form id="login-form" class="margin-t" action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" id="txtusername" placeholder="Usuario" class="form-control"
                        required="true">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="txtpassword" placeholder="********" class="form-control"
                        required="true">
                </div>
                <button type="submit" name="login" class="form-button button-l margin-b">Acceder</button>
                <!--<a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
                <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                <a class="text-darkyellow" href="#"><small>Sign Up</small></a>-->
            </form>
            <p class="margin-t text-whitesmoke"><small> Sistemas Duramas &copy; 2021</small> </p>
        </div>
    </div>

</body>


</html>