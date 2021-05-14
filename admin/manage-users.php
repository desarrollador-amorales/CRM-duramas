<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

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
    echo "<script>window.location.href='#'</script>";
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
    echo "<script>window.location.href='#'</script>";
}
	}


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin | Administracion de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />

    <!--librerias para un select2 o select multiple-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">


</head>

<body class="">
    <?php include("header.php");?>
    <div class="page-container row">

        <?php include("leftbar.php");?>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>

            </div>
            <div class="modal-body">Widget settings form goes here</div>
        </div>
        <div class="clearfix"></div>
        <div class="content">

            <div class="page-title"> <i> <a href="home.php" class="icon-custom-left"></a> </i>

                <h3>Administracion de Usuarios</h3>
            </div>

            <div class="pull-right">

                <a class="btn btn-primary btn-cons pull-left" name="" value="Regresar" type=""
                    href="registration-admin.php"><span class="fa fa-plus"></span> Añadir Usuario</a>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataRegister">
                    <span class="fa fa-plus"></span> Añadir Usuario</button>-->
                <p></p>
                <p></p>
            </div>


            <!-- Inicio Nuevo Modal de prueba-->
            <form id="signup" name="signup" class="login-form" onsubmit="return checkpass();" method="post">
                <div class="modal fade" id="dataRegister" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel"><b>Agregar Usuario</b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <input type="hidden" required name="txt_id" value="" placeholder="" id="txt_id"
                                        require="">

                                    <div class="form-group col-md-6">
                                        <label for="">Nombres:</label>
                                        <input type="text" name="name" id="name" class="form-control" required="true">
                                        <br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Email:</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            required="true">
                                        <br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Contraseña:</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required="true">
                                        <br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Confirmar Contraseña:</label>
                                        <input type="password" name="cpassword" id="cpassword" class="form-control"
                                            required="true">
                                        <br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">No Celular:</label>
                                        <input type="text" name="phone" id="txtpassword" class="form-control"
                                            pattern="[0-9]{10}" title="Solo 10 caracteres numericos" required="true">
                                        <br>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Cuidad:</label>
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
                                        <br>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Rol:</label>
                                        <select name="rol" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="">___________</option>
                                            <option value="admin">Administrador</option>
                                            <option value="user">Asesor</option>
                                        </select>
                                        <br>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Género:</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="">___________</option>
                                            <option value="m">Masculino</option>
                                            <option value="f">Femenino</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-success" name="submit" value="Registrar" type="submit" />
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Fin Nuevo Modal de prueba-->



            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid simple ">
                                <div class="grid-title no-border">
                                    <h4>Detalles de Usuarios</h4>
                                    <div class="tools"> <a href="javascript:;" class="collapse"></a>
                                        <a href="#grid-config" data-toggle="modal" class="config"></a>
                                        <a href="javascript:;" class="reload"></a>
                                        <a href="javascript:;" class="remove"></a>
                                    </div>
                                </div>
                                <div class="grid-body no-border">

                                    <table id="manage-users" class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th><label class="control-label"><b>#</b></label></th>
                                                <th><label class="control-label"><b>Nombres</b></label></th>
                                                <th><label class="control-label"><b>Email ID</b></label></th>
                                                <th><label class="control-label"><b># Celular</b></label></th>
                                                <th style="width:30%"><label class="control-label"><b>Ciudad</b></label>
                                                </th>
                                                <th><label class="control-label"><b>Fecha de Registro</b></label></th>
                                                <th><label class=" control-label"><b>Accion</b></label></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ret=mysqli_query($con,"select * from user order by id");
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['id'];
												?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['city_warehouse'];?></td>
                                                <td><?php echo $row['posting_date'];?></td>
                                                <td>
                                                    <form name="abc" action="" method="post">

                                                        <button type="button" class="btn btn-info btn-xs"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Editar Registro"
                                                            onclick="location.href='edit-user.php?id=<?php echo $row['id'];?>'"><i
                                                                class=" fa fa-edit text-white mr-0"></i>
                                                        </button>


                                                        <button type="button" class="btn btn-danger btn-sm px-3"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Eliminar Registro"
                                                            onclick="location.href='delete-user.php?id=<?php echo $row['id'];?>'"><i
                                                                class="fa fa-trash-o text-white mr-0"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-warning btn-xs"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Enviar Credenciales"
                                                            onclick="location.href='send-user-credentials.php?email=<?php echo $row['email'];?>'"><i
                                                                class="fa fa-key text-white mr-0"></i>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END PAGE -->
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>

    <!--incio nuevo -->

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>



    <script>
    $(document).ready(function() {
        $('#manage-users').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            /**
            Sirve para exportar a csv excel pdf o imprimir
            dom: 'Blfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]**/
        });
    });

    function checkpass() {
        if (document.signup.password.value != document.signup.cpassword.value) {
            alert('Las contraseñas no coinciden');
            document.signup.cpassword.focus();
            return false;
        }
        return true;
    }

    $('#selectCity').select2({
        dropdownParent: $("#dataRegister")
    });

    /**$(document).ready(function() {
        $('#selectCity').select2({
            dropdownParent: $("#dataRegister")
        });
    });**/
    </script>
</body>

</html>