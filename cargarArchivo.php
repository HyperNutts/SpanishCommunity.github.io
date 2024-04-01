<?php

session_start();
$archivo = $_FILES['archivo'];
/*
  echo '-------------------' . "<br><br>";
  var_dump($archivo);
  echo "<br><br>";
  echo 'error: ' . $archivo['error'] . "<br><br>";
  echo '-------------------' . "<br><br>";

  die();
 */

if ($archivo['type'] == "application/octet-stream") {
    // Verificar si se cargó el archivo correctamente
    if ($archivo['error'] === UPLOAD_ERR_OK/* valor 0 */) {
        $ruta = $archivo['tmp_name'];

        // Intentar abrir el archivo
        $archivo_abierto = fopen($ruta, "r");

        // Verificar si se abrió correctamente el archivo
        if ($archivo_abierto) {
            //Palabras a encontrar
            $name = "name";
            $tier = "tier";
            $time = "time";
            $date = "date";

            //Arrays
            $names = array();
            $tiers = array();
            $times = array();
            //Diviendo date en fechas y horas
            $fechas = array();
            $horas = array();

            // Leer el contenido del archivo línea por línea
            while (($linea = fgets($archivo_abierto)) !== false) {

                //Buscar name
                $posicion1 = strpos($linea, $name);

                if ($posicion1 !== false) {
                    //echo "La cadena '$busqueda' fue encontrada en la posición $posicion.";
                    //echo substr($linea, 5)."<br><br>";
                    $names[] = substr($linea, 6);
                }

                //Buscar tier
                $posicion2 = strpos($linea, $tier);

                if ($posicion2 !== false) {
                    //echo "La cadena '$busqueda' fue encontrada en la posición $posicion.";
                    //echo substr($linea, 5)."<br><br>";
                    $tiers[] = substr($linea, 6,3);
                }

                //Buscar time
                $posicion3 = strpos($linea, $time);

                if ($posicion3 !== false) {
                    //echo "La cadena '$busqueda' fue encontrada en la posición $posicion.";
                    //echo substr($linea, 5)."<br><br>";
                    $times[] = substr($linea, 6,3);
                }

                //Buscar fecha(date)
                $posicion4 = strpos($linea, $date);

                if ($posicion4 !== false) {
                    //echo "La cadena '$busqueda' fue encontrada en la posición $posicion.";
                    //echo substr($linea, 5)."<br><br>";
                    $fechas[] = substr($linea, 6, 10);
                }

                //Buscar hora(date)
                $posicion5 = strpos($linea, $date);

                if ($posicion5 !== false) {
                    //echo "La cadena '$busqueda' fue encontrada en la posición $posicion.";
                    //echo substr($linea, 5)."<br><br>";
                    $horas[] = substr($linea, 17, 6);
                }
            }

            // Cerrar el archivo después de usarlo
            fclose($archivo_abierto);

            //Añadir a las sessiones
            $_SESSION['name'] = $names;
            $_SESSION['tier'] = $tiers;
            $_SESSION['time'] = $times;
            $_SESSION['fecha'] = $fechas;
            $_SESSION['hora'] = $horas;
        } else {
            // Si no se pudo abrir el archivo, mostrar un mensaje de error
            echo "No se pudo abrir el archivo.";
            header('Refresh: 5; URL=index.php');
        }
        header('Location: index.php');
    } else {
        // Si ocurrió un error al cargar el archivo, mostrar un mensaje de error
        echo "Error al cargar el archivo: " . $archivo['error'];
        header('Refresh: 5; URL=index.php');
    }
} else {
    //echo "<h1>Archivo no soportado , añadir un archivo tipo .scdb</h1>";
    //echo "<h2>Volviendo al inicio en 5 segundos.....</h2>";
    //header('Refresh: 5; URL=index.php');
    $_SESSION['alertas']['alert-1']=true;
    header('Location: index.php');
}

