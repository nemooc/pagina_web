function init() {
    actualizarCantidadCarrito();
    mostrarMisPedidos();
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


function mostrarMisPedidos() {
    $.ajax({
        url: '../ajax/ventasAjax.php?op=mostrarMisPedidos',
        success: function (data) {
            let resultados = JSON.parse(data)
            let estadoPago = ""
            let pedidos = `<div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">N° de Venta</th>
                                                    <th scope="col">Total Venta</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Estado de Pago</th>
                                                    <th scope="col">Estado de Seguimiento</th>
                                                    <th scope="col">Detalles de Compra</th>
                                                    

                                                </tr>
                                            </thead>
                            
                                             <tbody>`;

            resultados.forEach(element => {
                if (element.estado == "PENDIENTE") {
                    estadoPago = '<span class="badge badge-warning">PENDIENTE</span>'


                } else if (element.estado == "ANULADA") {
                    estadoPago = '<span class="badge badge-danger">ANULADA</span>'
                } else {
                    estadoPago = `<span class="badge badge-success">${element.estado}</span>`
                }
                pedidos += `

                                <tr>
                                    <td>${element.numero_venta}</td>
                                    <td>$${element.total_venta}</td>
                                    <td>${element.fecha}</td>
                                    <td>${estadoPago}</td>
                                    <td><strong>${element.estado_seguimiento}</strong></td>
                                    <td><button class="btn btn-primary">Ver Detalles Compra</button></td>
                                </tr>
                            
                `;

            });
            pedidos += `                </tbody>
                                        </table>
                        </div>`
            $("#divMisPedidos").html(pedidos)
        }

    });
}




init();