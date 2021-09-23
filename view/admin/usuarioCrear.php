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
                 <a href="?v=usuariobuscar">
                    <img src="view/build/img/search.webp" alt="">
                </a>
                <a href="?v=usuario">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=usuariocrear" class="actual">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </a>
            </nav>
        </section>
        <section class="content">
            <div id="paso-3" class="seccion">
                <form action="" method="POST" id="insertarUsuGeneri">
                    <h3>Insertar Usuario</h3>
                    <div class="campos__form ">
                        <input type="text" placeholder="Cedula" name="cedula" id="Cedula" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Nombre" name="nombre" id="Nombre" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Apellido" name="apellido" id="apellido" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Correo" name="correo" id="correo" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="°Celular" name="celular" id="celular" value="" required>
                    </div>
                    <div class="campos__form two">
                        <div class="col">
                            <label for="">Genero</label>
                            <select name="genero" id="">
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for=""> Fecha de nacimiento</label>
                            <input type="date" name="fecha" id="fecha" value="">
                        </div>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Dirección" name="dirección" id="Dirección" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Ciudad" name="ciudad" id="Ciudad" value="">
                    </div>
                    <input class="btn" id="botons" type="submit" value="registrar" name="registrar" value="">
                </form>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>