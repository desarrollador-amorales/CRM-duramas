<?php

include("dbconnection.php");
if(isset($_POST['login']))
{
    
    $list_users=mysqli_query($con, "SELECT cm.numero FROM campania_marketing cm");

    while ($user= mysqli_fetch_array($list_users)) {
        $data = [
                'phone' => '593'.substr($user['numero'],1,strlen($user['numero'])), // Receivers phone
                'body' =>'http://nuevo2021.duramas.com.ec/wp-content/uploads/2021/10/WhatsApp-Image-2021-10-11-at-10.38.18.jpeg',
                'filename' => 'spider.jpeg',
                'caption' => '*Sabemos que estas renovando tu Hogar*🏡'.PHP_EOL.PHP_EOL.'_Elaboramos mesas a tu gusto y estilo._👍'.PHP_EOL.PHP_EOL.'*Más de 200 colores*, con base de metal y superficie de piedra natural (mármol-cuarcita-granito).🏘️'.PHP_EOL.PHP_EOL.'*Cuotas* de $199 más IVA._Facilidades de pago hasta 09 meses *sin intereses* con tu tarjeta de crédito favorita._💳'.PHP_EOL.PHP_EOL.'La mejor asesoría *GRATIS*.😊👍'.PHP_EOL.PHP_EOL.'Compras seguras y confiables 💵🔐'.PHP_EOL.PHP_EOL.'*Despachos a nivel Nacional 🚛*'.PHP_EOL.PHP_EOL.'*más de 42 años de experiencia en el mercado* 🤝🏻'.PHP_EOL.PHP_EOL.'_Quito-Guayaquil-Cuenca-Ambato_'.PHP_EOL.PHP_EOL.'www.duramas.com.ec ↖️'
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