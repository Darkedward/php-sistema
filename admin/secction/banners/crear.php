<?php
include("../../templat/header.php");
include("../../bd.php");
if ($_POST) {
    // Recogemos los datos del formulario de forma segura
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $link = isset($_POST["link"]) ? $_POST["link"] : "";

    // Validamos que los campos requeridos no estén vacíos
    if (!empty($titulo) && !empty($descripcion) && !empty($link)) {
        try {
            // Preparamos la consulta
            $sentencia = $conexion->prepare(
                "INSERT INTO `tbl_banners` (`id`, `titulo`, `descripcion`, `link`) 
                 VALUES (NULL, :titulo, :descripcion, :link);"
            );

            // Asignamos los parámetros
            $sentencia->bindParam(":titulo", $titulo);
            $sentencia->bindParam(":descripcion", $descripcion);
            $sentencia->bindParam(":link", $link);

            // Ejecutamos la consulta
            $sentencia->execute();

            // Redirigimos al índice después de insertar
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>

</br>
<div class="card">
    <div class="card-header">Banners</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId"
                    placeholder="escriba el titulo del banner" />

            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">description</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId"
                    placeholder="escriba la description del banner" />

            </div>

            <div class="mb-3">
                <label for="link" class="form-label">link</label>
                <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId"
                    placeholder="escriba el enlaze" />

            </div>
            <button type="submit" class="btn btn-success">Crear Banner</button>
            <a type="button" class="btn btn-success" href="index.php">cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templat/footer.php");
?>