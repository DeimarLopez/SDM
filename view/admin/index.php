<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7xEver</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view/build/css/app.css">
</head>

<body class="body">
    <div class="contenedor__Header">
        <header class="header">
            <div class="logo">
            </div>
            <nav class="nav">
                <a href="Administrador.php">Inicio</a>
                <a href="?v=usuario">Usuarios</a>
                <a href="#galeria">Clientes</a>
                <a href="#login">Productos</a>
                <form method="POST" action="index.php">
                    <input type="submit" name="Cerrar" value="Cerrar Sesion" class="btn--cerrar">
                </form>
            </nav>
        </header>
    </div>
    <main class="main">
        <section class="saludo">
            <h1><?php echo $saludo ?></h1>
            <h2>Trabajando Por Un Mejor Seven For Ever</h2>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>
