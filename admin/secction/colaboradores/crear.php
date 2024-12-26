<?php

include("../../templat/header.php");
include("../../bd.php");

if ($_POST) {
    // Recogemos los datos del formulario de forma segura
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";  
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $linkfacebook = isset($_POST["linkfacebook"]) ? $_POST["linkfacebook"] : "";
    $linkinstragram = isset($_POST["linkinstragram"]) ? $_POST["linkinstragram"] : "";
    $linklinkedin = isset($_POST["linklinkedin"]) ? $_POST["linklinkedin"] : "";
    $foto = isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"] : "";

    // Validamos que los campos requeridos no estén vacíos
    if (!empty($titulo) && !empty($description)) {
        try {
            // Subimos la foto si está disponible
            if (!empty($foto)) {
                $target_dir = "../../uploads/";
                $target_file = $target_dir . basename($foto);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            }

            // Preparamos la consulta
            $sentencia = $conexion->prepare(
                "INSERT INTO `tbl_colaboradores` (`id`, `titulo`, `descripcion`, `foto`, `linkfacebook`, `linkinstragram`, `linklinkedin`) 
                 VALUES (NULL, :titulo, :descripcion, :foto, :linkfacebook, :linkinstragram, :linklinkedin);"
            );

            // Asignamos los parámetros
            $sentencia->bindParam(":titulo", $titulo);
            $sentencia->bindParam(":descripcion", $description);
            $sentencia->bindParam(":foto", $foto);
            $sentencia->bindParam(":linkfacebook", $linkfacebook);
            $sentencia->bindParam(":linkinstragram", $linkinstragram);
            $sentencia->bindParam(":linklinkedin", $linklinkedin);

            // Ejecutamos la consulta
            $sentencia->execute();

            // Redirigimos al índice después de insertar
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
}

?>

<br />
<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="linkfacebook" class="form-label">Link Facebook:</label>
                <input type="text" class="form-control" name="linkfacebook" id="linkfacebook" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="linkinstragram" class="form-label">Link Instagram:</label>
                <input type="text" class="form-control" name="linkinstragram" id="linkinstragram" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="linklinkedin" class="form-label">Link LinkedIn:</label>
                <input type="text" class="form-control" name="linklinkedin" id="linklinkedin" placeholder="" />
            </div>

            <button type="submit" class="btn btn-success">Crear Banner</button>
            <a type="button" class="btn btn-secondary" href="index.php">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templat/footer.php");
?>