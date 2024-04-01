<?php

session_start();
if (isset($_POST['nombre']) && isset($_POST['nivel']) && isset($_POST['tiempo'])) { 
    
    //Añadir elementos al array
    array_push($_SESSION['name'], $_POST['nombre']);
    array_push($_SESSION['tier'], $_POST['nivel']);
    array_push($_SESSION['time'], $_POST['tiempo']);
    array_push($_SESSION['fecha'], substr($_POST['fecha'], 8,2)."/".substr($_POST['fecha'], 5,2)."/".substr($_POST['fecha'], 0,4));
    array_push($_SESSION['hora'], $_POST['hora']);
     
    header('Location: index.php');
    $_SESSION['alertas']['alert-2']=true;
} else {
    echo "<h1>Error al agregar un nuevo suscriptor</h1>";
    header('Refresh: 5; URL=index.php');
}


