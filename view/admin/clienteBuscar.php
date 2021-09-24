<?php include 'view/includes/templates/header.php' ?>
    <main class="main mainCrud">
        <section class="barraCrud">
            <nav class="tabs">
                 <a href="?v=clientebuscar" class="actual">
                    <img src="view/build/img/search.webp" alt="">
                </a>
                <a href="?v=cliente">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=clientecrear">
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