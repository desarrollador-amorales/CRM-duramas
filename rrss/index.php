<?php
session_start();
include("../dbconnection.php");

$mostrarRegistroMensaje=false;
$mostrarRegistroMensajeValidacion=false;

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $celular="+593".substr($_POST['celular'],1,strlen($_POST['celular']));
    $ciudad=$_POST['ciudad'];
    $message=$_POST['message'];
    $date_created=date("Y/m/d");
    $form_id = "RS";
    $platform = "fb";

    $nameV=mysqli_query($con, "select name_lead from lead where name_lead like '%$name%'");
    $validacionNombre=mysqli_fetch_array($nameV);

    $emailV=mysqli_query($con, "select email from lead where email like '%$email%'");
    $validacionEmail=mysqli_fetch_array($emailV);

    $celularV=mysqli_query($con, "select mobile_number from lead where mobile_number like '%$celular%'");
    $validacionCelular=mysqli_fetch_array($celularV);

        if ($validacionNombre>1) {
            $mostrarRegistroMensajeValidacion = true;

        }else if($validacionEmail> 1){
            $mostrarRegistroMensajeValidacion = true;

        }else if($validacionCelular > 1){
            $mostrarRegistroMensajeValidacion = true;
        }
        else{
            mysqli_query($con,"insert into lead (name_lead, mobile_number, email, city_warehouse, date_create, form_id, platform, message) VALUES( '$name', '$celular', '$email', '$ciudad', '$date_created', '$form_id', '$platform', '$message')");           
            $mostrarRegistroMensaje=true;

        }

    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contacto Duramas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!--===============================================================================================-->
</head>

<body>

    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="images/logo_duramas.png" alt="IMG">
            </div>

            <form class="contact1-form validate-form" method="post">
                <span class="contact1-form-title">
					Contáctanos
				</span>

                <div class="wrap-input1 validate-input" data-validate="Nombre Requerido">
                    <input class="input1" type="text" name="name" placeholder="Nombres">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1">
                    <input class="input1" type="text" name="email" placeholder="Email">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Nro. Celular es requerido">
                    <input class="input1" type="text" name="celular" placeholder="Nro. Celular">
                    <span class="shadow-input1"></span>
                </div>


                <div class="wrap-input1 validate-input" data-validate="Local es requerido">
                    <select class="input1" name="ciudad" required>
						<option value="">Seleccione</option>
						<option value="Ambato">Ambato</option>
						<option value="	Cuenca - Ordoñez Lasso">Cuenca - Ordoñez Lasso</option>
						<option value="Cuenca - Parque Industrial">Cuenca - Parque Industrial</option>
						<option value="Cuenca - Remigio Crespo">Cuenca - Remigio Crespo</option>
						<option value="Guayaquil - Dicentro">Guayaquil - Dicentro</option>
						<option value="Guayaquil - Juan Tanca Marengo">Guayaquil - Juan Tanca Marengo</option>
                        <option value="Guayaquil - Plaza Proyecto">Guayaquil - Plaza Proyecto</option>
						<option value="Quito - 6 de diciembre">Quito - 6 de diciembre</option>
						<option value="Quito - Cumbayá">Quito - Cumbayá</option>
						<option value="Quito - Sangolquí">Quito - Sangolquí</option>
					</select>
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Mensaje es requerido">
                    <textarea class="input1" name="message" placeholder="Cotiza/Requerimiento"></textarea>
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                   <button  class="contact1-form-btn" type="submit" name="submit">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
                </div>
            </form>
        </div>

        <div class="modal fade" id="myModalMessage" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                    <strong>Su comentario fue enviado con exito...!</strong>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModalMessageValidacion" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                    <strong>Este usuario ya ha sido ingresado...!</strong>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

  
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <?php if($mostrarRegistroMensaje) {?>
    <script>
    $('#myModalMessage').modal('show');
    </script>
    <?php }?>


    <?php if($mostrarRegistroMensajeValidacion) {?>
    <script>
    $('#myModalMessageValidacion').modal('show');
    </script>
    <?php }?>

</body>

</html>