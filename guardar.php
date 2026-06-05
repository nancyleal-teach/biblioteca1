<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $stock = $_POST['stock'] ?? 0;

    $query = "INSERT INTO libros(titulo,autor,categoria,stock)
              VALUES('$titulo','$autor','$categoria','$stock')";

    $resultado = mysqli_query($conexion, $query);

    if(!$resultado){
        die("Error en INSERT: " . mysqli_error($conexion));
    }

    header("Location: index.php");
    exit();
}
?>  