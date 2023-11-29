<?php
// Agrega esta línea para conectar a la base de datos
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];
  $correo = $_POST["correo"];

  // Consulta SQL para verificar si el usuario ya existe en la base de datos
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0) {
    // El usuario no existe, realizar el registro en la base de datos
    $sql = "INSERT INTO usuarios (usuario, contrasena, correo) VALUES ('$usuario', '$contrasena', '$correo')";
    if ($conn->query($sql) === TRUE) {
      // Redireccionar a la página de noticias después del registro exitoso
      $_SESSION['usuario'] = $usuario;
      header("Location: noticias.php");
      exit();
    } else {
      $error = "Error al registrar el usuario";
    }
  } else {
    $error = "El usuario ya existe";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
</head>
<body>
  <h1>Registrarse</h1>
  <form action="registro.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>
    <label for="correo">Correo Electrónico:</label>
    <input type="email" id="correo" name="correo" required><br>
    <input type="submit" value="Registrarse">
  </form>
  <p><?php echo isset($error) ? $error : ""; ?></p>
  <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
</body>
</html>
