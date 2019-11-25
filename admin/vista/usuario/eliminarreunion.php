<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de persona</title>
</head>
<body>
 <?php
  session_start();
  if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
  header("Location: /Practica_04/public/vista/login.html");
  }
  echo "<link rel='stylesheet' href='../../../css/tablas.css'>";
 echo "<link rel='stylesheet' href='../../../css/login.css'>";
 echo "<link rel='stylesheet' href='../../../css/registro.css'>";
 $codigo = $_GET["codigo"];
 $sql = "SELECT * FROM reunionn where reu_codigo=$codigo";

 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/eliminarreunion.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="lugar">Lugar (*)</label>
 <input type="text" id="lugar" name="lugar" value="<?php echo $row["reu_lugar"]; ?>"
disabled/>
 <br>
 <label for="motivo">Moitivo (*)</label>
 <input type="text" id="motivo" name="motivo" value="<?php echo $row["reu_motivo"];
?>" disabled/>
 <br>
 <label for="fecha">Fecha (*)</label>
 <input type="date" id="fecha" name="fecha" value="<?php echo
$row["reu_fecha"]; ?>" disabled/>
 <br>
 <label for="hora">Correo electrónico (*)</label>
 <input type="hora" id="hora" name="hora" value="<?php echo $row["reu_hora"]; ?>"
disabled/>
 <br>

 <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 $conn->close();
 ?>
</body>
</html>