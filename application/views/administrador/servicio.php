<!-- ESTRUCTURA DEL MODAL DE REGISTRO DE NUEVO SERVICIO -->
<div id="modal_cliente" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Ingresar Vehìculo</h4>
        <form method="post">
            <div class='row'>
                <div class='col s6'>
                    <input id='serv_patente' type="text" placeholder="Patente" >
                    <input id='serv_hora_entrada' type="text" placeholder="Hora entrada" >
                </div>
                <div class='col s6'>
                    <input id='telefono_cliente' type="tel" placeholder="Telefono" >
                    <div class="input-field col s12">
                        <select id="region">
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select id="provincia">
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select id="comuna">
                        </select>
                    </div>
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
            <h4 class="center-align">REGISTRO DE SERVICIO</h4>

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
                        <th>Estado</th>

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
            <h4 class="center-align">REGISTRO DE SERVICIO</h4>

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
                    </tr>
                </thead>
                <tbody id='tbody_reg'>

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

</script>