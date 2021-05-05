<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['phone'];
	$gender=$_POST['gender'];
    $city=$_POST['city'];

    $values_city = implode(', ',$_POST['city']);
    $rol=$_POST['rol'];
	$query=mysqli_query($con,"select email from user where email='$email'");
	$num=mysqli_fetch_array($query);
	if($num>1)
	{
    echo "<script>alert('Email-id ya esta registrado. Porfavor intenta con un email id diferente.');</script>";
    echo "<script>window.location.href='registration-admin.php'</script>";
	}
	else
	{

    mysqli_query($con,"insert into user(name,email,password,mobile,gender,city_warehouse,rol) values('$name','$email','$password','$mobile','$gender','$values_city','$rol')");
    $id_user= mysqli_insert_id($con);

    for ($i=0;$i<count($city);$i++)    
            {     
            mysqli_query($con,"insert into user_warehouse(id_user,name_warehouse) values('$id_user','$city[$i]')");
            }
    
    echo "<script>alert('Registro exitoso !!.');</script>";  
    echo "<script>window.location.href='manage-users.php'</script>";
}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CRM | Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />


    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> 
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>-->

    <!-- script para la seleccion multiple-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
    function checkpass() {
        if (document.signup.password.value != document.signup.cpassword.value) {
            alert('Las contraseñas no coinciden');
            document.signup.cpassword.focus();
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $('.citySelect').select2();
    });
    </script>

</head>

<body class="error-body no-top">
    <div class="container">
        <div class="wrapper fadeInDown">
            <div class="col-md-5 col-md-offset-1">
                <h2>Registrate a CRM Duramas</h2>
                <p> <a href="../login.php">Accede Ahora!</a> Si ya eres usuario de CRM Duramas..</p>
                <br>


            </div>
            <div class="col-md-5 "> <br>

                <form id="signup" name="signup" class="login-form" onsubmit="return checkpass();" method="post">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Nombres</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="text" name="name" id="name" class="form-control" required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Email</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="email" name="email" id="email" class="form-control" required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Contraseña</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="password" name="password" id="password" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Confirmar Contraseña</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="password" name="cpassword" id="cpassword" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">No. Celular</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="text" name="phone" id="txtpassword" class="form-control"
                                        pattern="[0-9]{10}" title="Solo 10 caracteres numericos" required="true">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Ciudad</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <select class="citySelect form-control" multiple id="selectCity" name="city[]"
                                        required>
                                        <?php 
                                    $rt=mysqli_query($con,"select * from warehouse where active = 1");
                                    
                                    while($almacen= mysqli_fetch_array($rt)) {?>
                                        <option value="<?php echo $almacen['name'];?>">
                                            <?php echo $almacen['name'];?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Rol</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <select name="rol" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="">___________</option>
                                        <option value="admin">Administrador</option>
                                        <option value="user">Asesor</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Genero</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="radio" value="m" name="gender" checked> Masculino
                                    <input type="radio" value="f" name="gender"> Femenino

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <input class="btn btn-primary btn-cons pull-right" name="submit" value="Registrarse"
                                type="submit" />
                            <a class="btn btn-primary btn-cons pull-left" name="" value="Regresar" type=""
                                href="manage-users.php">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../assets/js/login.js" type="text/javascript"></script> -->

</body>

</html>