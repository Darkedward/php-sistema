<?php
include("../../bd.php");

// Corrección en la consulta SQL
$sentencia = $conexion->prepare("SELECT * FROM tbl_banners"); // Quité las comillas simples alrededor de 'tbl_banners'
$sentencia->execute();

// Corrección en la obtención de resultados
$lista_banners = $sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templat/header.php");
?>



<div class="card">
    <div class="card-header">


        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">crear</a>

    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr class="">
                        <td scope="col">ID</td>
                        <td scope="col">Titulo</td>
                        <td scope="col">Description</td>
                        <td scope="col">Enlace</td>
                        <td scope="col">Acciones</td>

                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <?php 
                        foreach($lista_banners as $key=>$value){?>
                        <td scope="row"><?php echo $value['id'];?></td>
                        <td><?php echo $value['titulo'];?></td>
                        <td><?php echo $value['descripcion'];?></td>
                        <td><?php echo $value['link'];?></td>
                        <td><a name="" id="" class="btn btn-primary" href="editar.php" role="button">editar</a>
                        </td>
                        <td><a name="" id="" class="btn btn-primary" href="#" role="button">borrar</a>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php
include("../../templat/footer.php");
?>