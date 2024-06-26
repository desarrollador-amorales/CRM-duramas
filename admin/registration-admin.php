<?php
session_start();
error_reporting(0);
include("dbconnection.php");
include("checklogin.php");
check_login();

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobile=$_POST['phone'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];

    $values_city = implode(', ', $_POST['city']);
    $rol=$_POST['rol'];

    if ($rol == 'admin') {
        $query=mysqli_query($con, "select user from admin where user='$email'");
        $num=mysqli_fetch_array($query);
        if ($num>1) {
            echo "<script>alert('El Email ingresado ya esta registrado en uno de nuestros administradores. Porfavor intenta con un email diferente.');</script>";
            echo "<script>window.location.href='registration-admin.php'</script>";
        }else{
            mysqli_query($con, "insert into admin(name,user,password) values('$name','$email','$password')");
            $mostrarRegistroModal=true;
            //echo "<script>alert('Administrador Creado !!.');</script>";
            //echo "<script>window.location.href='manage-users.php'</script>";
        }


    } if ($rol == 'supervisor') {
        $query=mysqli_query($con, "select email from supervisor where email='$email'");
        $num=mysqli_fetch_array($query);
        if ($num>1) {
            echo "<script>alert('El Email ingresado ya esta registrado en uno de nuestros supervisores. Porfavor intenta con un email diferente.');</script>";
            echo "<script>window.location.href='registration-admin.php'</script>";
        }else{
            mysqli_query($con, "insert into supervisor(name,email,password,city_warehouse) values('$name','$email','$password','$values_city')");
            $id_user_supervisor= mysqli_insert_id($con);

            for ($i=0;$i<count($city);$i++) {
                mysqli_query($con, "insert into user_supervisor_warehouse(id_user_supervisor,name_warehouse) values('$id_user_supervisor','$city[$i]')");
            }
            $mostrarRegistroModal=true;
            //echo "<script>alert('Administrador Creado !!.');</script>";
            //echo "<script>window.location.href='manage-users.php'</script>";
        }


    }
           
    if ($rol == 'user') {
        $query=mysqli_query($con, "select email from user where email='$email'");
        $num=mysqli_fetch_array($query);
        if ($num>1) {
            echo "<script>alert('Email-id ya esta registrado. Porfavor intenta con un email diferente.');</script>";
            echo "<script>window.location.href='registration-admin.php'</script>";
        } else {
            mysqli_query($con, "insert into user(name,email,password,mobile,gender,city_warehouse,rol) values('$name','$email','$password','$mobile','$gender','$values_city','$rol')");
            $id_user= mysqli_insert_id($con);

            for ($i=0;$i<count($city);$i++) {
                mysqli_query($con, "insert into user_warehouse(id_user,name_warehouse) values('$id_user','$city[$i]')");
            }
            $mostrarRegistroModal=true;
           // echo "<script>alert('Registro exitoso !!.');</script>";
            //echo "<script>window.location.href='manage-users.php'</script>";
        }
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



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- nuevo alerta-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--Estilos -->
    <link href="../assets/css/style-registration-admin.css" rel="stylesheet" type="text/css" />
    <!--nuevo fin-->



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
        $('.citySelect').select2({
            allowClear: true,
            minimumResultsForSearch: -1
        });
    });
    </script>

</head>

<body background="../assets/img/gray2.jpg">
    <div class="container">
        <div class="wrapper fadeInDown">

            <div class="container">
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="../assets/img/user.png" alt="" width="72" height="72">
                    <h2>Registrate a CRM Duramas</h2>
                    <p> <a href="logout.php">Accede Ahora!</a> Si ya eres usuario de CRM Duramas..</p>
                    <br>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-4">

                <form id="signup" name="signup" class="login-form" onsubmit="return checkpass();" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                <h6>Nombres</h6>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="text" name="name" id="name" class="form-control" required="true">
                                    <small id="name" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset -1">
                            <label class="form-label">
                                <h6>Email</h6>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="email" name="email" id="email" class="form-control" required="true">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 ">
                            <label class="form-label">
                                <h6>Contraseña</h6>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="password" name="password" id="password" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset -1">
                            <label class="form-label">
                                <h6>Confirmar Contraseña</h6>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="password" name="cpassword" id="cpassword" class="form-control"
                                        required="true">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                <h6>No. Celular</h6>
                            </label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <input type="text" name="phone" id="txtpassword" class="form-control"
                                        pattern="[0-9]{10}" title="Solo 10 caracteres numericos" required="true">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset -1">
                            <label class="form-label">
                                <h6>Ciudad</h6>
                            </label>
                            <select class="citySelect form-control" multiple id="selectCity" name="city[]" required>
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

                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">
                                <h6>Rol</h6>
                            </label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <select name="rol" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="admin">Administrador</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="user">Asesor</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset -1">
                            <label class="form-label">
                                <h6>Genero</h6>
                            </label>
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
                        <div class="col-md-6">
                            <br>
                            <a class="btn btn-info btn-cons pull-left" name="" value="Regresar" type=""
                                href="manage-users.php">Regresar</a>
                        </div>

                        <div class="col-md-6 col-md-offset -1">
                            <br>
                            <input class="btn btn-primary btn-cons pull-right" name="submit" value="Registrar"
                                type="submit" />
                        </div>
                    </div>
                </form>
            </div>
            <div id="myModalRegister" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h4>Listo!</h4>
                            <p>El usuario se registro correctamente.</p>
                            <button class="btn btn-success" data-dismiss="modal"
                                onclick="location.href='manage-users.php'"><span>Regresar</span> <i
                                    class="material-icons">&#xE5C8;</i></button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php if($mostrarRegistroModal) {?>
    <script>
    $('#myModalRegister').modal('show');
    </script>
    <?php }?>


</body>

</html>