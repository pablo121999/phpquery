<?php
include("template/header.php");
include("config/bd.php");

// Validación y sanitización de entrada
function sanitize($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

?>

<div class="container">
    <div class=" justify-content-center  align-items-left ">
        <i>
            <h1 style="text-align: center">Lista de Usuarios 2</h1>


        </i>

        <?php
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $usuario): ?>
                        <tr>
                            <td>
                                <?php echo sanitize($usuario['nombre']); ?>
                            </td>
                            <td>
                                <?php echo sanitize($usuario['documento']); ?>
                            </td>
                            <td>
                                <form method="post">
                                    <div class="form-group" width="50" height="50" role="group">
                                        <button type="button" class="btn btn-warning" name="accion"
                                            onclick="location.href='editar.php?id=<?php echo sanitize($usuario['id']); ?>'">
                                            Actualizar
                                        </button>
                                        <br><br>
                                        <button type="button" name="accion"
                                            onclick="location.href='eliminar.php?id=<?php echo sanitize($usuario['id']); ?>'"
                                            value="Borrar" class="btn btn-danger">
                                            Borrar
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<?php include("template/footer.php"); ?>