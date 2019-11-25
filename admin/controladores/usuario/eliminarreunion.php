<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos de reunion </title>
</head>
<body>
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /Practica_04/public/vista/login.html");
 }
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];

 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE reunionn SET reu_eliminada = 'S', reu_fecha_modificacion = '$fecha' WHERE
reu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
 } else {
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
 }
 echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
 $conn->close();

?>
</body>
</html>