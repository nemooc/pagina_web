function init() {

    verCategoria("TODOS")
    traerCategorias()

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
            console.log(JSON.parse(data))
        }

    });

}
function verDetalleProducto(id_producto) {
    $.ajax({
        url: '../ajax/productoAjax.php?op=traerProducto',
        data: { id: id_producto },
        success: function (data) {
            data = JSON.parse(data)
            let contenido = `
                        <div class="col-12 col-lg-4">
                                    <div style="height:200px;background-content:center;background-size:cover;background-image: url(../Imagenes_Cocinas/${data.nom_archivo});"> 
                                    </div>
                        </div>
                        <div class="col-8 col-lg-8">
                            <h2>${data.nombre}</h2>
                            <p>${data.detalles}</p>
                            <h4>$${data.precio_venta}</h4>
                        </div>
                          `;
            $("#bodyDetalleProducto").html(contenido)
            $("#detalleProductoModal").modal('show')

        }
    });
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