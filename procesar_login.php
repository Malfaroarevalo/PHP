<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verificar las credenciales en la base de datos

  // Ejemplo de verificación
  $usuario_correcto = "usuario";
  $contrasena_correcta = "contrasena";

  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];

  if ($usuario == $usuario_correcto && $contrasena == $contrasena_correcta) {
    $_SESSION['usuario'] = $usuario;
    header("Location: noticias.php");
    exit();
  } else {
    header("Location: login.php?error=1");
    exit();
  }
} else {
  header("Location: login.php");
  exit();
}
?>