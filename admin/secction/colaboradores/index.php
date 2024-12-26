<?php
include('../../bd.php');

// Obtención de los registros desde la base de datos
$sentencia = $conexion->prepare("SELECT * FROM tbl_colaboradores");
$sentencia->execute();
$lista_colaboradores = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templat/header.php");
?>

</br>
<div class="card">

    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear</a>
    </div>
    <div class="card-header">Colaboradores</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
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
                        <td scope="row"><?php echo $value['id'];?></td>
                        <td><?php echo $value['titulo'];?></td>
                        <td><img src="../../imagenes/colaboradores/<?php echo $value['foto']; ?>"
                                alt="<?php echo $value['titulo']; ?>" width="50" height="50"></td>
                        <td><?php echo $value['description'];?></td> <!-- Corregido el nombre de la columna -->
                        <td><?php echo $value['linkfacebook'];?></td>
                        <td><?php echo $value['linkinstragram'];?></td> <!-- Corregido el nombre de la columna -->
                        <td><?php echo $value['linklinkedin'];?></td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $value['id']; ?>"
                                role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['id']; ?>"
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