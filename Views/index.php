<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD RELACIONAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <br>
    <div class ="container">

    </div>
        <h1 class = "text-center" style="background-color: black; color: white; border-radius: 5px;" >LISTA DE PRODUCTOS </h1>
    </div>

    <br>
    <div class ="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Categoria</th>
      <th scope="col">Marca</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
        <?php
        require('../Config/Conexion.php');

        $sql = $conexion -> query("SELECT * FROM productos
        INNER JOIN categorias ON productos.CategoriaId = categorias.Id
        INNER JOIN marcas ON productos.MarcaId = Marcas.Id
        ");

        while ($resultado = $sql->fetch_assoc()) {
        ?>
        
            <tr>
                <th scope="row"><?php echo $resultado['Idproducto']?></th>
                <th scope="row"><?php echo $resultado['NombreCategoria']?></th>
                <th scope="row"><?php echo $resultado['NombreMarca']?></th>
                <th scope="row"><?php echo $resultado['Precio']?></th>
                <th scope="row"><?php echo $resultado['DescripcionProducto']?></th>
                <th scope="row"><?php echo $resultado['Nombre']?></th>
                <th> 
                <a href="Formularios/EditarForm.php?Id=<?php echo $resultado['IdProducto']?>" class="btn btn-Warning">Editor</a>
                <a href="CRUD/EliminarDatos.php?Id=<?php echo $resultado['IdProducto']?>" class="btn btn-Danger">Eliminar</a>
                </th>
            </tr>

        <?php
            }
        ?>
    
  </tbody>
</table>
            <div class="container">
            <a href="http://localhost/tiendita/Formularios/agregarForm.php" class="btn btn-succes">Agregar Productos</a>
            </div>
    </div>

    <div class="container">
            <a href="http://localhost/tiendita/Formularios/EditarForm.php" class="btn btn-succes">Editar</a>
            </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>