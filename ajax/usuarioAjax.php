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


    }