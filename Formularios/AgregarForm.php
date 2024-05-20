<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar Producto</h1>
    <br>
    <div class="container">
        <form action="../CRUD/insertarDatos.php" method="POST">
            <label for="categoria">Categorias</label>
            <select class="form-select mb-3" name="CategoriaP" id="categoria">
                <option selected disabled>--seleccionar categoria--</option>
                <?php
                    include ("../Config/Conexion.php");
                    $conexion = (new Conexion())->getConexion();
                    $sql = $conexion->query("SELECT * FROM categorias");
                    while ($resultado = $sql->fetch_assoc()) {
                        echo "<option value='" . $resultado['Id'] . "'>" . $resultado['NombreCategoria'] . "</option>";
                    }
                ?>
            </select>
            <label for="marca">Marcas</label>
            <select class="form-select mb-3" name="MarcaP" id="marca">
                <option selected disabled>--seleccionar marca--</option>
                <?php
                    $sql = $conexion->query("SELECT * FROM Marcas");
                    while ($resultado = $sql->fetch_assoc()) {
                        echo "<option value='" . $resultado['Id'] . "'>" . $resultado['NombreMarca'] . "</option>";
                    }
                ?>
            </select>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" name="Precio">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
