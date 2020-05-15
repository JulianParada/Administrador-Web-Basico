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
</body>
</html>