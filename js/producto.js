function init() {
    traerProductos()
    traerCategorias()
}
function traerProductos() {
    $.ajax({
        url: '../ajax/producto.php?op=traerProductos',
        success: function (data) {
            // let productos = "";
            // let resultados = JSON.parse(data)
            // resultados.forEach(element => {
            //     productos += `
            //     <div class="col-md-4">
            //                 <div class="card mb-4 shadow-sm">
            //                     <div style="height:200px;background-content:center;background-size:cover;background-image: url(../img/2.jpeg); "> 

            //                     </div>

            //                     <div class="card-body">
            //                     <h4>${element.nombre}</h4>
            //                     <p>$${element.precio_venta}</p>
            //                         <div class="d-flex justify-content-between align-items-center">
            //                             <div class="btn-group">
            //                                 <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
            //                                 <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
            //                             </div>

            //                         </div>
            //                     </div>
            //                 </div>
            //             </div>
            //     `;
            // });
            // $("#listadoProductos").html(productos)
            console.log(data)

        }
    });

}


function traerCategorias() {
    $.ajax({
        url: '../ajax/producto.php?op=traerCategoria',
        success: function (data) {
            let categoria = "";                // en esta variable va todo el HTML
            let resultados = JSON.parse(data)
            resultados.forEach(element => {
                categoria += `
                <div>
                    <ul>
                        <li><a href="#" onClick="event.preventDefault();traerProductos()">${element.categoria}</a></li>
                    </ul>
                </div>
                `;
            });
            $("#listadoCategoria").html(categoria)

        }
    });

}
init()