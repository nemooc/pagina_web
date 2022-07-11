<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Mukta:wght@200;300;400&family=Pacifico&family=Teko&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>DC Representaciones</title>
</head>

<body style="background-color:palegoldenrod">



    <header>
        <div class="container-fluid menu_nav">
            <div class="logo">
                <img src="../img/logo.png" alt="" class="img_logo">
            </div>
            <div class="main">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active color_letra" href="../">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="vistas/productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="vistas/quienes_somos.php">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="sesion_y_carrito">

                <?php if (isset($_SESSION['id_usuario_web'])) { ?>
                <!-- Cuando estoy logueado -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['usuario'] ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Mis pedidos</a>
                        <a class="dropdown-item" href="#" onclick="cerrar_sesion()">Cerrar Sesion</a>

                    </div>
                </div>
                <div class="ml-3">
                    <a href="vistas/carrito_de_compra.php"><i class="fa-solid fa-cart-shopping"></i></a><span
                        class="ml-2" style="font-size: 20px; font-weight: bold;" id="cantidadCarrito"></span>
                </div>

                <?php }else{ ?>

                <!-- Cuando no estoy logueado -->
                <a href="../vistas/login.php" style="margin-right: 20px;"><i class="far fa-user"></i></a>

                <?php }?>
            </div>
    </header>

    <!-- Aca va todo contenido index -->
    <div class="container rounded border border-secondary mt-5">
        <h3>Registrarse</h3>
        <div class="">
            <form id="formRegistro">
                <div class="row mt-3 mb-3">
                    <div class="col-12 col-lg-6">
                        <div>
                            <label for="">Usuario</label>
                            <input type="text" class="form-control" name="usuario" required>
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                            <label for="">DNI</label>
                            <input type="number" class="form-control" name="dni" required>
                            <label for="">Provincia</label>
                            <input type="text" class="form-control" name="provincia" required>
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" required>

                        </div>
                    </div>
                    <div class="row col-12 col-lg-6">

                        <label for="">Clave</label>
                        <input type="password" class="form-control" name="clave" required>
                        <!-- <label for="">Apellido</label>
                        <input type="text" class="form-control" name="apellido"> -->
                        <label for="">Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" required>
                        <label for="">Localidad</label>
                        <input type="text" class="form-control" name="localidad" required>
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" name="telefono" required>
                        <div class="col-12 boton_carrito">
                            <button type="submit" class="btn btn-primary">Enviar
                                Datos</button>
                        </div>
                    </div>


                </div>

            </form>
        </div>

    </div>


    <div class="fila home_row">
        <div id="content" class="col-sm-12">
            <div id="crecimiento">
                <footer>
                    <div class="container">
                        <div class="contenedor-links">
                            <a href="/index.php?route=product/category&path=35">Inicio</a>
                            <a href="/index.php?route=information/information&information_id=7">Productos</a>
                            <a href="/index.php?route=information/information&information_id=8">Quienes Somos</a>
                            <a href="/index.php?route=information/consulta">Contacto</a>
                        </div>
                        <div class="contenedor-redes">
                            <div class="ubicacion">
                                <h6>Centro de distribución:</h6>
                                <p>Av. Lavalle 4637 Posadas Misiones</p>
                            </div>
                            <div class="redes">
                                <div class="iconos-redes">
                                    <a href="https://www.facebook.com/DC-Representaciones-107491700929117"
                                        target="_blank">
                                        <i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/dcrepresentaciones/" target="_blank">
                                        <i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-info" id="text-info">
                            <p>Las imágenes y descripciones técnicas del catálogo de productos son de carácter
                                ilustrativas e informativas, no contractuales.</p>
                            <p>Todos los artefactos a gas deben ser instalados y regulada su gasificación por un gasista
                                matriculado, en el lugar de trabajo.</p>
                            <p>La empresa se reserva el derecho de efectuar modificaciones en el diseño de los productos
                                sin previo aviso. ARTEFACTOS PARA USO COMERCIAL SOLAMENTE.</p>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="../js/sesion.js"></script>
    <script src="../js/registrarse.js"></script>
</body>

</html>