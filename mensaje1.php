<?php

include("dbconnection.php");
if(isset($_POST['login']))
{
    
    $list_users=mysqli_query($con, "SELECT cm.numero, cm.nombre FROM campania_marketing cm");

    while ($user= mysqli_fetch_array($list_users)) {

        $curl = curl_init();
        $number ='593'.substr($user['numero'],1,strlen($user['numero']));

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ultramsg.com/instance2091/messages/image",
          //CURLOPT_URL => "https://api.ultramsg.com/{INSTANCE_ID}/messages/chat",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/01/silver_collection.jpeg&caption=*Días de TODOS los PRODUCTOS 😃* \n \nAprovecha el *20% de DESCUENTO* en todos nuestros productos 🎉😉💎\n \nPaga a *3-6 meses intereses* con tu tarjeta de crédito preferida 💳\n \n_Promo válida Del 13 al 22 de Enero_ 🗓️\n \nRecuerda que realizamos Despachos a Nivel nacional 🚛\n \n✅Somos compras seguras y confiables\n✅Somos Asesorías VIP\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Somos los mayores importadores de piedras naturales para Ecuador\n\n📍Visítanos en: Quito-Guayaquil-Cuenca-Ambato\n \n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=bjnufb5wa2kdbdto&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/01/love-at-home.jpeg&caption=*Love at home 🤍❤️* \n\nEn el mes del amor te queremos regalar el *25% de DESCUENTO* en todos nuestros productos 😊\n\nDifiere tus compras🛍️ *3-6 meses intereses* con todas las tarjetas de crédito 💳\n \n_Promo válida Del 01 al 14 de Febrero_ 🗓️\n\n*Regalos especiales por tus compras* 🎁\n\nRecuerda que realizamos Despachos a Nivel nacional 🚛\n \n✅Siempre a la moda\n✅Siempre actualizados con nuevas tendencias\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Asesoramos tus proyectos\n\n📍Visítanos en: _Quito-Guayaquil-Cuenca-Ambato_\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=oee67jmrnxych6ut&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/02/CampanaEnero-Febrero.jpeg&caption=Colors at home 🟩🟦🟧 \n\nMás de 200 colores\n\nRecibe  25% de DESCUENTO en todos nuestros productos 😊\n\nDifiere tus compras🛍️ 3-6 meses intereses con todas las tarjetas de crédito 💳\n\nPromoción válida Del 15 al 28 de Febrero 🗓️\n\n➡️Recibe descuento adicional por Pagos en efectivo 💸\n\nRecuerda que realizamos despachos a nivel nacional 🚚\n\n✅Siempre a la moda\n✅Siempre actualizados con nuevas tendencias\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Asesoramos tus proyectos\n\n📍Visítanos en: _Quito-Guayaquil-Cuenca-Ambato_\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }         

echo '<h3>'."Mensajes de Campañas Enviados".'</h3>';

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
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">

</head>

<body class="main-bg">
    <div class="login-container text-c animate__animated animate__flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">CRM DURAMAS</h3>
        <p class="text-whitesmoke">Campaña Marketing</p>
        <div class="container-content">
            <form id="login-form" class="margin-t" action="" method="post">
                <button type="submit" name="login" class="form-button button-l margin-b">Enviar Mensajes</button>
                <!--<a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
                <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                <a class="text-darkyellow" href="#"><small>Sign Up</small></a>-->
            </form>
            <p class="margin-t text-whitesmoke"><small> Sistemas Duramas &copy; 2021</small> </p>
        </div>
    </div>

</body>


</html>