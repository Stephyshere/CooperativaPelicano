<?php

require_once 'config.php';

// Mensaje de éxito/error después de una operación
$mensaje = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        $mensaje = '<div class="alert alert-success">Operación realizada con éxito.</div>';
    } elseif ($_GET['status'] == 'error') {
        $mensaje = '<div class="alert alert-danger">Hubo un error en la operación.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Agricultores</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
    <style>
        .wrapper{ max-width: 900px; margin: 0 auto; }
        .acciones-col { width: 150px; } 
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Listado de Agricultores</h2>
                        <a href="create_agricultor.php" class="btn btn-success pull-right"> Añadir Nuevo Agricultor</a>
                    </div>
                    <?php echo $mensaje; ?>
                    <?php
                    // Intenta seleccionar todos los agricultores
                    $sql = "SELECT * FROM agricultores ORDER BY nombre ASC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Granja</th>";
                                        echo "<th>Correo</th>";
                                        echo "<th class='acciones-col'>Acciones</th>"; 
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['granja']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                                        echo "<td>";
                                            
                                            // 1. Botón para ACTUALIZAR/EDITAR
                                            echo '<a href="update_agricultor.php?id='. $row['id'] .'" class="btn btn-primary btn-sm mr-2" title="Editar" data-toggle="tooltip">Editar</a>';
                                            
                                            // 2. Botón para ELIMINAR
                                            echo '<a href="delete_agricultor.php?id='. $row['id'] .'" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="tooltip">Eliminar</a>';
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Libera el conjunto de resultados
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-info">No se encontraron agricultores.</div>';
                        }
                    } else{
                        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($link);
                    }

                    // Cierra la conexión
                    mysqli_close($link);
                    ?>
                    <p><a href="index.php" class="btn btn-secondary mt-3">Volver al Inicio</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>