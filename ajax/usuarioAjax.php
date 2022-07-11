<?php
session_start();
require '../models/usuarioModels.php';



switch ($_GET['op']) {
    case 'iniciarSesion':
        $usuario=isset($_POST['usuario']) ? limpiarCadena($_POST['usuario']) : "";
        $clave=isset($_POST['clave']) ? limpiarCadena($_POST['clave']) : "";
        $respuesta = Usuario::iniciar_sesion($usuario,$clave);
        if (isset($respuesta)) {
            $_SESSION['id_usuario_web'] = $respuesta['id_usuario_web'];
            $_SESSION['usuario'] =  $respuesta['usuario'];
            $_SESSION['dni_clientes'] =  $respuesta['dni_clientes'];
        }
        echo json_encode($respuesta);
        break;

    case 'cerrarSesion':
        session_unset();
        session_destroy();
        break;

    case 'enviarDatos':
        // Arrays
        $dni = isset($_POST['dni']) ? limpiarCadena($_POST['dni']) : "";
        $nombre = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : "";
        $domicilio= isset($_POST['domicilio']) ? limpiarCadena($_POST['domicilio']) : "";
        $email = isset($_POST['email']) ? limpiarCadena($_POST['email']) : "";
        $localidad = isset($_POST['localidad']) ? limpiarCadena($_POST['localidad']) : "";
        $provincia = isset($_POST['provincia']) ? limpiarCadena($_POST['provincia']) : "";
        $telefono =  isset($_POST['telefono']) ? limpiarCadena($_POST['telefono']) : "";
        $usuario = isset($_POST['usuario']) ? limpiarCadena($_POST['usuario']) : "";
        $clave = isset($_POST['clave']) ? limpiarCadena($_POST['clave']) : "";


        $respuesta = Usuario::enviarDatos($dni,$nombre,$domicilio,$email,$localidad,$provincia,$telefono,$usuario,$clave);
        
        echo json_encode([
            'message' => $respuesta ? "¡Te has registrado con Exito!" : "¡Ocurrio un problema, no se pudo Registrar!",
            'status' => $respuesta ? true : false
        ]);
    break;

    }