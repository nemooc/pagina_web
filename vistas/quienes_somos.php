<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <title>Quienes Somos</title>
</head>

<body>
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
                        <a class="nav-link color_letra" href="./productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="quienes_somos.php">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="contacto.php">Contacto</a>
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
                        <a class="dropdown-item" href="./mis_pedidos.php">Mis pedidos</a>
                        <a class="dropdown-item" href="#" onclick="cerrar_sesion()">Cerrar Sesion</a>

                    </div>
                </div>
                <div class="ml-3">
                    <a href="../vistas/carrito_de_compra.php"><i class="fa-solid fa-cart-shopping"></i></a><span
                        class="ml-2" style="font-size: 20px; font-weight: bold;" id="cantidadCarrito"></span>
                </div>

                <?php }else{ ?>

                <!-- Cuando no estoy logueado -->
                <a href="../vistas/login.php" style="margin-right: 20px;"><i class="far fa-user"></i></a>
                <a href="../vistas/registrarse.php" style="margin-right: 20px; text-decoration:none;"
                    class="">REGISTRARSE</a>

                <?php }?>
            </div>
        </div>
    </header>

    <div class="fila home_row">
        <div id="content" class="col-sm-12">
            <div id="crecimiento">


                <section class="sectionTituloPagina">
                    <h1 class="animate__animated  animate__fadeInDown">Quienes Somos</h1>
                </section>


                <section class="quienesSomos container-md">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h3 class="empresa">La Empresa</h3>
                            <p>Somos una empresa de la ciudad de Posadas, y desde 2020, comercializamos y
                                distribuimos equipamiento para gastronomía en todo el territorio misionero.

                                Atentos a las tendencias del mercado gastronómico y a la creatividad e innovación de
                                nuestros cocineros, tenemos diseños y mejoras permanentemente en cada producto, logrando
                                la mejor relación costo-beneficio en los equipos que ofrecemos.

                                Somos una empresa en crecimiento. Ofrecemos a nuestros clientes el mejor precio, calidad
                                y asesoramiento en los
                                más diversos productos. Comercializamos las principales marcas de renombre nacional y
                                nos concentramos en los productos de mayor rotación para que tu negocio o reventa tenga
                                un éxito asegurado. Actualmente disponemos de una sucursal en la ciudad de Posadas,
                                Misiones.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="imagen">

                            </div>
                        </div>
                    </div>
                </section>








                <footer>
                    <div class="container">
                        <div class="contenedor-links">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active color_letra" href="../">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link color_letra" href="./productos.php">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link color_letra" href="quienes_somos.php">Quienes somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link color_letra" href="contacto.php">Contacto</a>
                                </li>
                            </ul>
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
    <script src="../js/quienes_somos.js"></script>
    <script src="../js/sesion.js"></script>

</body>

</html>