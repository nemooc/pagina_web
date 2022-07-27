function init() {
    traerDatosCarrito()
    actualizarCantidadYTotalCarrito();
}

function traerDatosCarrito() {
    let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
    let datosCarrito = "";

    if (carritoStorage != null) {
        carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamos a JSON el carrito..

        if (carrito.length > 0) {
            /** SOLO SI TENEMOS ARTICULOS CARGADOS EN EL CARRITO */

            datosCarrito += `
            <form id="formCarrito">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">imagen</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>`;

            // se recorre la variable carrito y se crean las filas de la tabla
            carrito.map(function (element, index) {
                datosCarrito += `
   
                <tr>
                    <th scope="row"><input type="hidden" name="id_producto[]" value="${element.id_producto}">${element.id_producto}</th>
                    <td><input type="hidden" name="nombre[]" value="${element.nombre}">${element.nombre}</td>
                    <td class="text-center"><img src="../Imagenes_Cocinas/${element.imagen}" width="100"/></td>
                    <td><input type="hidden" name="precio[]" value="${element.precio}">$${element.precio}</td>
                    <td><input type="hidden" name="cantidad[]" value="${element.cantidad}">${element.cantidad}</td>
                    <td><input type="hidden" name="subtotal[]" value="${element.subtotal}">$${element.subtotal}</td>
                    <td><button type="button" class="btn btn-danger" onclick="eliminarProducto(${element.id_producto})">Eliminar</button></td>
                </tr>
                `;
            });


            datosCarrito += `</tbody>
                    </table>
                    <div class="col-12 boton_carrito">
                        <input type="hidden" name="total_venta" id="inputTotalVenta">
                        <span id="montoTotalCarrito"></span>
                    </div>
                    <div class="col-12 boton_carrito">
                        <button type="button" onclick="terminarCompra()" class="btn btn-success">Terminar Compra</button>
                    </div>
                </div>
            </form>
            `;
            /**  END SOLO SI TENEMOS ARTICULOS CARGADOS EN EL CARRITO*/
        } else {
            datosCarrito = `
            <div class="text-center">
                <h2>Tu carrito esta vacio :( </h2>
            </div>
            `;
        }
    } else {
        datosCarrito = `
        <div class="text-center">
            <h2>Tu carrito esta vacio :( </h2>
        </div>
        `;
    }



    $("#divCarrito").html(datosCarrito);
}

function actualizarCantidadYTotalCarrito() {
    let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
    let cantidadTotal = 0;
    let montoTotal = 0;
    if (carritoStorage != null) {
        carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamops a JSON el carrito..

        carrito.map(function (element, index) {
            cantidadTotal += element.cantidad;
            montoTotal += element.subtotal;
        });
    }
    $("#cantidadCarrito").text(cantidadTotal)
    $("#montoTotalCarrito").text(`$${montoTotal}`)
    $("#inputTotalVenta").val(montoTotal)
}

function eliminarProducto(id_producto) {
    let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
    let carrito = []
    if (carritoStorage != null) {
        carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamops a JSON el carrito..

        carrito.map(function (element, index) {
            if (id_producto == element.id_producto) {
                // eliminamos el producto del carrito
                carrito.splice(index, 1)
            }
        });
        localStorage.setItem("carrito", JSON.stringify(carrito));
    }
    traerDatosCarrito();
    actualizarCantidadYTotalCarrito();
}


// terminar compra
function terminarCompra() {

    let formData = new FormData($('#formCarrito')[0]);

    $.ajax({
        url: '../ajax/ventasAjax.php?op=terminarCompra',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            data = JSON.parse(data);

            if (data.status) {
                localStorage.removeItem('carrito');
                traerDatosCarrito();
                actualizarCantidadYTotalCarrito();
                Swal.fire({
                    title: 'DCREPRESENTACION',
                    text: data.message,
                    icon: 'success',
                })
            } else {
                Swal.fire({
                    title: 'DCREPRESENTACION',
                    text: data.message,
                    icon: 'error',
                })
            }


        }

    });
}





init();
