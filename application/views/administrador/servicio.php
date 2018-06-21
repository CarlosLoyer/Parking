<!-- ESTRUCTURA DEL MODAL DE REGISTRO DE NUEVO SERVICIO -->
<div id="modal_reg" class="modal" style="width: 20%">
    <div class="modal-content">
        <h4 class="center-align">Ingresar Vehículo</h4>
        <form method="post">
            <div class='row'>
                <div class='col s12'>
                    <input id='serv_patente' type="text" placeholder="Patente" autofocus="true" onchange="return formateaPatente();">
                    <input id='serv_hora_entrada' type="text" placeholder="Hora entrada" readonly="true" >
                    <input id='serv_hora_entrada_completa' type="text" readonly="true" style="display: none">
                </div>

            </div>
            <button type="submit" id='bt_add_reg' class='btn'>
                INGRESAR
            </button>
        </form>
    </div>
</div>

<!-- MODAL CERRAR REGISTRO -->
<div id="modal_serv_close" class="modal">
    <div class="modal-content">
        <h3 class="center-align">Cerrar Servicio</h3>
        <form method="post">
            <div class='row'>
                <div class='col s6'>
                    <div class="input-field col s12" style="display: none">
                        <label for="id_serv_close">ID</label>
                        <input id='id_serv_close' type="text" placeholder="ID" readonly>
                    </div>
                    <div class="input-field col s12">
                        <label for="pat_serv_close">Patente</label>
                        <input id='pat_serv_close' type="text" placeholder="Patente" readonly>
                    </div>
                    <div class="input-field col s12">
                        <label for="hora_entrada_serv_close">Hora entrada</label>
                        <input id='hora_entrada_serv_close' type="text" placeholder="Hora Entrada" readonly>
                    </div>
                    <div class="input-field col s12">
                        <label for="hora_salida_serv_close">Hora salida</label>
                        <input id='hora_salida_serv_close' type="text" placeholder="Hora Salida" readonly>

                    </div>
                    <div class="input-field col s12">
                        <label for="fecha_salida_serv_close">Fecha salida</label>
                        <input id='fecha_salida_serv_close' type="text" placeholder="Fecha Salida" readonly>
                    </div>

                </div>

                <div class='col s6'>

                    <div class="input-field col s12">
                        <label for="tot_horas_serv_close">Total de horas</label>
                        <input id='tot_horas_serv_close' type="text" placeholder="Total de Horas" readonly style="color: #58ACFA">

                    </div>
                    <div class="input-field col s12">
                        <label for="tot_pago_serv_close">Total a Pagar</label>
                        <input id='tot_pago_serv_close' type="text" placeholder="Total a Pagar" readonly style="color: #5FB404">

                    </div>
                    <div class="input-field col s12">
                        <select id="cb_forma_pago">
                        </select>
                        <label for="cb_forma_pago">Forma de Pago</label>
                    </div>

                    <input id='hora_salida_serv_close_full' type="text" style="display: none">
                    <input id='tot_horas_serv_close_full' type="text" style="display: none">
                    <input id='tot_pago_serv_close_full' type="text" style="display: none">
                </div>

                <div class="col s3 offset-s9">
                    <button type="submit" id='bt_close_servicio' class='btn'>
                        PAGAR SERVICIO
                    </button>
                </div>
            </div>


        </form>
    </div>
</div>
<!-- FIN MODAL CERRAR REGISTRO -->

<!-- MODAL ELIMINAR REGISTRO (CONFIRMACION) -->
<div id="modal_serv_del" class="modal" style='width: 35%'>
    <div class="modal-content">
        <form method="post">
            <div id="div_del1"> 
                <div class='row'>
                    <div class='col s12'>
                        <input id='id_serv_del' type="text" style='display: none' >
                        <h3 style='font-size: 23px; color: red'>Está apunto de eliminar el registro de patente:</h3>
                        <h3 style='font-size: 17px; font-weight: bolder' id='patente_serv_del'></h3>
                        <p>
                            <input type="checkbox" class="filled-in" id="chk_del_servicio" />
                            <label for="chk_del_servicio">Confirmar</label>
                        </p>
                    </div>

                </div>
                <button type="submit" id='bt_del_servicio' class='btn disabled' disabled>
                    ELIMINAR REGISTRO
                </button>
            </div>
            <div id="div_del2">
                <h4 style="color: red">No puede eliminar un registro de mas de 5 minutos!</h4>
            </div>
        </form>
    </div>
</div>
<!-- FIN MODAL ELIMINAR REGISTRO -->



<div class='card-panel'>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">INGRESOS PENDIENTES</h4>

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn-floating modal-trigger" href="#modal_reg" onclick="return cargarHoraAdd();">
                <i class='material-icons'>add</i>
            </a>
            <br />
            <table class='bordered striped'>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Patente</th>
                        <th>Hora Entrada</th>
                        <th>Estado</th>
                        <th>Cerrar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id='tbody_reg'>

                </tbody>
            </table>

        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col s12">
            <h4 class="center-align">INGRESOS CERRADOS</h4>

            <br />
            <table class='bordered striped'>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Patente</th>
                        <th>Hora Entrada</th>
                        <th>Hora Salida</th>
                        <th>Fecha Salida</th>
                        <th>Total Horas</th>
                        <th>Total Pago</th>
                        <th>Forma de Pago</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id='tbody_reg_end'>

                </tbody>
            </table>

        </div>
    </div>

</div>


<script>
    $('select').material_select();
    $('.modal-trigger').leanModal({
        height: "100%"
    });

    Materialize.updateTextFields();

    getFormasPago();

    getRegistros();


    function getFormasPago() {
        $.getJSON(URL + "formas_pago", function (result) {
            $.each(result, function (i, o) {
                // var opt = new Option(o.nombre_region,o.id_region);
                $("#cb_forma_pago").append(new Option(o.nombre_forma_pago, o.id_forma_pago));
                $('select').material_select();
            });
        });

    }

    function getRegistros() {
        $("#tbody_reg").empty();
        $.getJSON(URL + "registros_pend", function (result) {
            $.each(result, function (i, o) {
                var row = "<tr>";
                row += "<td>" + o.id_reg + "</td>";
                row += "<td>" + o.patente + "</td>";
                row += "<td>" + o.hora_entrada.toString().substring(11, 16) + "</td>";
                row += "<td>" + o.estado + "</td>";
                row += "<td><a id='btn_cerrar_servicio' class='btn-floating waves-effect'><i class='material-icons'>local_atm</i></a></td>";
                row += "<td><a id='btn_del_servicio' class='btn-floating waves-effect'><i class='material-icons'>close</i></a></td>";
                row += "</tr>";
                $("#tbody_reg").append(row);
            });
        });
    }

    //FUNCION QUE CARGA LA HORA EN CAMPO VISIBLE Y HORA Y FECHA EN CAMPO INVISIBLE PARA FUNCIONES DE SISTEMA
    function cargarHoraAdd() {
        var currentdate = new Date();
        var hora_actual = currentdate.getHours() + ":" + currentdate.getMinutes();
        $("#serv_hora_entrada").val(hora_actual);
        $("#serv_hora_entrada_completa").val(currentdate.getFullYear() + "-" + (currentdate.getMonth() + 1) + "-" + currentdate.getDate() + " " + currentdate.getHours()
                + ":" + (currentdate.getMinutes() < 10 ? '0' : '') + currentdate.getMinutes() + ":" + currentdate.getSeconds());
        $("#serv_patente").val("");
    }
    //fin cargar fechas

    //FUNCION QUE PERMITE AÑADIR UN REGISTRO DE SERVICIO TRAS PINCHAR EL BOTON "CREAR" EN EL MODAL
    $("#bt_add_reg").bind("click", function (e) {
        e.preventDefault();
        var patente = $("#serv_patente").val();
        var hora_entrada = $("#serv_hora_entrada_completa").val();
        var key = "3F!9#";
        if (patente === "") {
            Materialize.toast("Debe lingresar la patente", "3000");
        } else {
            $.ajax({
                url: URL + 'insertarServicio',
                type: 'post',
                dataType: 'json',
                data: {patente: patente, hora_entrada: hora_entrada, key: key},
                success: function (o) {
                    Materialize.toast(o.msg, "3000");
                    getRegistros();
                    $("#modal_reg").closeModal();
                },
                error: function () {
                    Materialize.toast("Error 500", "3000");
                }
            });
        }
    });
    //fin funcion añadir registro

    //FUNCION QUE PERMITE CARGAR EL ID AL PINCHAR SOBRE EL BOTON ELIMINAR EN LA TABLA
    $("body").on("click", "#btn_del_servicio", function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().children()[0];
        var patente = $(this).parent().parent().children()[1];

        var id_int = parseInt($(id).text());


        $('#bt_del_servicio').addClass('disabled');
        document.getElementById("bt_del_servicio").disabled = true;

        var chkBox = document.getElementById('chk_del_servicio');
        chkBox.checked = false;

        //escribir en el modal
        $("#id_serv_del").val($(id).text());
        document.getElementById('patente_serv_del').innerHTML = '> ' + $(patente).text() + ' <';

        $.getJSON(URL + "registros_pend", id_int, function (result) {

            $.each(result, function (i, o) {
                // AQUI CAPTURAMOS EL ELEMENTO CORRESPONDIENTE A LA FILA EN LA TABLA
                if (id_int === parseInt(o.id_reg)) {
                    if (Math.abs(new Date() - new Date(o.hora_entrada)) >= 300000) {
                        document.getElementById("div_del1").style.display = 'none';
                        document.getElementById("div_del2").style.display = '';
                        Materialize.toast("No puede eliminar un registro de más de 5 minutos.", "2000");

                    } else {
                        document.getElementById("div_del2").style.display = 'none';
                        document.getElementById("div_del1").style.display = '';
                        $('#modal_serv_del').openModal();
                    }
                }
            });
        });


    });
    //fin funcion cargar ID

    //FUNCION QUE HABILITA O DESHABILITA BOTON DE ELIMINAR SEGUN ACTIVACION DE CHECKBOX "CONFIRMAR"
    $("#chk_del_servicio").bind("change", function (e) {
        e.preventDefault();
        var chkBox = document.getElementById('chk_del_servicio');
        if (chkBox.checked)
        {
            $('#bt_del_servicio').removeClass('disabled');
            document.getElementById("bt_del_servicio").disabled = false;
        } else {
            $('#bt_del_servicio').addClass('disabled');
            document.getElementById("bt_del_servicio").disabled = true;
        }

    });
    //fin funcion checkbox "confirmar"


    //FUNCION QUE PERMITE ELIMINAR UN REGISTRO DE SERVICIO
    $("#bt_del_servicio").bind("click", function (e) {
        e.preventDefault();
        var id = $("#id_serv_del").val();
        var key = "3F!9#";
        $.ajax({
            url: URL + 'eliminarServicio',
            type: 'post',
            dataType: 'json',
            data: {id: id, key: key},
            success: function (o) {
                Materialize.toast(o.msg, "3000");
                getRegistros();

                $('#bt_del_servicio').addClass('disabled');
                document.getElementById("bt_del_servicio").disabled = true;

                var chkBox = document.getElementById('chk_del_servicio');
                chkBox.checked = false;

                $("#modal_serv_del").closeModal();
            },
            error: function () {
                Materialize.toast("500", "3000");
            }
        });
    });
    //fin funcion eliminar


    //SCRIPT QUE FORMATEA PATENTE AL INGRESARLA
    function formateaPatente() {
        var patente = document.getElementById("serv_patente").value;
        var actual = patente.toString().replace(/\./g, "");
        var actual1 = actual.toString().replace(/\ /g, "");
        var actual2 = actual1.toString().replace(/\-/g, "");

        var final = "";
        if (actual2 !== '' && actual2.length > 1) {
            for (var i = 1; i < actual2.length + 1; i++) {
                final += actual2[i - 1];
                if (i % 2 === 0 && i < 6) {
                    final += "-";
                }
            }
        }

        final = final.toString().toUpperCase();
        document.getElementById("serv_patente").value = final;
    }


    //FUNCION QUE PERMITE CARGAR LOS VALORES AL PINCHAR SOBRE EL BOTON CERRAR EN LA TABLA
    $("body").on("click", "#btn_cerrar_servicio", function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().children()[0];

        var id_int = parseInt($(id).text());

        $.getJSON(URL + "registros_pend", id_int, function (result) {
            $.each(result, function (i, o) {
                // AQUI CAPTURAMOS EL ELEMENTO CORRESPONDIENTE A LA FILA EN LA TABLA
                if (parseInt(id_int) === parseInt(o.id_reg)) {

                    var currentdate = new Date();
                    document.getElementById('id_serv_close').value = o.id_reg;
                    document.getElementById('pat_serv_close').value = o.patente;
                    document.getElementById('hora_entrada_serv_close').value = (new Date(o.hora_entrada).getHours() < 10 ? '0' : '') + new Date(o.hora_entrada).getHours() +
                            ":" + (new Date(o.hora_entrada).getMinutes() < 10 ? '0' : '') + new Date(o.hora_entrada).getMinutes();

                    document.getElementById('hora_salida_serv_close').value = (currentdate.getHours() < 10 ? '0' : '') + currentdate.getHours()
                            + ":" + (currentdate.getMinutes() < 10 ? '0' : '') + currentdate.getMinutes();
                    //campo invisible con datetime completo de hora de salida
                    document.getElementById('hora_salida_serv_close_full').value = currentdate.getFullYear() + "-" + (currentdate.getMonth() + 1) + "-" + currentdate.getDate() + " " + currentdate.getHours()
                            + ":" + (currentdate.getMinutes() < 10 ? '0' : '') + currentdate.getMinutes() + ":" + currentdate.getSeconds();

                    document.getElementById('fecha_salida_serv_close').value = (currentdate.getDate() < 10 ? '0' : '') + currentdate.getDate() + "-" +
                            ((currentdate.getMonth() + 1) < 10 ? '0' : '') + (currentdate.getMonth() + 1) + "-" + currentdate.getFullYear();

                    var total_horas_dec = Math.abs(currentdate - new Date(o.hora_entrada));
                    var total_horas = ((total_horas_dec / 1000) / 60) / 60;
                    var total_horas_int = parseInt(total_horas);
                    var total_minutos = parseInt((total_horas_dec / 1000) / 60) % 60;

                    document.getElementById('tot_horas_serv_close').value = parseInt(total_horas) + ":" + (total_minutos < 10 ? '0' : '') + total_minutos;
                    document.getElementById('tot_horas_serv_close_full').value = (total_horas_int + (total_minutos >= 30 ? 0.5 : 0));


                    $.getJSON(URL + "config_valor_hora", function (result) {
                        $.each(result, function (i, o) {
                            document.getElementById('tot_pago_serv_close').value = "$" + ((total_horas_int + (total_minutos >= 30 ? 0.5 : 0)) * o.valor);
                            document.getElementById('tot_pago_serv_close_full').value = ((total_horas_int + (total_minutos >= 30 ? 0.5 : 0)) * o.valor);
                        });
                    });


                }
            });
        });


        $('#modal_serv_close').openModal();
    });
    //fin funcion cargar valores

    //FUNCION QUE PERMITE CERRAR UN REGISTRO DE SERVICIO
    $("#bt_close_servicio").bind("click", function (e) {
        e.preventDefault();
        var id = $("#id_serv_close").val();
        var hora_salida = $("#hora_salida_serv_close_full").val();
        var tot_horas = $("#tot_horas_serv_close_full").val();
        var tot_pago = $("#tot_pago_serv_close_full").val();

        var e_fpago = document.getElementById("cb_forma_pago");
        var id_forma_pago = e_fpago.options[e_fpago.selectedIndex].value;


        var key = "3F!9#";
        $.ajax({
            url: URL + 'actualizarServicio',
            type: 'post',
            dataType: 'json',
            data: {id: id, hora_salida: hora_salida, tot_horas: tot_horas, tot_pago: tot_pago, id_forma_pago: id_forma_pago, key: key},
            success: function (o) {
                Materialize.toast(o.msg, "3000");
                getRegistros();
            },
            error: function () {
                Materialize.toast("500", "3000");
            }
        });


        $("#modal_serv_close").closeModal();



    });
    //fin funcion cerrar





</script>
