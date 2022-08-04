$("#formRegistro").on("submit", function (event) {
    event.preventDefault()
    let formData = new FormData($('#formRegistro')[0]);

    $.ajax({

        url: '../ajax/usuarioAjax.php?op=enviarDatos',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            data = JSON.parse(data);
            if (data.status) {
                Swal.fire({
                    title: 'DCRepresentacion',
                    text: data.message,
                    icon: 'success',
                }).then((result) => {
                    window.location = "../vistas/login.php"
                })
            } else {
                Swal.fire({
                    title: 'DCRepresentacion',
                    text: data.message,
                    icon: 'error',
                })
            }


        }

    });
})


