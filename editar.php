<?php

include("conexion.php");

$id = $_GET['id'];

$query = mysqli_query($conexion,
"SELECT * FROM libros WHERE id='$id'");

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="contenedor">

<h2>Editar Libro</h2>

<form action="actualizar.php" method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="text"
name="titulo"
value="<?php echo $row['titulo']; ?>">

<input type="text"
name="autor"
value="<?php echo $row['autor']; ?>">

<input type="text"
name="categoria"
value="<?php echo $row['categoria']; ?>">

<input type="number"
name="stock"
value="<?php echo $row['stock']; ?>">

<button type="submit">

Actualizar

</button>

</form>

</div>

</body>
</html>