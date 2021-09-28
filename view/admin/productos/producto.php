<?php include 'view/includes/templates/header.php' ?>
    <main class="main mainCrud">
        <section class="barraCrud">
            <nav class="tabs">
                <a href="?v=productobuscar">
                    <img src="view/build/img/search.webp" alt="">
                </a>
                <a href="?v=producto" class="actual">
                    <img  data-paso="2" src="view/build/img/table.webp" alt="">
                </a>
                <a href="?v=productocrear">
                    <img data-paso="3" src="view/build/img/pencil.webp" alt="">
                </a>
            </nav>
        </section>
        <section class="content">
            <section class="galeriapro">
                <?php foreach($datos as $dato){?>
                    <article class="item">
                        <img src="<?php echo $dato[2] ?>" alt="">
                        <h1><?php echo $dato[3] ?></h1>
                        <p><?php echo $dato[4] ?></p>
                        <form action="" class="btn1">
                            <input type="hidden" value="<?php echo $dato[0] ?>">
                            <input type="submit" value="Actualizar">
                        </form>
                        <form action="" class="btn2">
                            <input type="hidden" value="<?php echo $dato[0] ?>">
                            <input type="submit" value="Eliminar">
                        </form>
                    </article>
                    <?php } ?>
            </section>
        </section>
    </main>
    <script src="view/build/js/bundle.min.js"></script>
    <?php include 'view/includes/templates/footer.php' ?>