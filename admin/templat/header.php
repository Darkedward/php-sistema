<?php
    $url_base="http://localhost/restaurant/admin/"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Estética</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Estilos personalizados para la barra de navegación */
    .navbar-custom {
        background-color: rgb(21, 131, 241);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
    }

    .navbar-nav .nav-link {
        color: #343a40;
        font-weight: 500;
        padding: 8px 15px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        background-color: #7a6ad8;
        color: #fff;
    }

    .navbar-nav .nav-link.active {
        background-color: #7a6ad8;
        color: #fff;
    }

    .navbar-nav .nav-link.text-danger {
        color: #dc3545;
        font-weight: 600;
    }

    .navbar-nav .nav-link.text-danger:hover {
        background-color: #f8d7da;
        color: #dc3545;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Panel de Control</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Administrador</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_base; ?>secction/banners/">Banner</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo $url_base; ?>secction/colaboradores/">Colaboradores</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_base; ?>secction/testimonio/"
                            </a>Testimonios</li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_base; ?>secction/menu/" </a>
                            Menu
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_base; ?>secction/comentarios/"
                            </a>Comentarios</li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_base; ?>secction/usuarios/"
                            </a>Usuarios</li>
                    <li class="nav-item"><a class="nav-link text-danger" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>