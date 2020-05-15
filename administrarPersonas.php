<?php

include_once dirname(__FILE__) . '../../config.php';

$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
if (mysqli_connect_errno()) {
    echo "Error en la conexión: " . mysqli_connect_error();
}

if (isset($_POST['guardar'])) {
    $nuevaPersona = array (
        "Cedula" => $_POST['Cedula'],
        "Nombre" => $_POST['Nombre'],
        "Apellido" => $_POST['Apellido'],
        "CorreoElectronico" => $_POST['CorreoElectronico'],
        "Edad" => $_POST['Edad']
    );

    $sql = "INSERT INTO Personas (Cedula, Nombre, Apellido, CorreoElectronico, Edad) VALUES (\"$nuevaPersona[Cedula]\",
                                    \"$nuevaPersona[Nombre]\", \"$nuevaPersona[Apellido]\",
                                    \"$nuevaPersona[CorreoElectronico]\", $nuevaPersona[Edad])";
    if(mysqli_query($con, $sql)){
        echo "CREADO";
    }
    else{
        if(mysqli_error($con) == "Duplicate entry '$nuevaPersona[Cedula]' for key 'PRIMARY'"){
            $sql = "UPDATE Personas SET 
                    Cedula = \"$nuevaPersona[Cedula]\", 
                    Nombre = \"$nuevaPersona[Nombre]\", 
                    Apellido = \"$nuevaPersona[Apellido]\", 
                    CorreoElectronico = \"$nuevaPersona[CorreoElectronico]\", 
                    Edad = $nuevaPersona[Edad]
                    WHERE Cedula = \"$nuevaPersona[Cedula]\"";
            if(mysqli_query($con, $sql)){
                echo "ACTUALIZADO";
            }
        }
    }
    echo "<br>";
    echo "<a href=\"administrador.php\">Regresar</a>";
}

else if(isset($_POST['borrar'])) {
    
    $cedula = $_POST['Cedula'];

    $sql = "DELETE FROM Personas WHERE Cedula = \"$cedula\"";
    if(mysqli_query($con, $sql)){
        echo "BORRADO";
    }
    else{
        echo "Error";
    }

    echo "<br>";
    echo "<a href=\"administrador.php\">Regresar</a>";
}

else if(isset($_POST['ver'])) {

    //var_dump($_POST);

    $parametros = array();

    foreach ($_POST as $key => $value) {
        
        array_push($parametros, $key);
    }

    //echo $parametros[0];

    if( $parametros[0] == 'Nombre'){
        if( $parametros[1] == 'Ascendente'){
            $sql = "SELECT * FROM Personas ORDER BY Nombre ASC";
            $resultado = mysqli_query($con,$sql);
        } else if($parametros[1] == 'Descendente'){
            $sql = "SELECT * FROM Personas ORDER BY Nombre DESC";
            $resultado = mysqli_query($con,$sql);
        }else{
            $sql = "SELECT * FROM Personas ";
            $resultado = mysqli_query($con,$sql);
        }
    } else if($parametros[0] == 'Cedula'){
        if( $parametros[1] == 'Ascendente'){
            $sql = "SELECT * FROM Personas ORDER BY Cedula ASC";
            $resultado = mysqli_query($con,$sql);
        } else if($parametros[1] == 'Descendente'){
            $sql = "SELECT * FROM Personas ORDER BY Cedula DESC";
            $resultado = mysqli_query($con,$sql);
        }else{
            $sql = "SELECT * FROM Personas ";
            $resultado = mysqli_query($con,$sql);
        }
    }else{
        $sql = "SELECT * FROM Personas ";
        $resultado = mysqli_query($con,$sql);
    }

    $str_datos="";
    $str_datos.='Lista de Personas';
    $str_datos.='<br>';
    $str_datos.='<br>';
    $str_datos.='<table border=1>';
    $str_datos.='<tr>';
	$str_datos.='<th>Cedula</th>';
	$str_datos.='<th>Nombre</th>';
	$str_datos.='<th>Apellido</th>';
	$str_datos.='<th>Correo Electronico</th>';
	$str_datos.='<th>Edad</th>';
    $str_datos.='</tr>';
    
    foreach ($resultado as $persona) {
		$str_datos.='<tr>';
            $str_datos.='<td>'. $persona['Cedula'] . '</td>';
            $str_datos.='<td>'. $persona['Nombre'] . '</td>';
            $str_datos.='<td>'. $persona['Apellido'] . '</td>';
            $str_datos.='<td>'. $persona['CorreoElectronico'] . '</td>';
            $str_datos.='<td>'. $persona['Edad'] . '</td>';
        $str_datos.='</tr>';
    }
	$str_datos.='</table>';
    $str_datos.='<br>';
    echo $str_datos;
    
    echo "<br>";
    echo "<a href=\"administrador.php\">Regresar</a>";
}

?>