<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verificar si el usuario ya existe en la base de datos
  // Ejemplo de verificación
  $usuario_existente = false;

  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];
  $correo = $_POST["correo"];

  if ($usuario_existente) {
    header("Location: registro.php?error=1");
    exit();
  } else {
    // Guardar los datos del nuevo usuario en la base de datos
    // Ejemplo de guardado
    $usuario_guardado = true;

    if ($usuario_guardado) {
      header("Location: noticias.php");
      exit();
    } else {
      header("Location: registro.php?error=2");
      exit();
    }
  }
} else {
  header("Location: registro.php");
  exit();
}
?>
