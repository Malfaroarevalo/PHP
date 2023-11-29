<?php
// Datos de conexión a la base de datos
$servername = "nombre_del_servidor";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "hospital_db"; // Nombre de la base de datos que creaste en MySQL Workbench

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
  die("Error al conectar a la base de datos: " . $conn->connect_error);
}
?>
