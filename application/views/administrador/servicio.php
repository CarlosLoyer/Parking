<!-- ESTRUCTURA DEL MODAL DE REGISTRO DE NUEVO SERVICIO -->
<div id="modal_reg" class="modal" style="width: 20%">
    <div class="modal-content">
        <h4 class="center-align">Ingresar Vehículo</h4>
        <form method="post">
            <div class='row'>
                <div class='col s12'>
                    <input id='serv_patente' type="text" placeholder="Patente" >
                    <input id='serv_hora_entrada' type="text" placeholder="Hora entrada" >
                </div>

            </div>
            <button type="submit" id='bt_add_reg' class='btn'>
                INGRESAR
            </button>
        </form>
    </div>
</div>



<div class='card-panel'>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">INGRESOS PENDIENTES</h4>

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn-floating modal-trigger" href="#modal_reg">
                <i class='material-icons'>add</i>
            </a>
            <br />
            <table class='bordered'>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Patente</th>
                        <th>Hora Entrada</th>
                        <th>Estado</th>
                        <th>Cerrar</th>
                        <th>Cancelar</th>
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
            <table class='bordered'>
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

    getRegistros();

    function getRegistros() {
        $("#tbody_reg").empty();
        $.getJSON(URL + "registros_pend", function (result) {
            $.each(result, function (i, o) {
                var row = "<tr>";
                row += "<td>" + o.id_reg + "</td>";
                row += "<td>" + o.patente + "</td>";
                row += "<td>" + o.hora_entrada + "</td>";
                row += "<td>" + o.estado + "</td>";
                row += "<td><a id='btn_cerrar_serv' class='btn-floating waves-effect'><i class='material-icons'>local_atm</i></a></td>";
                row += "<td><a id='btn_cancel_serv' class='btn-floating waves-effect'><i class='material-icons'>close</i></a></td>";
                row += "</tr>";
                $("#tbody_reg").append(row);
            });
        });
    }
/*
    function getRegistros() {
        var url = base_url + "registros";

        $.getJSON(url, function (result) {
            $.each(result, function (i, o) {
                // var opt = new Option(o.nombre_region,o.id_region);
                $("#region").append(new Option(o.nombre_region, o.id_region));
                $('select').material_select();
            });
        });

    }
   
    $("#region").on("change", function (e) {
        e.preventDefault();
        var id_region = $("#region").val();
        $("#provincia").empty();
        $("#comuna").empty();
        $.ajax({
            url: base_url + 'provincias',
            type: 'post',
            dataType: 'json',
            data: {idregion: id_region},
            success: function (o) {
                $.each(o, function (i, o) {
                    // var opt = new Option(o.nombre_region,o.id_region);
                    $("#provincia").append(new Option(o.nombre_provincia, o.id_provincia));
                    $('select').material_select();
                });
            },
            error: function () {
                alert("eror");
            }

        });

    });



    $("#provincia").on("change", function (e) {
        e.preventDefault();
        var id_provincia = $("#provincia").val();
        $("#comuna").empty();
        $.ajax({
            url: base_url + 'comunas',
            type: 'post',
            dataType: 'json',
            data: {idprovincia: id_provincia},
            success: function (o) {
                $.each(o, function (i, o) {
                    // var opt = new Option(o.nombre_region,o.id_region);
                    $("#comuna").append(new Option(o.nombre_comuna, o.id_comuna));
                    $('select').material_select();
                });
            },
            error: function () {
                alert("eror");
            }

        });

    });
    
     */


</script>
