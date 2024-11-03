<h1>{{modes_dsc}}</h1>
<section class="grid">
    <form action="index.php?page=Works-WorksForm&mode={{mode}}&codigo={{codigo}}" method="post" class="row">
        {{with work}}
        <div class="row col-6 offset-3">
            <label class="col-4" for="codigo">Codigo</label>
            <input class="col-8" type="number" name="codigo" id="codigo" value="{{codigo}}" readonly />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="nombre">Nombre</label>
            <input class="col-8" type="text" name="nombre" id="nombre" value="{{nombre}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="descripcion">Descripcion</label>
            <input class="col-8" type="text" name="descripcion" id="descripcion" value="{{descripcion}}"
                {{~readonly}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="precio">Precio</label>
            <input class="col-8" type="number" name="precio" id="precio" value="{{precio}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3">
            <label class="col-4" for="estado">Estado</label>
            <input class="col-8" type="text" name="estado" id="estado" value="{{estado}}" {{~readonly}} />
        </div>
        <div class="row col-6 offset-3 flex-end">
            {{if ~showConfirm}}
            <button type="submit" class="primary">Confirmar</button>&nbsp;
            {{endif ~showConfirm}}
            <button id="btnCancelar" class="btn">Cancelar</button>
        </div>
        {{endwith work}}
    </form>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("btnCancelar").addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            window.location.assign("index.php?page=Works-WorksList");
        })
    })
</script>