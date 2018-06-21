<div class='card-panel'>


    <div class="row">
        <form class="col s12">
            <h3 class="center-align">Configurar Valores</h3>

            <br/>
            <div class="row">

                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_money</i>
                    <input id="valor_hora" type="text" class="validate" placeholder="Ej: 500">
                    <label for="valor_hora">Valor Hora (CLP)</label>
                </div>

                <div class="input-field col s6">
                    <button id="bt_update_vhora" class="btn" type="submit">ACTUALIZAR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    Materialize.updateTextFields();

    //FUNCION QUE ACTUALIZAR EL VALOR DE LA HORA DE ARRIENDO
    $("#bt_update_vhora").bind("click", function (e) {
        e.preventDefault();
        var valor = $("#valor_hora").val();

        var key = "3F!9#";
        $.ajax({
            url: URL + 'actualizarValorHora',
            type: 'post',
            dataType: 'json',
            data: {valor: valor, key: key},
            success: function (o) {
                Materialize.toast(o.msg, "3000");
                document.getElementById("valor_hora").value = "";
            },
            error: function () {
                Materialize.toast("500", "3000");
            }
        });

    });
    //fin funcion actualizar
</script>