<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ejército de Wadiya</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .banner {
            background-image: url('https://i.imgur.com/ai62Tsy.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .banner::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro semitransparente */
            z-index: 1;
        }
        .banner h1 {
            color: #ffffff;
            position: relative;
            z-index: 2; /* Asegura que el texto esté encima del fondo oscuro */
        }
        .admiral-image {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
        }
        footer {
            background-color: #343a40;
        }
    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ejército de Wadiya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Intranet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="banner">
        <h1 class="display-4">Ejército de Wadiya</h1>
    </header>

    <div class="container mt-5">
        <h2>Sobre nosotros</h2>
        <p>
            El Ejército de Wadiya es una fuerza militar dedicada a la defensa y soberanía de nuestro territorio. Fundado en un espíritu de unidad y valentía, nuestro ejército está comprometido a proteger los intereses y la libertad de nuestros ciudadanos.
        </p>

        <h2>Misión</h2>
        <p>
            Nuestra misión es garantizar la seguridad y estabilidad en Wadiya, manteniendo la paz y la justicia. Trabajamos incansablemente para enfrentar cualquier amenaza y defender nuestros valores.
        </p>

        <h2>Valores</h2>
        <ul>
            <li>Honor</li>
            <li>Valor</li>
            <li>Lealtad</li>
            <li>Respeto</li>
        </ul>

        <h2>Conoce a nuestro líder</h2>
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://i.imgur.com/VdhT0Ay.jpeg" alt="Almirante General Aladeen" class="admiral-image">
                <h5 class="card-title mt-3">Almirante General Aladeen</h5>
                <p class="card-text">El Almirante General Aladeen es el líder del Ejército de Wadiya, conocido por su liderazgo firme y compromiso inquebrantable con la nación.</p>
            </div>
        </div>

        <h2>Contacto</h2>
        <p>
            Para más información, contáctanos a través de nuestras redes sociales o envíanos un correo electrónico a <a href="mailto:info@ejercitowadiya.com">info@ejercitowadiya.com</a>.
        </p>
    </div>

    <footer class="text-center mt-5 py-4 text-light">
        <p>&copy; 2024 Ejército de Wadiya. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
