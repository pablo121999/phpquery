<?php
include("template/header.php");

include("config/bd.php");
?>
<div class="container">

    <div class="row  vh-100 justify-content-center  align-items-center text-center">

        <div class="col-auto bg-ligth p-5 ">
            <i>
                <h2>Crear Usuario</h2>
            </i>

            <form id="create-form" method="POST">
                <div class="row">

                    <div class="col">
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="col">
                        <input type="number" name="documento" placeholder="Documento" class="form-control" required>
                    </div>
                </div>
                </br>
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-warning" onclick=location.href="mostrar.php"> Ver Usuarios
                </button>
            </form>

        </div>
    </div>
</div>


<?php
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
$documento = (isset($_POST['documento'])) ? $_POST['documento'] : "";
echo $nombre;
if (!empty($nombre)) {

    // Validar y limpiar los datos de entrada
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $documento = filter_input(INPUT_POST, 'documento', FILTER_SANITIZE_STRING);


    $sql = "INSERT INTO usuarios (nombre, documento) VALUES ('$nombre', '$documento')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }

}

$conn->close();

include("template/footer.php");
?>