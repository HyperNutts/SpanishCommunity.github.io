<?php
session_start();
if (isset($_GET['id'])) {
    // Obtener el ID del administrador a eliminar
    $id = $_GET['id'];
    /*
    var_dump($_SESSION['name'][$id]);
    var_dump($_SESSION['tier'][$id]);
    var_dump($_SESSION['time'][$id]);
    var_dump($_SESSION['fecha'][$id]);
    var_dump($_SESSION['hora'][$id]);
    die();*/
    unset($_SESSION['name'][$id]);
    unset($_SESSION['tier'][$id]);
    unset($_SESSION['time'][$id]);
    unset($_SESSION['fecha'][$id]);
    unset($_SESSION['hora'][$id]);
    header('Location: index.php');

} else {
    echo "Error al eliminar el archivo";
    header('Refresh: 5; URL=index.php');
}

