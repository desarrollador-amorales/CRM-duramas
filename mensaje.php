<?php

include("dbconnection.php");
if(isset($_POST['login']))
{
    
    $list_users=mysqli_query($con, "SELECT cm.numero, cm.nombre FROM campania_marketing cm");

    while ($user= mysqli_fetch_array($list_users)) {
        $data = [
                'phone' => '593'.substr($user['numero'],1,strlen($user['numero'])), // Receivers phone
                'body' =>'http://nuevo2021.duramas.com.ec/wp-content/uploads/2021/10/WhatsApp-Image-2021-10-11-at-10.38.18.jpeg',
                'filename' => 'spider.jpeg',
                //'caption' => '*Estimado/a Cliente* '.$user['nombre'].PHP_EOL.PHP_EOL.'_Queremos conocer tu experiencia de compra en Duramas🛒_'.PHP_EOL.PHP_EOL.'Tu opinión es muy importante para nosotros 🗣️ '.PHP_EOL.PHP_EOL.'*Ayúdanos calificando en esta breve encuesta 📝*'.PHP_EOL.PHP_EOL.'Link: https://forms.gle/yfbaUqngZNykf1R2A'.PHP_EOL.PHP_EOL.'No olvides que Todos los *Viernes de Noviembre* tendremos descuentos del *35% al 40%* 😲 en _Productos Seleccionados_ 👁️‍🗨️'.PHP_EOL.PHP_EOL.'_Agradecemos tu compra y te esperamos Nuevamente 🙂_'.PHP_EOL.PHP_EOL.'www.duramas.com.ec ↖️'
                //'caption' => '*¿Estas construyendo o remodelando tu casa?🏡*'.PHP_EOL.PHP_EOL.'DURAMAS tiene lo que estás buscando 🔎'.PHP_EOL.PHP_EOL.'Visítanos todos los *Viernes de Noviembre* o llámanos y consulta por nuestros *GRANDES DESCUENTOS* 😲 por _*Black Friday*_ ⚫🔴 '.PHP_EOL.PHP_EOL.'Tenemos *grandes promociones* y sorpresas 😊👍'.PHP_EOL.PHP_EOL.'Somos tiendas confiables y seguras 🫂🔐'.PHP_EOL.PHP_EOL.'Despachos a nivel Nacional 🚛'.PHP_EOL.PHP_EOL.'*Direcciones Cuenca:*'.PHP_EOL.'✅ Av. Ordoñez Lasso 3-29 y Los Cipreses (esq)'.PHP_EOL.'✅ Av. Remigio Crespo y Remigio Romero (esq)'.PHP_EOL.PHP_EOL.'www.duramas.com.ec ↖️'
                //'caption' => '*BLACK FRIDAY DURAMAS 🔴*'.PHP_EOL.'_*del 22 al 30 de Noviembre ⚫*_'.PHP_EOL.PHP_EOL.'*Grandes DESCUENTOS*'.PHP_EOL.PHP_EOL.'*☑️ 35% al 50% de Descuento* _en productos seleccionados 💵_ Pagos en efectivo'.PHP_EOL.PHP_EOL.'*☑️ 25% de Descuento* _en productos seleccionados 💳_ Pagos con tarjeta, difiere hasta *09 meses sin intereses*'.PHP_EOL.PHP_EOL.'tenemos *grandes promociones* y sorpresas 😊👍'.PHP_EOL.PHP_EOL.'Somos tiendas confiables y seguras🔐'.PHP_EOL.PHP_EOL.'Despachos a nivel Nacional 🚛'.PHP_EOL.PHP_EOL.'*Quito-Guayaquil-Cuenca-Ambato*'.PHP_EOL.PHP_EOL.'www.duramas.com.ec ↖️'
                //'caption' => '*NAVIDAD DURAMAS 🎅🏻*'.PHP_EOL.'“Juntando Familias”👨‍👩‍👧‍👦'.PHP_EOL.PHP_EOL.'SALDOS REGALONES.🎁 Descuentos del 40% al 50% en Productos Seleccionados. 😮'.PHP_EOL.PHP_EOL.'Descuentos aplica a pagos en efectivo. 💵'.PHP_EOL.PHP_EOL.'Mármol, Granitos, Cuarzos, Cuarcitas, Cerámicas, Piedras Decorativas, Alfombras y más…👍🏻'.PHP_EOL.PHP_EOL.'¡Compra Ahora!  Promoción válida hasta agotar Stocks.'.PHP_EOL.PHP_EOL.'Visita nuestras 10 Salas de exhibición en: 📍 Quito-Guayaquil-Cuenca-Ambato'.PHP_EOL.PHP_EOL.'Calidad AAA en nuestros materiales.🌟'.PHP_EOL.PHP_EOL.'“Despachos a nivel Nacional”🚛'
                //'caption' => 'Nos interesa tus emociones 🫂...'.PHP_EOL.PHP_EOL.'Duramas te trae la *NUEVA COLECCIÓN* de Porcelanatos Españoles 🇪🇸 *Silver Collection* 💎'.PHP_EOL.PHP_EOL.'_Hogar 🏡 es donde Habita el Corazón🤍_'.PHP_EOL.PHP_EOL.'Difiere tus compras hasta 24 meses sin intereses 💳'.PHP_EOL.PHP_EOL.'Realizamos Despachos a Nivel nacional 🚛'.PHP_EOL.PHP_EOL.'Visita 😃 nuestras 10 salas de exhibición : *Quito - Guayaquil - Cuenca - Ambato*📍'.PHP_EOL.PHP_EOL.'➡️ www.duramas.com.ec'
                'caption' => '*Días de TODOS los PRODUCTOS 😃*'.PHP_EOL.PHP_EOL.'Aprovecha el *20% de DESCUENTO* en todos nuestros productos 🎉😉💎'.PHP_EOL.PHP_EOL.'Paga a *3-6 meses intereses* con tu tarjeta de crédito preferida 💳'.PHP_EOL.PHP_EOL.'_Promo válida Del 13 al 22 de Enero 🗓️_'.PHP_EOL.PHP_EOL.'Recuerda que realizamos Despachos a Nivel nacional 🚛'.PHP_EOL.PHP_EOL.'✅Somos compras seguras y confiables'.PHP_EOL.'✅Somos Asesorías VIP'.PHP_EOL.'✅Somos exclusividad en materiales'.PHP_EOL.'✅Somos calidad AAA'.PHP_EOL.'✅Somos los mayores importadores de piedras naturales para Ecuador'.PHP_EOL.PHP_EOL.'📍Visítanos en: Quito-Guayaquil-Cuenca-Ambato'.PHP_EOL.PHP_EOL.'➡️ www.duramas.com.ec'
                //'caption' => '*Días de TODOS los PRODUCTOS*'.PHP_EOL.PHP_EOL.'Aprovecha el *20% de DESCUENTO* en todos nuestros productos'.PHP_EOL.PHP_EOL.'Paga a *3-6 meses intereses* con tu tarjeta de crédito preferida'.PHP_EOL.PHP_EOL.'_Promo válida Del 13 al 22 de Enero_'.PHP_EOL.PHP_EOL.'Recuerda que realizamos Despachos a Nivel nacional'.PHP_EOL.PHP_EOL.'Somos compras seguras y confiables'.PHP_EOL.'Somos Asesorías VIP'.PHP_EOL.'• Somos exclusividad en materiales'.PHP_EOL.'• Somos calidad AAA'.PHP_EOL.'• Somos los mayores importadores de piedras naturales para Ecuador'.PHP_EOL.PHP_EOL.'Visítanos en: Quito-Guayaquil-Cuenca-Ambato'.PHP_EOL.PHP_EOL.'www.duramas.com.ec'
            ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $token = '3qdwr2vtyf4utj4g';
        $instanceId = '295553';
        $url = 'https://api.chat-api.com/instance'.$instanceId.'/sendFile?token='.$token;
        // Make a POST request
        $options = stream_context_create(['http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $json
                ]
            ]);
        // Send a request
        $result = file_get_contents($url, false, $options);
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