<!DOCTYPE html>
<html lang="en">

<?php include 'view/includes/templates/header.php' ?>
    <main class="main mainCrud">
        <section class="barraCrud">
            <nav class="tabs">
                <a href="?v=productobuscar">
                    <img src="view/build/img/search.webp" alt="">
                </a>
                <a href="?v=producto">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=productocrear" class="actual">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </a>
            </nav>
        </section>
        <section class="content">
            <div id="paso-3" class="seccion">
                <form action="" method="POST" id="insertarUsuGeneri" enctype="multipart/form-data">
                    <h3>Insertar Producto</h3>
                    <div class="campos__form ">
                        <input type="text" placeholder="Nombre Producto" name="nombre" id="nombre" value="" required>
                    </div>
                    <div class="campos__form ">
                        <textarea name="description" id="" cols="35" rows="5" placeholder="Descripcion del producto.."></textarea>
                    </div>
                    <div class="campos__form ">
                        <select name="tamaño" id="">
                            <option value="1" selected disabled>Tañamo</option>
                            <option value="1">Estandar</option>
                            <option value="2">Pequeño</option>
                            <option value="3">Mediano</option>
                            <option value="4">Grande</option>
                            <option value="5">Redes</option>
                            <option value="6">No Aplica</option>
                        </select>
                    </div>
                    <div class="campos__form ">
                        <label for="imagen" for="imagen" id="labelfile">Caraga Img</label>
                        <input type="file" placeholder="imagen" name="imagen" id="imagen" value="" required>
                    </div>
                    <input class="btn" id="botons" type="submit" value="registrar" name="registrar" value="">
                </form>
            </div>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>