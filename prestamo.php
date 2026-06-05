<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if (!isset($_POST['id_libro'], $_POST['usuario'], $_POST['fecha_devolucion'])) {
    die("Faltan datos");
}

$id_libro = $_POST['id_libro'];
$usuario = $_POST['usuario'];
$fecha_prestamo = date("Y-m-d");
$fecha_devolucion = $_POST['fecha_devolucion'];

$query = mysqli_query($conexion, "SELECT * FROM libros WHERE id='$id_libro'");
$row = mysqli_fetch_array($query);

if (!$row) {
    die("Libro no encontrado");
}

$libro = $row['titulo'];

mysqli_query($conexion, "INSERT INTO prestamos(libro, usuario, fecha_prestamo, fecha_devolucion)
VALUES('$libro', '$usuario', '$fecha_prestamo', '$fecha_devolucion')")
or die(mysqli_error($conexion));

mysqli_query($conexion, "UPDATE libros SET stock = stock - 1 WHERE id='$id_libro'")
or die(mysqli_error($conexion));

header("Location:index.php");
?>