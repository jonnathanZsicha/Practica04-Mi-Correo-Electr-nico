<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>crear reunion</title>
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
 $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/crear_reunion.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="lugar">Lugar (*)</label>
 <input type="text" id="lugar" name="lugar" value="" placeholder="Ingrese el lugar ..."
required/>
 <br>
 <label for="fecha">Fecha (*)</label>
 <input type="date" id="fecha" name="fecha" value="" placeholder="Ingrese fecha de la reunion
..." required/>
 <br>
 <label for="hora">Hora (*)</label>
 <input type="time" id="hora" name="hora" value="" placeholder="Ingrese hora de la reunion
..." required/>
 <br>
 <label for="motivo">Motivo (*)</label>
 <input type="text" id="motivo" name="motivo" value="" placeholder="Ingrese un motivo
..." required/>
<br>
 <label for="observacion">Observacion (*)</label>
 <input type="text" id="observacion" name="observacion" value="" placeholder="Ingrese una observacion ..."
required/>
 <br>
 <label for="latitud">Latitud (*)</label>
 <input type="text" id="latitud" name="latitud" value="" placeholder="Ingrese su número latitud
..." required/>
 <br>
 <label for="longitud">longitud (*)</label>
 <input type="text" id="longitud" name="longitud" value="" placeholder="Ingrese su longitud ..." required/>
 <br>
 <input type="submit" id="crear" name="crear" value="Aceptar" />
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