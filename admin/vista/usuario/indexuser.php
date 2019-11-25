<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>

</head>
<body>
  

 <table style="width:100%">
 <tr>
 <th>Lugar reunion</th>
 <th>Fecha</th>
 <th>Hora</th>
 <th>Motivo</th>
 <th>latitud</th>
 <th>longitud</th>
 <th>Correo</th>
 </tr>
 <?php
   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
   header("Location: /Practica_04/public/vista/login.html");
   }
   echo "<link rel='stylesheet' href='../../../css/tablas.css'>";
   echo "<link rel='stylesheet' href='../../../css/login.css'>";
   echo "<link rel='stylesheet' href='../../../css/registro.css'>";
    $codigo = $_GET["codigo"];
     
 include '../../../config/conexionBD.php';
 $sql = "select * from reunionn r,usuario u where r.reu_remitente=$codigo and u.usu_codigo=$codigo order by reu_codigo desc";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   $codi;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["reu_lugar"] . "</td>";
        echo " <td>" . $row['reu_fecha'] ."</td>";
        echo " <td>" . $row['reu_hora'] . "</td>";
        echo " <td>" . $row['reu_motivo'] . "</td>";
        echo " <td>" . $row['reu_latitud'] . "</td>";
        echo " <td>" . $row['reu_longitud'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        $codi=$row['usu_codigo'];
       
        echo " <td> <a href='invitar.php?codigo=" . $row['reu_codigo'] . "'>invitar a reunion</a> </td>";
        echo "</tr>";
        
       }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "<p>modificar datos usuario <a href='modificar.php?codigo=" . $codigo . "'>Modificar datos</a><span class='fontawesome-arrow-right'></span></p>";
 echo "<p>cambiar contrasena <a href='cambiar_contrasena.php?codigo=" . $codigo . "'>Cambiar
 contraseña</a><span class='fontawesome-arrow-right'></span></p>";
 echo "<p>crear nueva reunion <a href='crear_reunion.php?codigo=" . $codigo . "'>crear_reunion</a><span class='fontawesome-arrow-right'></span></p>";
 echo "<p>buscar por motivo <a href='../../controladores/usuario/buscar.html'>buscar***</a><span class='fontawesome-arrow-right'></span></p>";
 
 $conn->close();
 ?>
 </table>
</body>
</html>