<?php
include("config/bd.php");
$txtid = (isset($_GET['id'])) ? $_GET['id'] : "";

// Validar los campos antes 
if ($txtid != "") {
    // elimina el registro
    $sql = "DELETE FROM usuarios  WHERE id=$txtid";

    if ($conn->query($sql) === TRUE) {
        echo "se elimino correctamente.";
        //cerrar conexion
        $conn->close();
        echo " <script> window.location.href='mostrar.php'; </script> ";
    } else {
        echo "Error al eliminar: "; //$conn->error;

    }
}



?>