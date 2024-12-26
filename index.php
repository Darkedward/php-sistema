<!DOCTYPE html>
<html lang="en">

<?php
include("admin/bd.php");

$sentencia = $conexion->prepare("SELECT * FROM tbl_banners limit 1");
$sentencia->execute();
$lista_banners = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant La Sombra</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
    }

    .social-icons a {
        color: #6c757d;
        margin: 0 10px;
        font-size: 1.5rem;
        text-decoration: none;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .social-icons a:hover {
        color: #007bff;
        transform: scale(1.2);
    }

    .hero-section {
        background-image: url('imagenes/ok.png');
        background-size: cover;
        background-position: center;
        text-align: center;
        color: white;
        padding: 100px 0;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.6);
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .hero-section p {
        font-size: 1.5rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    }

    .cta-button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 30px;
    }

    .welcome-section {
        background-color: #f8f9fa;
        color: #212529;
        padding: 50px 20px;
        text-align: center;
        border-bottom: 5px solid #007bff;
    }

    .welcome-section h2 {
        font-weight: bold;
        font-size: 2.5rem;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-weight: bold;
        color: #007bff;
    }

    .card-text {
        color: #6c757d;
    }

    .social-icons.mt-3 a {
        margin: 0 5px;
    }

    .bg-light {
        background-color: #f0f0f0 !important;
    }

    #testimonios h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: #007bff;
    }

    .card-footer {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .card-body p {
        font-style: italic;
    }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <?php
                foreach($lista_banners as $banner) {
            ?>
            <h1 class="display-4"><?php echo $banner['titulo']; ?></h1>
            <p class="lead"><?php echo $banner['descripcion']; ?></p>

            <a href="#menu" class="btn btn-primary cta-button"><?php echo $banner['link']; ?></a>
            <?php
                }
            ?>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <h2 class="fw-bold">¡Bienvenid@ al Restaurant La Sombra!</h2>
            <p class="lead">Descubre una experiencia culinaria única</p>
        </div>
    </section>

    <!-- Chefs Section -->
    <section id="chefs" class="container mt-4 text-center">
        <h2>Conoce a Nuestros Chefs</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="imagenes/colaboradores/1.png" class="card-img-top" alt="chef1" />
                    <div class="card-body">
                        <h5 class="card-title">Chef 1</h5>
                        <p class="card-text">Especialista en sabores tradicionales.</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="imagenes/colaboradores/1.png" class="card-img-top" alt="chef1" />
                    <div class="card-body">
                        <h5 class="card-title">Chef 1</h5>
                        <p class="card-text">Especialista en sabores tradicionales.</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="imagenes/colaboradores/1.png" class="card-img-top" alt="chef1" />
                    <div class="card-body">
                        <h5 class="card-title">Chef 1</h5>
                        <p class="card-text">Especialista en sabores tradicionales.</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonios" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Testimonios</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">¡La mejor comida casera que he probado!</p>
                        </div>
                        <div class="card-footer text-muted">Oscar U.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">Ambiente agradable y excelente atención.</p>
                        </div>
                        <div class="card-footer text-muted">María P.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>