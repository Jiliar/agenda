<?php
       include('conector.php');
       session_start();
       if (isset($_SESSION['username'])){
             $con = new ConectorBD('localhost','admin','Sencilla2016');
             $response['conexion'] = $con->initConexion('agenda');
             if ($response['conexion']=='OK'){
                   $id = $_POST['id'];                   
                   $start = $_POST['start_date'];
                   $end = $_POST['end_date'];
                   if(isset($_POST['id'])){
                         if ($con->updateEvento($_POST)){
                               $response['msg'] = "OK";
                         }                         
                   }                   
             }else {
                  $response['msg'] = "No se pudo conectar a la Base de Datos";
             }
       }else{
             $response['msg'] = "No se ha iniciado una sesión";
       }
       echo json_encode($response);
 ?>
