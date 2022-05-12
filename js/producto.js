function traerProductos() {
    $.ajax({
        url: '../ajax/producto.php?op=traerProductos',
        success: function (data) {
            let productos = "";
            let resultados = JSON.parse(data)
            resultados.forEach(element => {
                productos += `
                <div class="col-md-4">
                <p> ${element.nombre} </p>
                </div>
                `;
            });
            $("#listadoProductos").html(productos)
            console.log(JSON.parse(data))
        }
    });

}
traerProductos()
