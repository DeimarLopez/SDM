<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7xEver</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="icon" href="view/build/img/logo.ico">
    <link rel="stylesheet" href="view/build/css/fontello.css">
    <link rel="stylesheet" href="view/build/css/app.css">
</head>

<body class="body">
    <div class="contenedor__Header">
        <header class="header">
            <div class="logo">
            </div>
            <nav class="nav">
                <a href="#banner">Inicio</a>
                <a href="#conocenos">Conocenos</a>
                <a href="#galeria">galeria</a>
                <a href="#login">Ingreso</a>
            </nav>
        </header>
    </div>
    <section class="banner" id="banner">
        <h1>Seven For Ever</h1>
        <h2>Diseño y Publicidad</h2>
        <div class="lema">
            <h3>Ama lo que haces</h3>
            <h3>Haz lo que amas</h3>
        </div>
    </section>
    <section class="destino">
        <h4>Elige tu <span>Diseño</span></h4>
        <p>Lorem, ipsum dolores magnam optio nisi ullam illum, libero temporibus a i dolor sit amet consectetur adipisicing elit. Repellendus dolores magnam optio ribus a iure vero consequatur. I epellendus dolores magnam optio ribus a iure vero cons ncidunt aperiam, sunt voluptates except</p>
    </section>
    <section class="pasos">
        <div class="lineatop">

        </div>
        <section class="containerPasos">
            <article class="datos__titulo">
                <h2>Reserva tu Diseño</h2>
                <h3>Y mejora la imagen <span>de tu empresa</span></h3>
            </article>
            <section class="gridpasos">
                <article class="pasosArt">
                    <img src="view/build/img/location.webp" alt="icono de ubicacion">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, magnam.</p>
                </article>
                <article class="pasosArt">
                    <img src="view/build/img/calendar.webp" alt="icono de calendario">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, magnam.</p>
                </article>
                <article class="pasosArt">
                    <img src="view/build/img/translate.webp" alt="icono de viaje">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, magnam.</p>
                </article>
            </section>
        </section>
        <div class="lineabottom">
        </div>
    </section>
    <section class="galeria">
        <article class="bogota galerimg">
            <div class="bogota__img galerimg city">
            </div>
            <h4>|Vi ni lo|</h4>
        </article>
        <article class="cali galerimg">
            <div class="cali__img galerimg city">
            </div>
            <h4>|Ba n ner|</h4>
        </article>
        <article class="cartagena galerimg">
            <div class="cartagena__img galerimg city">
            </div>
            <h4>|Lo gos|</h4>
        </article>
        <article class="medellin galerimg">
            <div class="medellin__img galerimg city">
            </div>
            <h4>|y más|</h4>
        </article>
    </section>
    <section class="contendor_login">
        <div class="login" id="login">
            <form method="POST" action="">
                <h4>Login</h4>
                <div class="campo_login">
                    <input type="text" placeholder="User" name="usu">
                </div>
                <div class="campo_login">
                    <input type="password" placeholder="Password" name="pass">
                </div>
                <input class="btn" type="submit" value="Ingresar" name="ingresar">
                <p id="registrar">Registrar</p>
            </form>
        </div>
    </section>
    <section class="overlay" id="overlay">
        <p class="cerrar">X</p>
        <form action="" method="POST">
            <div class="campos__form ">
                <input type="text" placeholder="Cedula" name="Cedula">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Nombre" name="Nombre">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Apellido" name="Apellido">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Correo" name="Correo">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="°Celular" name="Celular">
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
                    <input type="date" name="fecha">
                </div>
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Dirección" name="Dirección">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Ciudad" name="Ciudad">
            </div>
            <div class="campos__form ">
                <input type="text" placeholder="Usuario" name="Usuario">
            </div>
            <div class="campos__form">
                <input type="text" placeholder="Password" name="Password">
            </div>
            <input class="btn" type="submit" value="registrar" name="registrar">
        </form>
    </section>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'includes/templates/footer.php' ?>