function init() {
    actualizarCantidadCarrito();
}

function actualizarCantidadCarrito() {
    let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
    let cantidadTotal = 0;
    if (carritoStorage != null) {
        carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamops a JSON el carrito..

        carrito.map(function (element, index) {
            cantidadTotal += element.cantidad;
        });
    }
    $("#cantidadCarrito").text(cantidadTotal)
}

init();