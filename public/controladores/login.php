<?php
 session_start();
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena') and usu_eliminado='N' AND usu_rol='ADMIN'";
 $sql1 = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
 MD5('$contrasena') and usu_eliminado='N' AND usu_rol='user'";
 $result = $conn->query($sql);
 $result1 = $conn->query($sql1);
 if ($result->num_rows > 0) {
 $_SESSION['isLogged'] = TRUE;
 header("Location: ../../admin/vista/usuario/indexadmin.php");
 } else if ($result1->num_rows > 0) {
     
      while($row = $result1->fetch_assoc()) {
      $codi=$row['usu_codigo'];
     }
    $_SESSION['isLogged'] = TRUE;
    header("Location: ../../admin/vista/usuario/indexuser.php?codigo=".$codi);
 } else {
    header("Location: ../vista/login.html");
 }
 $conn->close();
?>