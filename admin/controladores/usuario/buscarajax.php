<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $cedula = $_GET['cedula'];
 echo "<link rel='stylesheet' href='../../../css/tablas.css'>";
 echo "<link rel='stylesheet' href='../../../css/login.css'>";
 echo "<link rel='stylesheet' href='../../../css/registro.css'>";


 $sql = "SELECT * FROM reunionn WHERE reu_eliminada = 'N' and reu_motivo='$cedula'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Lugar reunion</th>
 <th>Fecha</th>
 <th>Hora</th>
 <th>Motivo</th>
 <th>latitud</th>
 <th>longitud</th>
 
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row["reu_lugar"] . "</td>";
 echo " <td>" . $row['reu_fecha'] ."</td>";
 echo " <td>" . $row['reu_hora'] . "</td>";
 echo " <td>" . $row['reu_motivo'] . "</td>";
 echo " <td>" . $row['reu_latitud'] . "</td>";
 echo " <td>" . $row['reu_longitud'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>