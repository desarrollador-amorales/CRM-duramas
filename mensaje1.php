<?php

include("dbconnection.php");
if(isset($_POST['login']))
{
    
    $list_users=mysqli_query($con, "SELECT cm.numero, cm.nombre FROM campania_marketing cm");

    while ($user= mysqli_fetch_array($list_users)) {

        $curl = curl_init();
        $number ='593'.substr($user['numero'],1,strlen($user['numero']));

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.ultramsg.com/instance2091/messages/chat",
          //CURLOPT_URL => "https://api.ultramsg.com/{INSTANCE_ID}/messages/chat",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/01/silver_collection.jpeg&caption=*Días de TODOS los PRODUCTOS 😃* \n \nAprovecha el *20% de DESCUENTO* en todos nuestros productos 🎉😉💎\n \nPaga a *3-6 meses intereses* con tu tarjeta de crédito preferida 💳\n \n_Promo válida Del 13 al 22 de Enero_ 🗓️\n \nRecuerda que realizamos Despachos a Nivel nacional 🚛\n \n✅Somos compras seguras y confiables\n✅Somos Asesorías VIP\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Somos los mayores importadores de piedras naturales para Ecuador\n\n📍Visítanos en: Quito-Guayaquil-Cuenca-Ambato\n \n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/01/love-at-home.jpeg&caption=*Love at home 🤍❤️* \n\nEn el mes del amor te queremos regalar el *25% de DESCUENTO* en todos nuestros productos 😊\n\nDifiere tus compras🛍️ *3-6 meses intereses* con todas las tarjetas de crédito 💳\n \n_Promo válida Del 01 al 14 de Febrero_ 🗓️\n\n*Regalos especiales por tus compras* 🎁\n\nRecuerda que realizamos Despachos a Nivel nacional 🚛\n \n✅Siempre a la moda\n✅Siempre actualizados con nuevas tendencias\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Asesoramos tus proyectos\n\n📍Visítanos en: _Quito-Guayaquil-Cuenca-Ambato_\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/02/CampanaEnero-Febrero.jpeg&caption=Colors at home 🟩🟦🟧 \n\nMás de 200 colores\n\nRecibe  25% de DESCUENTO en todos nuestros productos 😊\n\nDifiere tus compras🛍️ 3-6 meses intereses con todas las tarjetas de crédito 💳\n\nPromoción válida Del 15 al 28 de Febrero 🗓️\n\n➡️Recibe descuento adicional por Pagos en efectivo 💸\n\nRecuerda que realizamos despachos a nivel nacional 🚚\n\n✅Siempre a la moda\n✅Siempre actualizados con nuevas tendencias\n✅Somos exclusividad en materiales\n✅Somos calidad AAA\n✅Asesoramos tus proyectos\n\n📍Visítanos en: _Quito-Guayaquil-Cuenca-Ambato_\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/03/cama-king.jpeg&caption=*GANA* 🎖️\n\nUna cama *KING SIZE* - 🛏️ Sorano Grigio - Importada (No incluye colchón)\n\n*Duramas premia tus compras.*\n\n✅ Por cada $1.000 dólares de compra participas en el sorteo.\n\n_Mientras mayor sea el valor de tu factura, más oportunidades tienes de ganar._💰\n\nParticipan todos los clientes a nivel nacional, que cumplan esta condición.👩🏻👨🏻\n\n_Fecha del sorteo: 31 de marzo por Facebook live._\n\n*Visítanos en: _Quito-Guayaquil-Cuenca-Ambato_*📍\n\nMármol - granito – cuarzo – cuarcita – travertinos – porcelanatos – cerámicas - pisos laminados - pisos de ingeniería - pisos de bamboo – complementos -  productos de mantenimiento - piedras decorativas - revestimientos para piscinas – alfombras – y más…😊&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/03/maestros.jpeg&caption=*Duramas quiere que formes parte de este evento. 🙂* \n\nHemos iniciado la planificación de *Talleres de Formación para Maestros* 📖 y es importante contar con su participación, en donde Ud. Podrá capacitarse sobre temas importantes en uso e instalación de nuestros materiales.🧰\n\nPor favor pulse el siguiente link y conteste las siguientes preguntas:⤵️\n\nhttps://forms.gle/p8YRu9ThHibomxMEA ⬅️\n\nAgradecemos su atención\n\n*Pronto estaremos confirmando la fecha del evento.*🗓️💸&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/03/porcelanato.jpeg&caption=*Semana del Porcelanato de Gran Formato en Duramas* \n\nAprovecha el *30% de Descuento* en toda la línea de *Porcelanatos de Gran Formato- Importados - Europeos*👌🏻😊\n\n*Del 23 al 31 de Marzo*\n\n-Variedad de Colores\n-Texturas\n-Últimas Tendencias\n-Moda\n-Vanguardia\n-Asesoría Técnica Garantizada\n\n_Conoce el maravilloso mundo de nuestros Porcelanatos Gran Formato._\n\n*Direcciones:*📍\n*SHOWROOM 1:*\nAv. 6 de diciembre 30-19 y Av. República (esq). ⚑\n\n*SHOWROOM 2 Y BODEGA:*\nAv. General Rumiñahui y Latacunga, Sangolquí. ⚑\n\n*SHOWROOM 3:*\nAv. Oswaldo Guayasamín y Eloy Alfaro, Cumbayá. ⚑\n\nRealizamos despachos a nivel nacional🚚\n\nwww.duramas.com.ec⬅️\n\nAdjunto catálogo de Porcelanatos Gran Formato⤵️&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/04/fundacion-cuenca.mp4&caption=*Por fiestas de Fundacion de Cuenca*\n\n*30% de DESCUENTO* en:\n\n-Pisos Laminados.\n-Porcelanatos de Gran Formato.\n\nPaga con todas las tarjetas de crédito, Plan sin intereses 🏬\n\nRecibe asesoría VIP 💎.\n\nCalidad AAA en nuestros materiales\nVisítanos:📍\n*SHOWROOM 1:*\nAv. Ordoñez Lasso 3-29 y Los Cipreses(esq). ⚑\n*SHOWROOM 2 Y BODEGA MATRIZ:*\nAv. Cornelio Vintimilla 2-62 y Paseo Río Machángara. ⚑\n*SHOWROOM 3:*\nAv. Remigio Crespo y Remigio Romero (esq). ⚑\n\n\nRealizamos despachos a nivel nacional🚚\n\nwww.duramas.com.ec⬅️&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/04/fundacion-cuenca.mp4&caption=*¡ DESCUENTOS IMPRESIONANTES ¡*\n\n*Pisos de Madera Natural Bamboo:*\n\n*CARACTERÍSTICAS:*\n-Mayor dureza,  es más durable que el suelo de madera dura.\n-Se pueden instalar en muy poco tiempo\n-Es más elegante.\n-Requiere menos de lijado y acabado.\n-Resistencia de peso y estabilidad dimensional.\n\n*Precios no Incluyen IVA*\n\nOferta hasta agotar Stock.\n\nRecibe asesoría VIP 💎 en todos nuestros locales. 🏬\n\nCalidad AAA en nuestros materiales\n\nVisítanos:Quito - Guayaquil - Cuenca - Ambato📍\n\nRealizamos despachos a nivel nacional🚚\n\nwww.duramas.com.ec⬅️&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=http://www.duramas.com.ec/wp-content/uploads/2022/04/WhatsApp-Image-2022-04-26-at-10.24.09-AM.jpeg&caption=Llegó el *Mes de Mamá 🌹* y queremos celebrarle a lo grande 🎉\n\n*Happy Mother´s Month👩‍👧‍👦*\n\n*37% de DESCUENTO* Pagos en Efectivo 💵\n_30% de DESCUENTO_ Pagos con Tarjetas de crédito 💳\n*En todos los Productos*  - Aplica Restricciones\n\nEncontrarás multitud de texturas y colores ideales para tu hogar. 🏡\n\n La mejor Asesoría VIP🤝\n\nTodos nuestros materiales son importados. 🛫\n\n*Visítanos: Quito – Guayaquil – Cuenca – Ambato📍*\n\nRealizamos Despachos a nivel nacional🚚\n\nwww.duramas.com.ec ⬅️&referenceId={REFERENCEID}",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&video=http://www.duramas.com.ec/wp-content/uploads/2022/06/father_day.mp4&caption=!CELEBRA A PAPÁ! 👨🏻🦰.\n\nEl uso de las piedras naturales como revestimiento te permite crear ambientes exclusivos y sofisticados.\n\n*Precios GANGA en Granitos.*\n\n-Oferta por tiempo limitado\n-Solo pagos en EFECTIVO\n-Precios no Incluyen IVA\nAplica Restricciones.\n\n*De 200 colores y textura*\n\nCaracteristicas:\n• Alta Dureza\n• Resistencia a las manchas\n• Resistente al fuego y al calor\n\nAsesoría VIP 💎 en todos nuestros locales. 🏬\n\nMateriales importados con Calidad AAA\n\nVisítanos: Quito – Guayaquil – Cuenca – Ambato 📍\n\nRealizamos Despachos a nivel nacional🚚\n\nwww.duramas.com.ec ⬅️&referenceId=&nocache=",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&video=http://www.duramas.com.ec/wp-content/uploads/2022/07/camp-jul.mp4&caption=¿Deseas que tus pisos, mesones y revestimientos te duren para siempre?.\n\n*Tenemos la Colección de Verano 🌞 más grande del País en Piedras Naturales*.\n\n*Precios GANGA en Granitos.*\n\n-Oferta por tiempo limitado\n-Solo pagos en EFECTIVO\n-Precios no Incluyen IVA\nAplica Restricciones.\n\n*Más De 200 colores y textura*\n\nCaracteristicas:\n• Alta Dureza\n• Resistencia a las manchas\n• Resistente al fuego y al calor\n\nAsesoría VIP 💎 en todos nuestros locales. 🏬\n\nMateriales importados con Calidad AAA\n\nVisítanos: Quito – Guayaquil – Cuenca – Ambato 📍\n\nRealizamos Despachos a nivel nacional🚚\n\nwww.duramas.com.ec ⬅️&referenceId=&nocache=",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&video=http://www.duramas.com.ec/wp-content/uploads/2022/07/camp-jul.mp4&caption=¿Deseas que tus pisos, mesones y revestimientos te duren para siempre?.\n\n*Tenemos la Colección de Verano 🌞 más grande del País en Piedras Naturales*.\n\n*Precios GANGA en Granitos.*\n\n-Oferta por tiempo limitado\n-Solo pagos en EFECTIVO\n-Precios no Incluyen IVA\nAplica Restricciones.\n\n*Más De 200 colores y textura*\n\nCaracteristicas:\n• Alta Dureza\n• Resistencia a las manchas\n• Resistente al fuego y al calor\n\nAsesoría VIP 💎 en todos nuestros locales. 🏬\n\nMateriales importados con Calidad AAA\n\nVisítanos: Quito – Guayaquil – Cuenca – Ambato 📍\n\nRealizamos Despachos a nivel nacional🚚\n\nwww.duramas.com.ec ⬅️&referenceId=&nocache=",
          
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=https://www.duramas.com.ec/wp-content/uploads/2022/08/Agosto_mes_constr-2.jpeg&caption=¡Creamos Espacios pero en realidad nos dedicamos a Construir tus sueños! 🏗️👷🏻👷🏻\n\nRenueva o Construye Tu Hogar *Mes de la Construcción* 🏡\n\n*33% de DESCUENTO* toda la tienda🏪 - Pagos en *Efectivo* 💵\n*23% de DESCUENTO* a 3-6 meses con tu *tarjeta de crédito Preferida* 💳\n_Aplica Restricciones_\n\nAsesoría VIP 💎 en todos nuestros locales. 🏬\n\nMateriales importados con Calidad AAA \n\nVisítanos: Quito – Guayaquil – Cuenca – Ambato 📍\n\n_Realizamos Despachos a nivel nacional_🚚\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&image=https://www.duramas.com.ec/wp-content/uploads/2022/09/campanasept.jpeg&caption=🎊🥳🎉 LLEGA LA *SEMANA FANTÁSTICA* A DURAMAS  🎊🥳🎉\n\nTodo el mes de Septiembre 🗓️ - *CADA SEMANA* - tendremos *Diferentes Productos en Promoción* 🆓\n\nEs hora de Remodelar tu hogar 🏡\n\n*37% de DESCUENTO* en  Productos Seleccionados de la Semana ☺️👍🏻- Pagos en Efectivo 💵\n25% de DESCUENTO a 3-6-9-12 meses sin intereses con tu tarjeta de crédito Preferida 💳\n\nTodas las semanas tendremos *Diferentes Productos con estos Descuentos*\n\nSolicita Asesoría 👨🏻💼👩🏻 o Consulta Aquí ⬇️ por Nuestros Productos de la semana🎉\n\n*Promociones en líneas de:* Porcelanatos, Cerámicas, Pisos Laminados, Granitos, Mármoles, Travertinos, Cuarcitas, Superficies de Cuarzo y más… \n\nVisítanos: Quito – Guayaquil – Cuenca – Ambato 📍\n\nRealizamos Despachos a nivel nacional🚚\n\n➡️ www.duramas.com.ec&referenceId={REFERENCEID}",
          
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&body=Buenas tardes espero se encuentre bien. Le saluda Irianne Nieves de la empresa Duramas, en algún momento estuvo cotizando con nosotros algunos materiales y queria enviarle las promociones del mes. Estamos con buenos descuentos pago de contado y con tarjeta. Igualmente consultarle si esta actualmente construyendo o remodelando algun espacio y requiera  material. Quedo a la orden. Puede visitar nuestra web www.duramas.com.ec&priority=10&referenceId=",
          CURLOPT_POSTFIELDS => "token=m74gevw9ty4msvwi&to=".$number."&filename=Catalogo.pdf&document=http://www.duramas.com.ec/wp-content/uploads/2022/07/Oferta-Pisos-comprimido-3.pdf&referenceId=&nocache=",

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