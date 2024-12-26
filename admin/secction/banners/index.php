<?php
include("../../bd.php");

// Manejo seguro para la eliminación de registros
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";
    $sentencia = $conexion->prepare("DELETE FROM tbl_banners WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
     // Redirigimos al índice después de insertar
    header("Location: index.php");
}


// Obtención de los registros desde la base de datos
$sentencia = $conexion->prepare("SELECT * FROM tbl_banners");
$sentencia->execute();
$lista_banners = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templat/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Enlace</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_banners as $value): ?>
                    <tr>
                        <td scope="row"><?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['titulo'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['descripcion'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($value['link'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $value['id']; ?>"
                                role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['id']; ?>"
                                role="button"
                                onclick="return confirm('¿Estás seguro de que deseas borrar este banner?');">Borrar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templat/footer.php");
?>