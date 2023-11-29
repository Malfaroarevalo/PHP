<?php
// Agrega esta línea para conectar a la base de datos
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];

  // Consulta SQL para verificar las credenciales del usuario
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $_SESSION['usuario'] = $usuario;
    header("Location: noticias.php");
    exit();
  } else {
    $error = "Usuario o contraseña incorrectos";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
</head>
<body>
  <h1>Iniciar Sesión</h1>
  <form action="login.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>
    <input type="submit" value="Iniciar Sesión">
  </form>
  <p><?php echo isset($error) ? $error : ""; ?></p>
  <p>¿No tienes una cuenta? <a href="registro.php">Registrarse</a></p>
</body>
</html>
