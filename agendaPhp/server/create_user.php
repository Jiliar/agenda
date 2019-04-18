 <?php      
       include('conector.php');
       $con = new ConectorBD('localhost','admin','Sencilla2016');
       $response['conexion'] = $con->initConexion('agenda');
       if ($con->recordCount('usuarios')>0){ //Invoca la función recordCount para saber si la tabla contiene registros
             echo "<h3>La tabla usuarios ya contiene registros</h3>";
             exit;
       }
       if ($response['conexion']=='OK') {
             $data = array();
             $data = [
                         [
                               'email' => "'nextu@gmail.com'",
                               'nombre' => "'ANDRES MALDONADO'",
                               'psw' => "'".password_hash('nextu', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-13'"
                         ],
                         [
                               'email' => "'mariaballestas@gmail.com'",
                               'nombre' => "'MARIA PUERTA SALAS'",
                               'psw' => "'".password_hash('mpuerta', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-11'",
                         ],
                         [
                               'email' => "'soniaguerrero@email.com'",
                               'nombre' => "'JILIAR SILGADO CARDONA'",
                               'psw' => "'".password_hash('jsilgado', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1990-05-12'",
                         ]
              ];             
             echo "<h3>Usuarios</h3><br>";
             foreach($data as $d){
                   if($con->insertData('usuarios', $d)){
                         echo $d["nombre"]." - ". $d["email"] ."... Registro creado <br>";
                   }else {
                         echo "Hubo un error y los datos no han sido guardados...<br>";
                   }    
             }             
       }else {
             echo "No se pudo conectar a la base de datos";
       }
       
?>
