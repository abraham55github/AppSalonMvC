<?php

$db = mysqli_connect('localhost', 'root', '1234', 'appsalon_crud');


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
