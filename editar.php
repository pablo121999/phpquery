<?php
include("template/header.php");
include("config/bd.php");

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$documento = (isset($_POST['documento'])) ? $_POST['documento'] : "";

$txtid = (isset($_GET['id'])) ? $_GET['id'] : "";


if ($accion == "Actualizar") {
    // Validar los campos antes de la actualización
    if (!empty($nombre) && !empty($documento)) {
        // Actualizar el registro
        $sql = "UPDATE usuarios SET nombre='$nombre', documento='$documento' WHERE id=$txtid";

        if ($conn->query($sql) === TRUE) {
            echo "Los campos nombre y documento se han actualizado correctamente.";
        } else {
            echo "Error al actualizar los campos: " . $conn->error;
        }
    }
    echo " <script> window.location.href='mostrar.php'; </script> ";
}


$sql = "SELECT nombre, documento FROM usuarios WHERE id=$txtid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $nombre = $row['nombre'];
        $documento = $row['documento'];
        break;
    }
} else {
    echo "No se encontró ningún registro.";
}
//cerrar conexion
$conn->close();


?>
<div class="container">

    <div class="row  vh-100 justify-content-center  align-items-center text-center">

        <div class="col-auto bg-ligth p-5 ">
            <i>
                <h1>lista</h1>
                <h2>Crear Usuario</h2>
            </i>

            <form id="create-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" value="<?php echo $nombre; ?>" name="nombre"
                            placeholder="Nombre" required>
                    </div>
                    <div class="col">
                        <input type="number" name="documento" value="<?php echo $documento; ?>" placeholder="Documento"
                            class="form-control" required>
                    </div>
                </div>
                </br>
                <button type="submit" name="accion" class="btn btn-warning" value="Actualizar"> Actualizar </button>
                <button type="button" class="btn btn-warning" onclick=location.href="mostrar.php"> Cancelar
                </button>
            </form>

        </div>
    </div>
</div>

<?php
include("template/footer.php");
?>