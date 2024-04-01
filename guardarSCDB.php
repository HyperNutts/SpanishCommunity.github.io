<?php

session_start();

if (isset($_POST['archivo'])) {
    // Contenido del archivo


    $contenido = "";
    foreach ($_SESSION['name'] as $indice => $nombre) {
        $txt1 = "@vip\n";
        $txt2 = "name: " . $nombre;
        $txt3 = "tier: " . $_SESSION['tier'][$indice];
        $txt4 = "time: " . $_SESSION['time'][$indice];
        $txt5 = "date: " . $_SESSION['fecha'][$indice] . " " . $_SESSION['hora'][$indice] . "\n\n";
        $contenido = $contenido . $txt1 . $txt2 . $txt3 . $txt4 . $txt5;
    }

    // Ruta del archivo (puedes modificarla según tu necesidad)
        $rutaArchivo = "SCDB/" . $_POST['archivo'] . ".scdb";
        $archivo = fopen($rutaArchivo, "w");
    // Intenta abrir o crear el archivo
    if ($archivo) {
        // Escribe el contenido en el archivo
        if (fwrite($archivo, $contenido)) {
            //echo "El archivo $rutaArchivo se ha creado correctamente.";
            $_SESSION['alertArchivo'] = '<script src="sweetalert2.all.min.js"></script>';     
        } else {
            echo "Error al escribir en el archivo.";
        }
        // Cierra el archivo
        fclose($archivo);
        $_SESSION['alertas']['alert-3']=true;
        header('Location: index.php');
    } else {
        echo "Error al abrir o crear el archivo.";
    }
} else {
    echo "No se encontro el archivo";
}


