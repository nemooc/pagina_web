<?php
//para evitar errores de inclusion de archivo
require_once("env.php");

// creamos la conexion
$conexion=new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//hago la conexion a la bd seteamos la codificacion de caracteres
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Si tenemos un error en la conexion
if (mysqli_connect_errno()) {
    printf("Fallo conexion a la BD: %s \n", mysqli_connect_error());
    exit();
}

// Verificammos que si la funcion ya existe no la vuelva a declarar
// En casos de que importemos 2 clases diferentes, va evitar volver a declarar las funciones
// Ya que en cada clase requerimos al archivo connection y nos daria un error que ya existe la funcion declarada
if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql)
    {
        global $conexion;
        $query=$conexion->query($sql);
        return $query;
    }

    function ejecutarConsultaSimpleFila($sql)
    {
        global $conexion;
        $query=$conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function ejecutarConsulta_retornarID($sql)
    {
        global $conexion;
        $query=$conexion->query($sql);
        return $conexion->insert_id;
    }

    function limpiarCadena($str)
    {
        global $conexion;
        $str=mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }
}