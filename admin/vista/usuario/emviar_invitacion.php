<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
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
  $re_codigo = $_GET["variable_1"];
  $us_codigo = $_GET["variable_2"];

 include '../../../config/conexionBD.php';
 $sql = "INSERT INTO invitado VALUES (0, '$re_codigo', '$us_codigo')";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha invitado correctamente!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
 }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}

//cerrar la base de datos
$conn->close();
echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

?>
</body>
</html>
