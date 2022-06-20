let baseUrl = "";
// si estoy en pagina index
if (window.location.pathname == "/pagina_web/") {
    baseUrl = "";
} else {
    baseUrl = "../";
}

$("#formulario").on("submit", function (accion_del_boton) {
    iniciar_sesion(accion_del_boton);
});

function iniciar_sesion(accion_del_boton) {
    accion_del_boton.preventDefault();
    let formData = new FormData($('#formulario')[0]);

    $.ajax({
        url: `${baseUrl}ajax/usuarioAjax.php?op=iniciarSesion`,//lugar a donde se envia los datos obtenidos del formulario
        type: "POST",
        data: formData, //estos son los datos que envio
        contentType: false,
        processData: false,

        success: function (data) {
            if (data != "null") {
                $(location).attr("href", baseUrl);
            } else {
                alert("Usuario o clave incorrectos!")
            }
        }
    });
}

function cerrar_sesion() {
    $.ajax({
        url: `${baseUrl}ajax/usuarioAjax.php?op=cerrarSesion`,//lugar a donde se envia los datos obtenidos del formulario
        type: "GET",
        success: function (data) {
            $(location).attr("href", baseUrl);
        }
    });
}