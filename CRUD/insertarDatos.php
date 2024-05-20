<?php
include ("../Config/Conexion.php");

$categoria = $_POST['categoriaP'];
$marca = $_POST['MarcaP'];
$precio = $_POST['Precio'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];

$sql = "INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre) VALUES ('$categoria', '$marca', '$precio', '$descripcion', '$nombre')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Datos NO insertados: " . mysqli_error($conexion);
}
?>
