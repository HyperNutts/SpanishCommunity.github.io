<?php

if (isset($_GET['id'])) {
    //Abrimos session
    session_start();
    // Obtener los datos del formulario y limpiarlos para evitar inyección SQL
    $id = $_GET['id'];
  
    //Reemplazamos datos por medio del id
    $_SESSION['name'][$id] = $_POST['nombre'];
    $_SESSION['tier'][$id] = $_POST['nivel'];
    $_SESSION['time'][$id] = $_POST['tiempo'];
    $_SESSION['fecha'][$id] = substr($_POST['fecha'], 8, 2) . "/" . substr($_POST['fecha'], 5, 2) . "/" . substr($_POST['fecha'], 0, 4);
    $_SESSION['hora'][$id] = $_POST['hora'];
    
    header('Location: index.php');
    
} else {
    echo "Error al actualizar el archivo";
    header('Refresh: 5; URL=index.php');
}


