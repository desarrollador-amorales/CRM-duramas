<?php

    include("dbconnection.php");
    //Estado inicial siempre tendra el orden 1
    $row_status=mysqli_query($con,"select name from status where order_status = 1");
    $status_initial_res=mysqli_fetch_array($row_status);
    //empieza la distribucion de los leads pendientes a los asesores y su actualizacion
    $name_warehouse_user=mysqli_query($con,"SELECT name FROM warehouse");
    //echo 'contador de ciudades'.$name_warehouse_user->num_rows;
    //echo "<br>";

     
      while($city_user=mysqli_fetch_array($name_warehouse_user)){
        //echo"<br>";  
       // echo '<h3>'.$city_user['name_warehouse'].'</h3>';
        //echo"<br>";

          $list_lead=mysqli_query($con,"SELECT * FROM lead where status = 'P' and city_warehouse= '".$city_user['name']."'");          
          $row_cnt_leads =$list_lead->num_rows;

         // echo 'contador de leads-->'.$row_cnt_leads;
         // echo "<br>";
         // echo "<br>";

         $contUser=0;
         $contLead=0;
          while($lead= mysqli_fetch_array($list_lead)){
            $contUserLoop=0;

            //if ($contLead == 0) {
                $list_users=mysqli_query($con, "SELECT u.email, u.name, u.id FROM user_warehouse uw, user u where u.id=uw.id_user and uw.name_warehouse='".$city_user['name']."' and u.status = 1 and uw.last_assignment != 1 order by uw.last_assignment asc");
                $row_cnt_users = $list_users->num_rows;

                if ($row_cnt_users == 0){
                    $list_users=mysqli_query($con, "SELECT u.email, u.name, u.id FROM user_warehouse uw, user u where u.id=uw.id_user and uw.name_warehouse='".$city_user['name']."' and u.status = 1 order by uw.last_assignment asc");
                    $row_cnt_users = $list_users->num_rows;
                }
                //mysqli_query($con,"update user_warehouse set last_assignment = '0' where name_warehouse='".$city_user['name_warehouse']."'");
            //}
            
            while($user= mysqli_fetch_array($list_users)){
                //verificar a que posicion del asesor voy asignar el lead nuevo
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

            //cuando termina la 1 iteracion de todos los asesores por ciudad se desbloquea el ultimo asignado y se reinicia la asignacion desde le primer asesor
            if($contUser == $row_cnt_users){
                //echo "<br>";
                //echo 'pasa por aqui---- ultimo y actualiza';
                //echo "<br>";
               mysqli_query($con,"update user_warehouse set last_assignment = '0' where name_warehouse='".$city_user['name']."'");
               $contUser = 0;
            }

            if($contLead == $row_cnt_leads ){
                //cuando el contador de leads sea el mismo al de su tamaño de la lista de leads
                //actualizaremos el ultimo asignado en la tabla user
                //echo "<br>";
                //echo'ultimo asesor '.$user['name'].' con id = '.$user['id'].' asignado en el local '.$city_user['name_warehouse'].' contador-->'.$contLead;
                
                mysqli_query($con,"update user_warehouse set last_assignment = '1' where id_user='".$user['id']."' and name_warehouse='".$city_user['name']."'");
                //echo "<br>";
                

            }          

        }

      }


?>