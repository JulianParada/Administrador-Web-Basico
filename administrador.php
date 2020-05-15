<!DOCTYPE html>
<!--
Antes de mostar esta página se debió ejecutar lo siguiente 
1. createTable.php
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Personas </title>
    </head>
    <body>
    <div>
        <br>
        <form action='administrarPersonas.php' method='post'>
	        <table>
                Cedula: <input type="text" name="Cedula"><br>
                Nombre: <input type="text" name="Nombre"><br>
                Apellido: <input type="text" name="Apellido"><br>
                Correo Electronico: <input type="text" name="CorreoElectronico"><br>
                Edad: <input type="number" name="Edad"><br>
	        </table>
	    <input type="submit" value='Guardar' name='guardar'>
        </form>
        <br>
    </div>

    <div>
        <br>
        Eliminar una persona
        <form action='administrarPersonas.php' method='post'>
	        <table>
                Cedula de la persona: <input type="text" name="Cedula"><br>
	        </table>
	    <input type="submit" value='Borrar' name='borrar'>
        </form>
        <br>
    </div>

    <div>
        <br>
        Elija como quiere ver la lista de personas
        <br>
        <form action='administrarPersonas.php' method='post'>
            Ordanos por:
            <input name="Cedula" type="checkbox" />Cedula
            <input name="Nombre" type="checkbox" />Nombre
        <br>
            De forma:
            <input name="Ascendente" type="checkbox" />Ascendente
            <input name="Descendente" type="checkbox" />Descendente
        <br>
	    <input type="submit" value='Ver Personas' name='ver'>
        </form>
        <br>
    </div>
    
    <br>
    <a href="index.php">Regresar</a>

    </body>
</html>