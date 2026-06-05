<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "biblioteca1"
);

if(!$conexion){
    die("Error de conexión");
}

?>