$(document).ready(function () {

    var base_url = "http://localhost:8080/Parking/";

    $("#bt_login").click(function (e) {
        e.preventDefault();
        var username = $("#user_login").val();
        var password = $("#password_login").val();
        //ENVIO DE DATOS
        $.ajax({
            url: base_url + 'login2',
            type: 'post',
            dataType: 'json',
            data: {username: username, password: password},
            success: function (o) {
                if (o.msg === "0") {
                    Materialize.toast("Usuario y/o contraseña incorrectos", "4000");
                } else if (o.msg === "Activo") {
                    window.location.href = base_url + "administrador";
                } else {
                    Materialize.toast("El usuario se encuentra Bloqueado", "4000");
                }


            },
            error: function () {
                Materialize.toast("Error 500", "4000");
            }

        });


    });


});
