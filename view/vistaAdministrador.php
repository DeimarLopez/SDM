<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
        
            <table>
                <tr>
                    <td><input style="width: 100px" type="submit" name="consultaTodos" value="CONSULTAR"></td>
                    <td><input style="width: 75px" type="submit" name="consultaUno" value="FILTRAR"></td>
                    <td><input style="width: 80px" type="submit" name="insert" value="INSERTAR"></td>
                </tr>
            </table><br><br>
        <?php
        if(isset($_POST['consultaUno'])){?>
            <form action="" method="POST">
                <input type="text" name="Criterio" required>
                <input type="submit" name="uno" value="CONSULTAR UNO">
                <input type="submit" name="todos" value="CONSULTAR TD">
                <input type="submit" name="nuevo" value="NUEVO">
            </form>           
        <?php
        }
        ?>
        <?php		
        if((isset($_POST['consultaTodos']) || isset($_POST['uno'])) && $datos){
        ?>  
            <center><table>            
            <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Sexo</th>
                    <th>FeNaci</th>
                    <th>FeIngre</th>
                    <th>Direccion</th>
                    <th>Ciudad</th>
                    <th>Foto</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>               
                <?php
                foreach($datos as $f){?>
                    <tr>
                        <td><?php echo $f[0];?></td>
                        <td><?php echo $f[1];?></td>   
                        <td><?php echo $f[2];?></td>  
                        <td><?php echo $f[3];?></td>  
                        <td><?php echo $f[4];?></td>  
                        <td><?php echo $f[5];?></td>  
                        <td><?php echo $f[6];?></td>
                        <td><?php echo $f[7];?></td>         
                        <td><?php echo $f[8];?></td>  
                        <td><?php echo $f[9];?></td>  
                        <td><img src="img/<?php echo $f[10];?>" width="50" height="50"></td>
                        <td><form action="" method="POST">
                        <input type="hidden" value="<?php echo $f[0];?>" name="cod"/>
                        <input type="submit" name="actualizar" value="ACTUALIZAR"/>
                        </form></td>
                        <td><form action="" method="POST">
                        <input type="hidden" value="<?php echo $f[0];?>" name="cod"/>
                        <input type="submit" name="eliminar" value="ELIMINAR"/>
                        </form></td>
                    </tr>
            <?php
            }
            }
            ?> 
            <?php
            if(isset($_POST['insert'])){?> 
            <form action="" method="POST">
                <table>
                <tr>
                    <td><label><li><B>Documento:</B></li></label></td>
                    <td><input type="number" name="doc" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Nombre:</B></li></label></td>
                    <td><input type="text" name="nom" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Apellido:</B></li></label></td>
                    <td><input type="text" name="ape" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Correo:</B></li></label></td>
                    <td><input type="text" name="cor" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Celular:</B></li></label></td>
                    <td><input type="number" name="cel" require></td>
                    </tr>
                    <tr>
                        <td><li><B>Sexo:</B></li>
                        <td><select name="sexo">
                            <option value ="Masculino">Masculino</option>
                            <option value ="Femenino">Femenino</option>
                        </select></td><br>   
                    </tr>
                    <tr>
                    <td><label><li><B>Fecha nacimiento:</B></li></label></td>
                    <td><input type="date" name="fenaci" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Fecha Ingreso:</B></li></label></td>
                    <td><input type="date" name="fein" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Direccion:</B></li></label></td>
                    <td><input type="text" name="dir" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Ciudad:</B></li></label></td>
                    <td><input type="text" name="ciu" require></td>
                    </tr>
                    <tr>
                    <td><label><li><B>Foto:</B></li></label></td>
                    <td><input type="file" name="foto" require></td>
                    </tr>
                </table><br><br>
                <td><input type="submit" name="Insertar" value="ENVIAR" require></td>
            </form>
        <?php
        }
        ?>
    <?php if(isset($_POST['actualizar'])){
    foreach($datos as $f){?>
    <form action="" method="POST">
        <table>
        <tr>
                <td><label><li><B>Documento:<?php echo $f[0];?></B></li></label></td>
                <td><input type="hidden" name="doc" value="<?php echo $f[0];?>"/></td>
                </tr>
                <tr>
                <td><label><li><B>Nombre:</B></li></label></td>
                <td><input type="text" name="ape" value="<?php echo $f[1];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Apellido:</B></li></label></td>
                <td><input type="text" name="ape" value="<?php echo $f[2];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Correo:</B></li></label></td>
                <td><input type="text" name="cor" value="<?php echo $f[3];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Celular:</B></li></label></td>
                <td><input type="number" name="cel" value="<?php echo $f[4];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Sexo:</B></li></label></td>
                <td><select name="opciones">
                <option value="<?php echo $f[5];?>"><?php echo $f[5];?></option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select></td></tr><br>
                <tr>
                <td><label><li><B>Fecha nacimiento:</B></li></label></td>
                <td><input type="date" name="fenaci" value="<?php echo $f[6];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Fecha Ingreso:</B></li></label></td>
                <td><input type="date" name="fein" value="<?php echo $f[7];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Direccion:</B></li></label></td>
                <td><input type="text" name="dir" value="<?php echo $f[8];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Ciudad:</B></li></label></td>
                <td><input type="text" name="ciu" value="<?php echo $f[9];?>"></td>
                </tr>
                <tr>
                <td><label><li><B>Foto:</B></li></label></td>
                <td><input type="file" name="foto" value="<?php echo $f[10];?>"></td>
                </tr>
        </table><br><br>
        <td><input type="submit" value="ACTUALIZAR" name="actualizar"></td>
        <?php
        }
        ?>
    </form>
    <?php
    }
    ?>
    </tbody>            
    </table></center> 
    </div>
</body>
</html>