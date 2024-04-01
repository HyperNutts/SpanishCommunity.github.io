
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
                <h3 style="text-align:center">Registrar Suscriptores</h3>
            </div>

            <form class="form-horizontal" method="POST" action="guardarSus.php" autocomplete="off">
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control m-2"  name="nombre" placeholder="name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Nivel</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control m-2"  name="nivel" placeholder="tier"  min="0" max="99" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Tiempo</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control m-2"  name="tiempo" placeholder="time" min="0" max="99999" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Fecha</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control m-2"  name="fecha" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label m-2">Hora</label>
                    <div class="col-sm-2">
                        <input type="time" class="form-control m-2"  name="hora" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="index.php" class="btn btn-outline-warning">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
