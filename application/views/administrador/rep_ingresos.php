<div class='card-panel'>


    <div class="row">
        <form class="col s12">
            <h3 class="center-align">Reportes - Ingresos (dinero)</h3>

            <br/>
            <div class="row">
                <div class="input-field col s12 m12">
                    <h6 id="total_pagos_h5">Total de ingresos: </h6>
                </div>

                <div class="input-field col s12 m12">
                    <div class="divider"></div>
                    <h4>Ingresos por fecha: </h4>
                </div>
                <div class="input-field col s12 m5">
                    <input id="fecha1" type="text" class="datepicker">
                    <label for="fecha1">Fecha Inicio</label>
                </div>
                <div class="input-field col s12 m5">
                    <input id="fecha2" type="text" class="datepicker">
                    <label for="fecha2">Fecha Fin</label>
                </div>
                <div class="input-field col s12 m2">
                    <a class="btn-floating btn-large waves-effect waves-light blue" href="#" id="btn_filtrar_fecha" onclick="return setTotPagosFecha();">
                        <i class="material-icons">subdirectory_arrow_right</i>
                    </a>
                </div>
                <div class="col s12 m3">
                    <div class="card-panel teal">
                        <span class="white-text" id="card_tot_fecha">
                            $0
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    getTotalPagos();
    function getTotalPagos() {
        $.getJSON(URL + "total_pagos", function (result) {
            $.each(result, function (i, o) {
                // var opt = new Option(o.nombre_region,o.id_region);
                document.getElementById("total_pagos_h5").innerHTML = "Total de ingresos: $" + o.total_pago;
            });
        });
    }

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 10, // Creates a dropdown of 15 years to control year,
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Ok',
        closeOnSelect: true, // Close upon selecting a date,
        container: undefined, // ex. 'body' will append picker to body
        firstDay: true
    });
    function setTotPagosFecha() {

        if (document.getElementById("fecha1").value === "" || document.getElementById("fecha2").value === "") {
            Materialize.toast("Debe indicar ambas fechas", "3000");
        } else if (new Date($("#fecha1").val()) > new Date($("#fecha2").val())) {
            Materialize.toast("Fecha inicio debe ser menor a Fecha fin!", "3000");
        } else if (new Date($("#fecha1").val()).valueOf() === new Date($("#fecha2").val()).valueOf()) {
            Materialize.toast("Debe ingresar fechas diferentes", "3000");
        } else {
            var fecha1 = new Date($("#fecha1").val());
            var fecha2 = new Date($("#fecha2").val());
            var f1 = fecha1.getFullYear() + "-" + ((fecha1.getMonth() + 1) < 10 ? '0' : '') +
                    (fecha1.getMonth() + 1) + "-" + (fecha1.getDate() < 10 ? '0' : '') + fecha1.getDate() + " 00:00:00";
            var f2 = fecha2.getFullYear() + "-" + ((fecha2.getMonth() + 1) < 10 ? '0' : '') +
                    (fecha2.getMonth() + 1) + "-" + (fecha2.getDate() < 10 ? '0' : '') + fecha2.getDate() + " 00:00:00";
            var key = "3F!9#";
            $.ajax({
                url: base_url + 'total_pagos_fecha',
                type: 'post',
                dataType: 'json',
                data: {fecha1: f1, fecha2: f2, key: key},
                success: function (o) {
                    if (o[0].total_pago === null) {
                        document.getElementById("card_tot_fecha").innerHTML = "$0";
                        document.getElementById("fecha1").value = "";
                        document.getElementById("fecha2").value = "";
                        Materialize.updateTextFields();
                    } else {
                        document.getElementById("card_tot_fecha").innerHTML = "$" + o[0].total_pago;
                        document.getElementById("fecha1").value = "";
                        document.getElementById("fecha2").value = "";
                        Materialize.updateTextFields();
                    }
                    Materialize.toast("Hecho", "3000");

                },
                error: function () {
                    Materialize.toast("Error 500", "3000");
                }

            });
        }
    }
</script>