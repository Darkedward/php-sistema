<?php
include("../../bd.php");

// Validamos que se reciba un `txtID` y que sea válido
if (isset($_GET['txtID'])) {
    $txtID = filter_var($_GET['txtID'], FILTER_VALIDATE_INT); // Validamos que sea un número entero
    if ($txtID) {
        // Obtenemos los datos del banner correspondiente
        $sentencia = $conexion->prepare("SELECT * FROM tbl_banners WHERE id = :id");
        $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($registro) {
            $titulo = $registro["titulo"];
            $descripcion = $registro["descripcion"];
            $link = $registro["link"];
        } else {
            // Si no se encuentra el registro, redirigimos al índice
            header("Location: index.php");
            exit;
        }
    } else {
        // Si el ID es inválido, redirigimos al índice
        header("Location: index.php");
        exit;
    }
} else {
    // Si no se proporciona un ID, redirigimos al índice
    header("Location: index.php");
    exit;
}

// Procesamos el formulario
if ($_POST) {
    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";
    $link = (isset($_POST["link"])) ? $_POST["link"] : "";
    $txtID = (isset($_POST["txtID"])) ? filter_var($_POST["txtID"], FILTER_VALIDATE_INT) : "";

    if ($txtID) {
        // Actualizamos el registro en la base de datos
        $sentencia = $conexion->prepare("
            UPDATE tbl_banners 
            SET titulo = :titulo, descripcion = :descripcion, link = :link
            WHERE id = :id
        ");

        // Asignamos los parámetros
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":descripcion", $descripcion);
        $sentencia->bindParam(":link", $link);
        $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);

        // Ejecutamos la consulta
        $sentencia->execute();

        // Redirigimos al índice después de guardar
        header("Location: index.php");
        exit;
    }
}

include("../../templat/header.php");
?>

<br>
<div class="card">
    <div class="card-header">Editar Banner</div>
    <div class="card-body">
        <form method="post">
            <!-- Campo oculto para el ID -->
            <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($txtID, ENT_QUOTES, 'UTF-8'); ?>" />

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" value="<?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>"
                    class="form-control" name="titulo" id="titulo" placeholder="Escriba el título del banner"
                    required />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" value="<?php echo htmlspecialchars($descripcion, ENT_QUOTES, 'UTF-8'); ?>"
                    class="form-control" name="descripcion" id="descripcion"
                    placeholder="Escriba la descripción del banner" required />
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Enlace</label>
                <input type="text" value="<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>"
                    class="form-control" name="link" id="link" placeholder="Escriba el enlace" required />
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templat/footer.php");
?>