<?php
include('../../bd.php');

// Obtención de los registros desde la base de datos
$sentencia = $conexion->prepare("SELECT * FROM tbl_colaboradores");
$sentencia->execute();
$lista_colaboradores = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Manejo seguro para la eliminación de registros
if (isset($_GET['txtID'])) {
    $txtID = filter_input(INPUT_GET, 'txtID', FILTER_VALIDATE_INT);
    if ($txtID) {
        // Obtener el registro antes de eliminar
        $sentencia = $conexion->prepare("SELECT foto FROM tbl_colaboradores WHERE id=:id");
        $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);
        $sentencia->execute();
        $registro_foto = $sentencia->fetch(PDO::FETCH_ASSOC);

        // Borrar la imagen asociada si existe
        if (isset($registro_foto['foto']) && file_exists("../../../imagenes/colaboradores/" . $registro_foto['foto'])) {
            unlink("../../../imagenes/colaboradores/" . $registro_foto['foto']);
        }

        // Eliminar el registro de la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_colaboradores WHERE id=:id");
        $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);
        $sentencia->execute();

        // Redirigir al índice después de eliminar
        header("Location: index.php");
        exit();
    }
}

include("../../templat/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear</a>
    </div>
    <div class="card-header">Colaboradores</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Facebook</th>
                        <th scope="col">Instagram</th>
                        <th scope="col">LinkedIn</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_colaboradores as $value): ?>
                    <tr>
                        <td scope="row"><?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['titulo'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <img src="../../../imagenes/colaboradores/<?php echo htmlspecialchars($value['foto'], ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars($value['titulo'], ENT_QUOTES, 'UTF-8'); ?>" width="50"
                                height="50">
                        </td>
                        <td><?php echo htmlspecialchars($value['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['linkfacebook'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['linkinstragram'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['linklinkedin'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="editar.php?txtID=<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                role="button">Editar</a>
                            <a class="btn btn-danger"
                                href="index.php?txtID=<?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                role="button"
                                onclick="return confirm('¿Estás seguro de que deseas borrar este colaborador?');">Borrar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>

<?php
include("../../templat/footer.php");
?>