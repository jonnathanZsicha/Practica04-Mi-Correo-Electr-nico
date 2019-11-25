<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nueva reunion</title>
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
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]): null;
 echo "$codigo";
 $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
 $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]): null;
 $hora = isset($_POST["hora"]) ? trim($_POST["hora"], time()): null;
 $motivo = isset($_POST["motivo"]) ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;
 $observacion = isset($_POST["observacion"]) ? mb_strtoupper(trim($_POST["observacion"]), 'UTF-8') : null;
 $latitud = isset($_POST["latitud"]) ? mb_strtoupper(trim($_POST["latitud"]), 'UTF-8') : null;
 $longitud = isset($_POST["longitud"]) ? mb_strtoupper(trim($_POST["longitud"]), 'UTF-8') : null;
 $sql = "INSERT INTO reunionn VALUES (0, '$lugar', '$fecha', '$hora', '$motivo', '$observacion',
'$latitud', '$longitud', 'N', null, null,$codigo)";
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado la reunion  correctamemte!!!</p>";
 header("Location: ../../../../../admin/vista/usuario/indexuser.php");

 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
 }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}

//cerrar la base de datos
$conn->close();
echo "<a href='../../../../../admin/vista/usuario/indexuser.php'>Regresar</a>";

?>
</body>
</html>
