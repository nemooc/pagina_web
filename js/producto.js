function init() {

    verCategoria("TODOS")
    traerCategorias()
    actualizarCantidadCarrito()

}

function traerProductos(categoriaNombre) {
    $.ajax({
        url: '../ajax/productoAjax.php?op=traerProductos',
        data: { categoria: categoriaNombre },
        success: function (data) {
            let productos = "";
            let resultados = JSON.parse(data)
            resultados.forEach(element => {
                productos += `
                <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div style="height:200px;background-content:center;background-size:cover;background-image: url(../Imagenes_Cocinas/${element.nom_archivo});"> 

                                </div>

                                <div class="card-body">
                                <h4>${element.nombre}</h4>
                                <p>$${element.precio_venta}</p>
                                    <div class="d-flex justify-content-between align-items-center">

                                            <button type="button" class="btn btn-info" onClick="verDetalleProducto(${element.id_productos})">Ver mas</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                `;
            });
            $("#listadoProductos").html(productos)
        }

    });

}
function verDetalleProducto(id_producto) {
    $.ajax({
        url: '../ajax/productoAjax.php?op=traerProducto',
        data: { id: id_producto },
        success: function (data) {
            data = JSON.parse(data)
            $("#bodyDetalleProducto").html(data)
            $("#detalleProductoModal").modal('show')

        }
    });
}

function agregarAlCarrito(id_productos, nombre, imagen, precio, stock_actual) {
    let cantidad = $("#cantidad").val()                      // se toma el valor del input cantidad
    let vacio = ""
    let cero = 0
    // controlamos que la cantidad ingresada no sobrepase el stock actual
    if (cantidad > stock_actual) {
        Swal.fire({
            title: 'Advertencia',
            text: "Cantidad supera el Stock Actual",
            icon: 'warning',
        })

    } else if (cantidad === vacio || cantidad == cero) {
        Swal.fire({
            title: 'Advertencia',
            text: "Ingrese una cantidad",
            icon: 'warning',
        })
    } else if (cantidad < cero) {
        Swal.fire({
            title: 'Advertencia',
            text: "No se aceptan numeros negativos",
            icon: 'warning',
        })
    }
    else {
        let subtotal = cantidad * precio;
        let producto = {                                         //creamos un objeto para crear carrito
            "id_producto": id_productos,
            "nombre": nombre,
            "imagen": imagen,
            "precio": precio,
            "cantidad": parseInt(cantidad),
            "subtotal": subtotal
        }
        let carrito = []                                         //creamos un array donde mandamos al locaStorage
        let carritoStorage = localStorage.getItem("carrito")     //Traemos el carrito si es que existe
        if (carritoStorage != null) {
            carrito = JSON.parse(carritoStorage);                //Si existe el carrito transformamops a JSON el carrito..
            // se recorre la variable carrito
            carrito.map(function (element, index) {
                if (element.id_producto == id_productos) {
                    let cantidadNueva = producto["cantidad"] + parseInt(element.cantidad);
                    //Tomamos la cantidad del input y sumamos a la que ya tenia    
                    producto["cantidad"] = cantidadNueva;
                    producto["subtotal"] = cantidadNueva * precio;
                    // eliminamos el producto del carrito
                    carrito.splice(index, 1)
                }
            });
        }
        carrito.push(producto)                                   //Hacemos el push(añadimos) producto que creamos anteriormente
        localStorage.setItem("carrito", JSON.stringify(carrito)) //Aca mandamos al LocalStorage al carrito

        actualizarCantidadCarrito();
        $("#detalleProductoModal").modal("hide")
        Swal.fire({
            title: 'Producto agregado!',
            text: `Se añadieron (${cantidad}) ${nombre} al carrito!`,
            icon: 'success',
        })


    }
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
function traerCategorias() {
    $.ajax({
        url: '../ajax/productoAjax.php?op=traerCategoria',
        success: function (data) {
            let categoria = `<div>              
                                <ul> 
                                    <li>
                                        <a style="text-decoration:none;"href="#" onClick="event.preventDefault();verCategoria('TODOS')">
                                            TODOS
                                        </a>
                                    </li>`;
            let resultados = JSON.parse(data)
            resultados.forEach(element => {
                categoria += `<li>
                                     <a style="text-decoration:none;"href="#" onClick="event.preventDefault();verCategoria('${element.categoria}')">
                                        ${element.categoria}
                                     </a>
                              </li>`;
            });
            categoria += `       </ul>
                         </div>`;
            $("#listadoCategoria").html(categoria)

        }

    });
}
function verCategoria(categoria) {
    traerProductos(categoria)
    $("#categoria").text(categoria)
}
init()