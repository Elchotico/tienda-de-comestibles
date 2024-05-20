<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center" style="background-color: black; color: white; border-radius: 5px">EDITAR PRODUCTOS</h1>
    <br>
    <form class="container" action="../CRUD/EditarDatos.php" method="POST">
        <?php
        include_once('../config/conexion.php');
        
        $sql = "SELECT * FROM productos WHERE IdProducto = " . $_REQUEST['Id'];
        $resultado = $conexion->query($sql);

        if ($resultado) {
            $row = $resultado->fetch_assoc();
        } else {
            echo "Error: " . $conexion->error;
            exit;
        }
        ?>
        <input type="hidden" class="form-control" name="Id" value="<?php echo $row['IdProducto']; ?>">

        <label>Categorias</label>
        <select class="form-select mb-3" aria-label="Default select example" name="Categorias">
            <option selected disabled>--Selecciona categorias--</option>
            <?php
            $sql = "SELECT * FROM categorias WHERE Id = " . $row['CategoriaId'];
            $resultado1 = $conexion->query($sql);

            if ($resultado1) {
                $row1 = $resultado1->fetch_assoc();
                echo "<option selected value='" . $row1['Id'] . "'>" . $row1['NombreCategoria'] . "</option>";
            } else {
                echo "Error: " . $conexion->error;
                exit;
            }

            $sql2 = "SELECT * FROM categorias";
            $resultado2 = $conexion->query($sql2);

            if ($resultado2) {
                while ($fila = $resultado2->fetch_assoc()) {
                    echo "<option value='" . $fila['Id'] . "'>" . $fila['NombreCategoria'] . "</option>";
                }
            } else {
                echo "Error: " . $conexion->error;
                exit;
            }
            ?>
        </select>

        <label>Marcas</label>
        <select class="form-select mb-3" aria-label="Default select example" name="Marcas">
            <option selected disabled>--Seleccione marcas--</option>
            <?php
            $sql3 = "SELECT * FROM marcas WHERE Id = " . $row['MarcaId'];
            $resultado3 = $conexion->query($sql3);

            if ($resultado3) {
                $row3 = $resultado3->fetch_assoc();
                echo "<option selected value='" . $row3['Id'] . "'>" . $row3['NombreMarca'] . "</option>";
            } else {
                echo "Error: " . $conexion->error;
                exit;
            }

            $sql4 = "SELECT * FROM Marcas";
            $resultado4 = $conexion->query($sql4);

            if ($resultado4) {
                while ($fila = $resultado4->fetch_assoc()) {
                    echo "<option value='" . $fila['Id'] . "'>" . $fila['NombreMarca'] . "</option>";
                }
            } else {
                echo "Error: " . $conexion->error;
                exit;
            }
            ?>
        </select>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="Precio" value="<?php echo $row['Precio']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" value="<?php echo $row['DescripcionProducto']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="<?php echo $row['Nombre']; ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger">Agregar</button>
            <a href="../index.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>
</body>
</html>
