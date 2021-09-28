<?php include 'view/includes/templates/header.php' ?>
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
                <form action="" method="POST" id="insertarUsu">
                    <h3>Actualizar Usuario</h3>
                    <div class="campos__form ">
                        <input type="hidden" placeholder="Documento" name="doc" id="doc" value="<?php echo $datos[0][0] ?>" required>
                        <input type="text" value="<?php echo $datos[0][0] ?>" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Usuario" name="nomusu" id="nomusu" value="<?php echo $datos[0][1] ?>" required>
                    </div>
                    <div class="campos__form ">
                        <input type="password" placeholder="Clave" name="clave" id="clave" value="<?php echo $datos[0][2] ?>" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Rol" name="rol" id="rol" value="<?php echo $datos[0][3] ?>" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Estado" name="estado" id="estado" value="<?php echo $datos[0][4] ?>">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Imagen" name="imagen" id="imagen" value="<?php echo $datos[0][5] ?>">
                    </div>
                    
                    <input class="btn" id="botons" type="submit" value="Actualizar" name="actualizarUsu">
                    
                </form>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>