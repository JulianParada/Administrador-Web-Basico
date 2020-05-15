<!DOCTYPE html>
<html>
    <head>
        <title>Subir Archivo</title>
        <meta charset="UTF-8">
        <style type="text/css">
        body,html{
        height:100%; /*Siempre es necesario cuando trabajamos con alturas*/
        }
        #inferior{
        color: #FFF;
        background: #000;
        position:absolute; /*El div será ubicado con relación a la pantalla*/
        left:0px; /*A la derecha deje un espacio de 0px*/
        right:0px; /*A la izquierda deje un espacio de 0px*/
        bottom:0px; /*Abajo deje un espacio de 0px*/
        height:50px; /*alto del div*/
        z-index:0;
        }
</style>
    </head>
<body>
    <form action="subirArchivo.php" method="post"
    enctype="multipart/form-data">
        <label for="arch">Nombre:</label>
        <input type="file" name="arch" id="arch"><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
    <?php $date = date('m/d/Y g:ia');?>
    <div id="inferior"><?php echo $date ?></div>

   <br>
   <a href="index.php">Regresar</a>
   <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

   <?php
        crear_imagen();
        echo "<img src=imagen.png?".date("U").">";

        function  crear_imagen(){

                srand(mktime());

                $t1 = rand(150,300);
                $t2 = rand(150,300);
                $im = imagecreate($t1, $t2) or die("Error en la creacion de imagenes");

                
                $c1 = rand(0,255);
                $c2 = rand(0,255);

                $color_fondo = imagecolorallocate($im, $c1, $c2, 0);   // amarillo

                $c3 = rand(0,255);
                $c4 = rand(0,255);

                $rojo = imagecolorallocate($im, $c3, 0, 0);                  // rojo
                $azul = imagecolorallocate($im, 0, 0, $c4);                 // azul
                imagerectangle ($im,   5,  10, 195, 50, $rojo); //rectangulo (borde)
                imagefilledrectangle ($im,   5,  100, 195, 140, $azul); //rectangulo (lleno)

                imagepng($im,"imagen.png");
                imagedestroy($im);
        }
        ?>
    <br>
    <br>

</body>
</html>