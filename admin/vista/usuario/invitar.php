<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
</head>
<body>

 <table style="width:100%">
 <tr>
 <th>cedula</th>
 <th>nombre</th>
 <th>apellidos</th>
 <th>direccion</th>
 <th>telefono</th>
 <th>correo</th>
 </tr>
 <?php
   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
   header("Location: /Practica_04/public/vista/login.html");
   }  
   echo "<link rel='stylesheet' href='../../../css/tablas.css'>";
 echo "<link rel='stylesheet' href='../../../css/login.css'>";
 echo "<link rel='stylesheet' href='../../../css/registro.css'>";
   $recodigo = $_GET["codigo"];
 
 include '../../../config/conexionBD.php';
 $sql = "SELECT * FROM `usuario` WHERE usu_rol='user'";
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
       echo " <td> <a href='emviar_invitacion.php?variable_1=" . $row['usu_codigo'] . "&variable_2=$recodigo'>emviar_invitacion</a> </td>";
        echo "</tr>";
       }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 $conn->close();
 ?>
 </table>
</body>
</html>