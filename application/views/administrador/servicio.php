<!-- Modal Structure insert-->
<div id="modal_cliente" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Ingresar Vehìculo</h4>
        <form method="post">
            <div class='row'>
                <div class='col s6'>
                    <input id='serv_patente' type="text" placeholder="Rut" >
                    <input id='serv_hora_entrada' type="text" placeholder="Nombre" >
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
            <button type="submit" id='bt_add_perfil' class='btn'>
                CREAR CLIENTE
            </button>
        </form>
    </div>
</div>



<div class='card-panel'>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">MODULO CLIENTE</h4>

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn-floating modal-trigger" href="#modal_cliente">
                <i class='material-icons'>add</i>
            </a>
            <br />
            <table class='bordered'>
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>   
                        <th>Telefono</th>
                        <th>Región</th>
                        <th>Provincia</th>
                        <th>Comuna</th>
                        <th>Giro</th>
                        <th>Razon Social</th>
                        <th>Dirección</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id='tbody_perfil'>

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



    getRegiones();


    function getRegiones() {
        var url = base_url + "regiones";

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