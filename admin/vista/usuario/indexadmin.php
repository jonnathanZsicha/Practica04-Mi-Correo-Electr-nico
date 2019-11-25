<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
</head>
<body>
<div>informacion sobre todos los usuarios</div>
 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Telefono</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 </tr>
 <?php
   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
   header("Location: /Practica_04/public/vista/login.html");
   }  
   echo "<link rel='stylesheet' href='../../../css/tablas.css'>";
 echo "<link rel='stylesheet' href='../../../css/login.css'>";
 echo "<link rel='stylesheet' href='../../../css/registro.css'>";
   include '../../../config/conexionBD.php';
 $sql = "SELECT * FROM usuario where usu_rol='user'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_direccion'] . "</td>";
        echo " <td>" . $row['usu_telefono'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
        echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
       contraseña</a> </td>";
        echo "</tr>";
       }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 ?>

  <table style="width:100%">
 <tr>
 <th>Lugar reunion</th>
 <th>Fecha</th>
 <th>Hora</th>
 <th>Motivo</th>
 <th>latitud</th>
 <th>longitud</th>
 </tr>
 <div>informacion sobre todas las reuniones</div>
 <?php
$sql2= "SELECT * FROM reunionn order by reu_codigo desc";
$result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) {
     while($row2 = $result2->fetch_assoc()) {
         echo "<tr>";
         echo " <td>" . $row2["reu_lugar"] . "</td>";
         echo " <td>" . $row2['reu_fecha'] ."</td>";
         echo " <td>" . $row2['reu_hora'] . "</td>";
         echo " <td>" . $row2['reu_motivo'] . "</td>";
         echo " <td>" . $row2['reu_latitud'] . "</td>";
         echo " <td>" . $row2['reu_longitud'] . "</td>";
        echo " <td> <a href='eliminarreunion.php?codigo=" . $row2['reu_codigo'] . "'>eliminar reunion</a> </td>";
        }
    } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>";
        echo "</tr>";
        }
 $conn->close();
 ?>
 </table>
</body>
</html>