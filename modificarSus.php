<?php

if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'idAdmin'
    $id = $_GET['id'];
    
    session_start();
    /*
    echo $_SESSION['fecha'][$id]."<br><br>";
    echo 'Año: '.substr($_SESSION['fecha'][$id],6)."<br><br>";
    echo 'Mes: '.substr($_SESSION['fecha'][$id],3,2)."<br><br>";
    echo 'Dia: '.substr($_SESSION['fecha'][$id],0,2)."<br><br>";
    
    echo $_SESSION['hora'][$id]."<br><br>";
    echo 'Hora: '.substr($_SESSION['hora'][$id],0,2)."<br><br>";
    echo 'Minuto: '.substr($_SESSION['hora'][$id],3,2)."<br><br>";
    session_destroy();
    die();
    */
}
?>
<html lang="es">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h3 style="text-align:center">Modificar Suscriptor</h3>
            </div>
            
            <form class="form-horizontal" method="POST" action="modificarSusUpdate.php?id=<?= $id?>" autocomplete="off">
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control m-2"  name="nombre" value="<?=$_SESSION['name'][$id]?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Nivel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control m-2"  name="nivel" value="<?=$_SESSION['tier'][$id]?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Tiempo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control m-2"  name="tiempo" value="<?=$_SESSION['time'][$id]?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Fecha</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control m-2"  name="fecha" value="<?=substr($_SESSION['fecha'][$id],6)?>-<?=substr($_SESSION['fecha'][$id],3,2)?>-<?=substr($_SESSION['fecha'][$id],0,2)?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Hora</label>
                    <div class="col-sm-2">
                        <input type="time" class="form-control m-2"  name="hora" value="<?=substr($_SESSION['hora'][$id],0,2)?>:<?=substr($_SESSION['hora'][$id],3,2)?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="Suscriptores.php" class="btn btn-outline-warning">Regresar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>

            
        </div>
    </body>
</html>


