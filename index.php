<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
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

<body>
    <!-- MENU DE NAVEGACION -->
    <header>
        <div class="container-fluid menu_nav">
            <div class="logo">
                <img src="img/logo.png" alt="" class="img_logo">
            </div>
            <div class="main">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active color_letra" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="vistas/productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="vistas/quienes_somos.php">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_letra" href="vistas/contacto.php">Contacto</a>
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
                        <a class="dropdown-item" href="./vistas/mis_pedidos.php">Mis pedidos</a>
                        <a class="dropdown-item" href="#" onclick="cerrar_sesion()">Cerrar Sesion</a>

                    </div>
                </div>
                <div class="ml-3">
                    <a href="vistas/carrito_de_compra.php"><i class="fa-solid fa-cart-shopping"></i></a><span
                        class="ml-2" style="font-size: 20px; font-weight: bold;" id="cantidadCarrito"></span>
                </div>

                <?php }else{ ?>

                <!-- Cuando no estoy logueado -->
                <a href="vistas/login.php" style="margin-right: 20px;"><i class="far fa-user"></i></a>
                <a href="vistas/registrarse.php" style="margin-right: 20px; text-decoration:none;"
                    class="">REGISTRARSE</a>

                <?php }?>
            </div>
        </div>
    </header>
    <!-- CARRUSEL -->


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://solreal.com/image/cache/catalog/banners/slide1-2000x750.jpg" class="img_slider"
                    alt="...">

            </div>
            <div class="carousel-item">
                <img src="https://solreal.com/image/cache/catalog/banners/slide2-2000x750.jpg" class="img_slider"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://solreal.com/image/cache/catalog/banners/slide8-2000x750.jpg" class="img_slider"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <!-- MENU DE TARJETAS ESTATICAS -->
    <div class="fila home_row">
        <div id="content" class="col-sm-12">
            <div id="crecimiento">
                <div class="container text-center">
                    <img src="img/icono_fuego.png" alt="llama" class="img-responsive">
                    <h2>DC REPRESENTACIONES TE BRINDA LA MEJOR CALIDAD EN PRODUCTOS</h2>
                    <h2><br></h2>
                    <h2><span style="font-weight: 400"></span></h2>
                    <div class="contenido">
                        <div class="texto texto_modulo1">
                            <h5 style="text-align: center;">trayectoria</h5>
                            <p style="text-align: center;">Desde 1991 fabricamos,</p>
                            <p style="text-align: center;">comercializamos y distribuimos</p>
                            <p style="text-align: center;">equipamiento gastronómico.</p>
                            <p style="text-align: center;">De Rosario para el mundo.</p>
                        </div>
                        <div class="texto texto_modulo1">
                            <h5>innovación</h5>
                            <p>Cada producto es el resultado</p>
                            <p>de combinación entre diseño e innovación,</p>
                            <p>para brindar a los profesionales</p>
                            <p>de la industria gastronómica</p>
                            <p>máxima productividad y eficiencia.</p>
                        </div>
                        <div class="texto texto_modulo1">
                            <h5>experiencia</h5>
                            <p>Con un extenso catálogo de productos,</p>
                            <p>ofrecemos una propuesta única</p>
                            <p>en el mercado gastronómico</p>
                            <p>que garantiza el éxito de tu inversión.</p>
                            <p> </p>
                        </div>
                    </div>
                    <div class="btn-contenedor">
                        <a href="https://solreal.com/archivo/catalogo_digital.pdf" class="btn btn-primary"
                            target="_blank">Catálogo de
                            productos&nbsp;</a>
                    </div>
                </div>
                <!-- TARJETAS  -->
                <section class="sectionCards container-md">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card shadowCard noBorder">
                                <div class="card-body bodyCard">
                                    <i class="fas fa-dollar-sign"></i>
                                    <h3 class="titleCard p-3">Ventas por mayor y menor</h3>
                                    <p class="card-text">Realiza tus compras para uso personal o generá ingresos
                                        revendiendo
                                        nuestros
                                        articulos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-5 pt-sm-0">
                            <div class="card shadowCard noBorder">
                                <div class="card-body bodyCard">
                                    <i class="fas fa-money-check-alt"></i>
                                    <h3 class="titleCard p-3">Todos los medios de pago</h3>
                                    <p class="card-text">Aceptamos todas las tarjetas, transferencia bancaria, Mercado
                                        Pago,
                                        Yacaré
                                        y
                                        efectivo.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-5 pt-lg-0">
                            <div class="card shadowCard noBorder">
                                <div class="card-body bodyCard">
                                    <i class="fas fa-truck"></i>
                                    <h3 class="titleCard p-3">Envío a domicilio</h3>
                                    <p class="card-text">Realizamos envios en la ciudad mediante motomandados y al
                                        interior
                                        por
                                        encomienda. En Misiones y Corrientes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-5 pt-lg-0">
                            <div class="card shadowCard noBorder">
                                <div class="card-body bodyCard">
                                    <i class="fas fa-user-friends"></i>
                                    <h3 class="titleCard p-3">Atención personalizada</h3>
                                    <p class="card-text">Te asesoramos en la venta y compra de nuestros articulos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FOOTER  -->
                <footer>
                    <div class="container">
                        <div class="contenedor-links">
                            <a href="index.php">Inicio</a>
                            <a href="vistas/productos.php">Productos</a>
                            <a href="vistas/quienes_somos.php">Quienes Somos</a>
                            <a href="vistas/contacto.php">Contacto</a>
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

    <script src="js/index.js"></script>
    <script src="js/sesion.js"></script>
</body>



</html>