<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón de Belleza</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
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
    <section class="banner"id="banner">
        <h1>Seven For Ever</h1>
        <h2>Diseño y Publicidad</h2>
        <div class="lema">
            <h3>Ama lo que haces</h3>
            <h3>Haz lo que amas</h3>
        </div>
    </section>
    <section class="conocenos" id="conocenos">
        <div class="div_nosotros">
             <div class="nosotros">
            <div class="logo">
                <img src="view/build/img/logo-01.webp" alt="logo de seven for ever">
            </div>
            <div class="presentacion">
                <h3>Quienes Somos?</h3>
                <p>Seven For Ever es una empresa empresa publicitaria dedicada a la creacion de elementos publicitarios analogos y digitales buscando crecer de la mano con nuestros clientes</p>
                <p>
                    Con mas de 7 años en el mercado Colombiano y los mejores diseñadores 
                </p>
            </div>
        </div>
        </div> 
    </section>
    <section class="galeria" id="galeria">
        <div class="container_galeria">
            <img src="view/build/img/m2.webp" alt="">
            <img src="view/build/img/m3.webp" alt="">
            <img src="view/build/img/m4.webp" alt="">
            <img src="view/build/img/m5.webp" alt="">
            <img src="view/build/img/m6.webp" alt="">
            <img src="view/build/img/m7.webp" alt="">
            <img src="view/build/img/m8.webp" alt="">
            <img src="view/build/img/m9.webp" alt="">
        </div>
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
    <div class="overlay" id="overlay">
            <p class="cerrar">X</p>
                <form action="">
                <div class="campos__form ">
                    <input type="text" placeholder="Cedula">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="Nombre">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="Apellido">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="Correo">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="°Celular">
                </div>
                <div class="campos__form two">
                    <div class="col">
                        <label for="">Genero</label>
                        <select name="" id="">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for=""> Fecha de nacimiento</label>
                        <input type="date">
                    </div>
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="Dirección">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="ciudad">
                </div>
                <div class="campos__form ">
                    <input type="text" placeholder="Usuario">
                </div>
                <div class="campos__form">
                    <input type="text" placeholder="Password">
                </div>
                <input class="btn" type="submit" value="Registrar" name="Regitrar">
            </form>
    </div>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'includes/templates/footer.php' ?>
