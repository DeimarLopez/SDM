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
                <a href="?v=usuario" class="actual">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=usuariocrear">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </a>
            </nav>
        </section>
        <section class="content">
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
                            <?php
                            if(isset($_POST['buscar'])){
                                foreach($datos as $dato){
                                    ?>
                                        <tr>
                                            <td><?php echo $dato[0]?></td>
                                            <td><?php echo $dato[1]?></td>
                                            <td><?php echo $dato[2]?></td>
                                            <td><?php echo $dato[3]?></td>
                                            <td><?php echo $dato[4]?></td>
                                            <td><?php echo $dato[5]?></td>
                                            <td><?php echo $dato[6]?></td>
                                            <td><?php echo $dato[7]?></td>
                                            <td><?php echo $dato[8]?></td>
                                            <td><?php echo $dato[9]?></td>
                                            <td><form action=""><input type="hidden" value="<?php echo $dato[0]?>"><input type="submit" value="Actualizar"></form></td>
                                            <td><form action=""><input type="hidden" value="<?php echo $dato[0]?>"><input type="submit" value="Eliminar"></form></td>
                                        </tr>
                                    <?php
                                }
                            }else{
                                foreach($datos as $dato){?>
                                        <tr>
                                            <td><?php echo $dato[0]?></td>
                                            <td><?php echo $dato[1]?></td>
                                            <td><?php echo $dato[2]?></td>
                                            <td><?php echo $dato[3]?></td>
                                            <td><?php echo $dato[4]?></td>
                                            <td><?php echo $dato[5]?></td>
                                            <td><?php echo $dato[6]?></td>
                                            <td><?php echo $dato[7]?></td>
                                            <td><?php echo $dato[8]?></td>
                                            <td><?php echo $dato[9]?></td>
                                            <td><form method="POST" action="?v=usuarioactualizar"><input type="hidden" value="<?php echo $dato[0]?>" name="id"><input type="submit" name="actualizar" value="actualizar"></form></td>
                                            <td><form method="POST" action=""><input type="hidden" value="<?php echo $dato[0]?>" name="id"><input type="submit" name="eliminar" value="eliminar"></form></td>
                                        </tr>
                                <?php 
                                }
                            }   
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>