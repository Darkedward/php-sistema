<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .navbar {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .welcome-section {
        margin-top: 30px;
        padding: 40px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .welcome-section h1 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .welcome-section p {
        margin-bottom: 20px;
        font-size: 1rem;
        color: #6c757d;
    }

    .btn-primary {
        font-size: 1rem;
        padding: 10px 20px;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Administrador</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Banner</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Colaboradores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menú</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Comentarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container welcome-section">
        <h1>Bienvenid@ al administrador</h1>
        <p>Este espacio es para administrar su sitio web.</p>
        <a href="#" class="btn btn-primary">Iniciar ahora</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>