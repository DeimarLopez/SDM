<?php include 'view/includes/templates/header.php' ?>
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
                                <th>Usuario</th>
                                <th>Clave</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Imagen</th>
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
                                      
                                            <td><form method="POST" action="?v=usuarioactualizar"><input type="hidden" value="<?php echo $dato[0]?>" name="id"><input type="submit" name="actualizarUSU" value="actualizar"></form></td>
                                            <td><form method="POST" action=""><input type="hidden" value="<?php echo $dato[0]?>" name="id"><input type="submit" name="eliminarUSU" value="eliminar"></form></td>
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