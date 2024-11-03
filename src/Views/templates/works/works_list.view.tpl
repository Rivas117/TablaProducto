<h1>Listado de Productos</h1>
<section class="WWList">
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre Del Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Estado</th>
                <th><a href="index.php?page=Works-WorksForm&mode=INS"><I class="fa-solid fa-plus"></I></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach works}}
            <tr>
                <td>{{codigo}}</td>
                <td>{{nombre}}</td>
                <td>{{descripcion}}</td>
                <td>{{precio}}</td>
                <td>{{estadoDsc}}</td>
                <td style="display: flex; gap:1rem; justify-content:center; align-items:center">
                    <a href="index.php?page=Works-WorksForm&mode=UPD&codigo={{codigo}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="index.php?page=Works-WorksForm&mode=DEL&codigo={{codigo}}">
                        <i class="fas fa-trash"></i>
                    </a>
                    <a href="index.php?page=Works-WorksForm&mode=DSP&codigo={{codigo}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            {{endfor works}}
        </tbody>
    </table>
</section>