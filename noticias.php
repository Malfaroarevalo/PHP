<?php
session_start();

// Agrega esta línea para conectar a la base de datos
require_once "conexion.php";

if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Noticias</title>
</head>
<body>
  <h1>Bienvenido a la Página de Noticias</h1>
  <p>Hola, <?php echo $_SESSION['usuario']; ?>. Estás viendo las noticias.</p>

  <!-- Aquí puedes mostrar las noticias obtenidas de la base de datos -->
  <!-- Ejemplo: -->
  <div>
    <h2>Título de la noticia 1</h2>
    <p>Contenido de la noticia 1.</p>
    <img src="imagen_noticia_1.jpg" alt="Imagen de la noticia 1">
  </div>

  <div>
    <h2>Título de la noticia 2</h2>
    <p>Contenido de la noticia 2.</p>
    <img src="imagen_noticia_2.jpg" alt="Imagen de la noticia 2">
  </div>

  <form action="cerrar_sesion.php" method="post">
    <input type="submit" value="Cerrar Sesión">
  </form>
</body>
</html>
