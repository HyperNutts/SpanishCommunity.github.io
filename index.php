<?php session_start()?>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>	
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1 style="text-align:center">Suscriptores Hyppernutts</h1>
            </div>
            <?php if(isset($_SESSION['alertas']['alert-1'])):?>
                <script src="alert-js/alertArchivoNoSoportado.js"></script>
            <?php endif;?>
                
            <?php if(isset($_SESSION['alertas']['alert-2'])):?>
                <script src="alert-js/alertSuscriptorRegistrado.js"></script>
            <?php endif;?>    
                
            <?php if(isset($_SESSION['alertas']['alert-3'])):?>
                <script src="alert-js/alertArchivoSCDB.js"></script>
            <?php endif;?>      
            
            <?php if(isset($_SESSION['name'])): ?>
                <div class="d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary m-3 .text-white" href="registrarSus.php" role="button">Registrar Suscriptor</a>
                    <a class="btn btn-secondary m-3 .text-white" href="limpiarLista.php" role="button">Limpiar lista</a>
                </div>
            <?php else:?> 
            <!------------------ cargar archivo de texto ------------------->    
            <form action="cargarArchivo.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label m-2" >Ruta del Archivo:</label>
                    <div class="col-sm-2">
                        <input type="file"  name="archivo"  required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 mt-4">
                        <button type="submit" class="btn btn-outline-info btn-lg">Cargar Archivo</button>
                    </div>
                </div>
            </form>
            <!------------------------------------------ --> 
            <?php endif;?> 
            <?php if(isset($_SESSION['name'])): ?>
                <div class="row table-responsive h-50" data-spy="scroll" data-target="#navbar-example3">
                    <table class="table table-striped text-center">
                        <thead class="position-sticky t-0">
                            <tr >
                                <th>#</th>
                                <th >Nombre</th>
                                <th>Nivel</th>
                                <th>Tiempo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['name'])): ?>
                                <?php foreach ($_SESSION['name'] as $indice => $nombre): ?>
                                    <tr>
                                        <td>@</td>
                                        <td><?=$nombre?></td>
                                        <td><?=$_SESSION['tier'][$indice]?></td>
                                        <td><?=$_SESSION['time'][$indice]?></td>
                                        <td><?=$_SESSION['fecha'][$indice]?></td>
                                        <td><?=$_SESSION['hora'][$indice]?></td>        
                                        <td>
                                            <a href="modificarSus.php?id=<?=$indice?>" data-href="" data-toggle="modal" data-target="#confirm-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                </svg>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="eliminarSus.php?id=<?= $indice?>" data-href="" data-toggle="modal" data-target="#confirm-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif;?>        
                        </tbody>

                    </table>
                </div>
            
                <form class="form-horizontal" method="POST" action="guardarSCDB.php" autocomplete="off">
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label m-2">Nombre del archivo .SCDB:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control m-2" name="archivo" placeholder="nombre archivo....." accept=".txt" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-outline-info btn-lg">Generar SCDB</button>
                        </div>
                    </div>
                </form>
            <?php endif;?> 
        </div>
        <?php include 'eliminarAlertas.php';?>
    </body>
</html>

