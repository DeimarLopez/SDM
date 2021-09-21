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
                <a href="/SEVEN_INICIO/Administrador.php?c=Usuario">Usuarios</a>
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
                <button type="button">
                    <img data-paso="1" src="view/build/img/search.webp" alt="">
                </button>
                <button type="button" id="btntable">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </button>
                <button type="button">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </button>
            </nav>
        </section>
        <section class="content">
            <div id="paso-1" class="seccion">
                <form method="POST" id="formulario">
                    <input type="text" name="dato" id="dato">
                    <input type="submit" name="buscar" value="buscar" id="buscar">
                </form>
            </div>
            <div id="paso-2" class="seccion">
                <div class="tabla">
                    <table>
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Sexo</th>
                                <th>Nacimineto</th>
                                <th>Ingreso</th>
                                <th>Dirección</th>
                                <th>Ciudad</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="paso-3" class="seccion">
                <form action="" method="POST" id="insertarUsuGeneri">
                    <h3>Insertar Cliente</h3>
                    <div class="campos__form ">
                        <input type="text" placeholder="Cedula" name="Cedula" id="Cedula" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Nombre" name="Nombre" id="Nombre" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Apellido" name="Apellido" id="Apellido" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Correo" name="Correo" id="Correo" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="°Celular" name="Celular" id="Celular" value="">
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
                        <input type="text" placeholder="Dirección" name="Dirección" id="Dirección" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Ciudad" name="Ciudad" id="Ciudad" value="">
                    </div>
                    <input class="btn" id="botons" type="submit" value="registrar" name="registrar" value="">
                </form>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <!-- <script src="src/js/app.js"></script> -->
    <?php include 'includes/templates/footer.php' ?>