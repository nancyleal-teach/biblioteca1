<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Biblioteca</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<nav>
    <h1>Biblioteca</h1>

    <ul>
        <li><a href="#agregar">Agregar Libro</a></li>
        <li><a href="#lista">Libros</a></li>
        <li><a href="#prestamos">Préstamos</a></li>
        <li><a href="#historial">Historial</a></li>
    </ul>
</nav>

<div class="contenedor">

    <!-- AGREGAR LIBRO -->

    <section id="agregar">

        <h2>Agregar Libro</h2>

        <form action="guardar.php" method="POST">

            <input type="text" name="titulo" placeholder="Título" required>

            <input type="text" name="autor" placeholder="Autor" required>

            <input type="text" name="categoria" placeholder="Categoría">

            <input type="number" name="stock" placeholder="Stock" required>

            <button type="submit">Guardar Libro</button>

        </form>

    </section>

    <!-- LISTA DE LIBROS -->

    <section id="lista">

        <h2>Lista de Libros</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>

            <?php

            $query = mysqli_query($conexion, "SELECT * FROM libros");

            while($row = mysqli_fetch_array($query)){

            ?>

            <tr>

                <td><?php echo $row['id']; ?></td>

                <td><?php echo $row['titulo']; ?></td>

                <td><?php echo $row['autor']; ?></td>

                <td><?php echo $row['categoria']; ?></td>

                <td><?php echo $row['stock']; ?></td>

                <td>

                    <a class="editar"
                    href="editar.php?id=<?php echo $row['id']; ?>">
                    Editar
                    </a>

                    <a class="eliminar"
                    href="eliminar.php?id=<?php echo $row['id']; ?>">
                    Eliminar
                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </section>

    <!-- PRESTAMOS -->

    <section id="prestamos">

        <h2>Registrar Préstamo</h2>

        <form action="prestamo.php" method="POST">

            <select name="id_libro">

                <?php

                $libros = mysqli_query($conexion,
                "SELECT * FROM libros WHERE stock > 0");

                while($libro = mysqli_fetch_array($libros)){

                ?>

                <option value="<?php echo $libro['id']; ?>">

                    <?php echo $libro['titulo']; ?>

                </option>

                <?php } ?>

            </select>

            <input type="text"
            name="usuario"
            placeholder="Nombre del usuario"
            required>

            <input type="date"
            name="fecha_devolucion"
            required>

            <button type="submit">

                Registrar Préstamo

            </button>

        </form>

    </section>

    <!-- HISTORIAL -->

    <section id="historial">

        <h2>Historial de Préstamos</h2>

        <table>

            <tr>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devolución</th>
            </tr>

            <?php

            $historial = mysqli_query($conexion,
            "SELECT * FROM prestamos");

            while($h = mysqli_fetch_array($historial)){

            ?>

            <tr>

                <td><?php echo $h['libro']; ?></td>

                <td><?php echo $h['usuario']; ?></td>

                <td><?php echo $h['fecha_prestamo']; ?></td>

                <td><?php echo $h['fecha_devolucion']; ?></td>

            </tr>

            <?php } ?>

        </table>

    </section>

</div>

</body>
</html>