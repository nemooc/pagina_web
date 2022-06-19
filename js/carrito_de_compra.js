function init() {
    traerDatosCarrito()
    actualizarCantidadYTotalCarrito()
}

function traerDatosCarrito() {
    let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
    let datosCarrito = "";
    if (carritoStorage != null) {
        carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamops a JSON el carrito..

        // se recorre la variable carrito
        carrito.map(function (element, index) {
            datosCarrito += `
            <tr>
                <th scope="row">${element.id_producto}</th>
                <td>${element.nombre}</td>
                <td class="text-center"><img src="../Imagenes_Cocinas/${element.imagen}" width="100"/></td>
                <td>$${element.precio}</td>
                <td>${element.cantidad}</td>
                <td>$${element.subtotal}</td>
                <td><button type="button" class="btn btn-danger" onclick="eliminarProducto(${element.id_producto})">Eliminar</button></td>
            </tr>
            `;
        });
    }

    $("#datosCarrito").html(datosCarrito);
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

init();
