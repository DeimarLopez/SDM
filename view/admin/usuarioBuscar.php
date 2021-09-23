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
    <main class="main mainCrud">
        <section class="barraCrud">
            <nav class="tabs">
                 <a href="?v=usuariobuscar" class="actual">
                    <img src="view/build/img/search.webp" alt="">
                </a>
                <a href="?v=usuario">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=usuariocrear">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </a>
            </nav>
        </section>
        <section class="content">
            <div id="paso-1" class="seccion">
                <form method="POST" id="formulario">
                    <input type="text" name="dato" id="dato" required>
                    <input type="submit" name="buscar" value="buscar" id="buscar">
                </form>
            </div>
            <?php
                if(isset($_POST['buscar'])){
            ?>
                <p><?php echo $errores ?></p>
            <?php
                }
            ?>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>