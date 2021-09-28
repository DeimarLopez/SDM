<!DOCTYPE html>
<html lang="en">

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
                    <h3>Insertar Usuario</h3>
                    <div class="campos__form ">
                        <input type="text" placeholder="Documento" name="doc" id="doc" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Usuario" name="nomusu" id="nomusu" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="password" placeholder="Clave" name="clave" id="clave" value="" required>
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Rol" name="rol" id="rol" value="">
                    </div>
                    <div class="campos__form ">
                        <input type="text" placeholder="Estado" name="estado" id="estado" value="">
                    </div>
                    <div class="campos__form ">
                        <label for="imagen" for="imagen" id="labelfile">Imagen</label>
                        <input type="file" placeholder="Imagen" name="imagen" id="imagen" value="">
                    </div>
                    <input class="btn" id="botons" type="submit" value="registrar" name="registrarUsu" value="">
                </form>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>