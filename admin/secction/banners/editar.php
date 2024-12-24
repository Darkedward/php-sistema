<?php
include("../../templat/header.php");
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
            <button type="submit" class="btn btn-success">Editar Banner</button>
            <a type="button" class="btn btn-success" href="index.php">cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
include("../../templat/footer.php");
?>