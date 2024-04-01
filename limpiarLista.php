<?php
session_start();
if(isset($_SESSION['name'])){
    session_destroy();
    header('Location: index.php');
}else{
    echo "<h1>No hay sessiones presentes</h1>";
    header('Refresh: 5; URL=index.php');
}

