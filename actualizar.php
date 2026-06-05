<?php

include("conexion.php");

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

mysqli_query($conexion,

"UPDATE libros SET

titulo='$titulo',
autor='$autor',
categoria='$categoria',
stock='$stock'

WHERE id='$id'"

);

header("Location:index.php");

?>