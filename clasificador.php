<?php
include_once 'header.php';
setlocale(LC_MONETARY, 'es_MX');
$queryEmpresa = "SELECT * FROM empresa ep INNER JOIN industria ind ON ep.idindustria = ind.idindustria WHERE ep.idempresa = 125";
$resultado = mysqli_query($conexion, $queryEmpresa);
$empresa = mysqli_fetch_assoc($resultado);

$queryEmbarque = "SELECT * FROM embarque WHERE idempresa = 125";
$embarque = mysqli_query($conexion, $queryEmbarque);

$queryIndustrias = "SELECT * FROM industria";
$industria = mysqli_query($conexion, $queryIndustrias);

while ($row = mysqli_fetch_assoc($industria)) {
    $industrias .= "<option value='$row[idindustria]'>
                        $row[nbindustria]
                    </option>";
}

$almacenA = array('nombre' => 'insumoA', 'id' => 1, 'unidades' => 0, 'costo_total' => 0, 'costo_medio' => 0);

$almacenB = array('nombre' => 'insumoB', 'id' => 2, 'unidades' => 0, 'costo_total' => 0, 'costo_medio' => 0);

foreach ($embarque as $emba) {
    switch ($emba['idalmacen']) {
        case "1":
            $insumos[0]['costo_total'] += (int) $emba['costoembarque'];
            $insumos[0]['unidades'] += (int) $emba['unidades'];
            break;
        case "2":
            $insumos[1]['costo_total'] += (int) $emba['costoembarque'];
            $insumos[1]['unidades'] += (int) $emba['unidades'];
            break;
    }
}

for ($i = 0; $i < count($insumos); $i++) {
    $insumos[$i]['costo_medio'] = number_format($insumos[$i]['costo_total'] / $insumos[$i]['unidades'], 2);
}

$queryProveedores = "SELECT idindustria, nbindustria, sum(costoembarque)/sum(unidades) as costoUnitario FROM industria
			INNER JOIN encadenamiento ON industria.idindustria = encadenamiento.idvendedora
            FROM tipoalmacen INNER JOIN embarque ON tipoalmacen.idtipoalmacen = embarque.idalmacen
			WHERE idcompradora = (SELECT idindustria FROM empresa WHERE idempresa = 125)";
$proveedores = mysqli_query($conexion, $queryProveedores);

?>

<div class='big-container'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Clasificacion de nuestra competencia y proveedores</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-12 card">
                <h2>Empresa:</h2>
                <h3>ID Empresa: <?= $empresa['idempresa']; ?></h3>
                <br>
                <h3>ID Industria: <?= $empresa['idindustria']; ?></h3>
                <br>
                <h3>Industria: <?= $empresa['nbindustria']; ?></h3>
                <br>
                <h3>Mercado: <?= $empresa['mercado']; ?></h3>
            </div>
            <div class="col-lg-6 col-sm-12 card">
                <h2>Mis embarques</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Empresa</th>
                            <th scope="col">Embarque</th>
                            <th scope="col">Almacen</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = 1;
                        foreach ($embarque as $emb) {
                            echo ' <tr>
                                    <th scope="row">' . $item . '</th>
                                    <td>' . $emb['idempresa'] . '</td>
                                    <td>' . $emb['idembarque'] . '</td>
                                    <td>' . $emb['idalmacen'] . '</td>
                                    <td>' . $emb['unidades'] . '</td>
                                    <td>' . money_format('%n', $emb['costoembarque']) . '</td>
                                    </tr>
                                    </tbody>';
                            $item++;
                        }
                        ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 card" align="center">
                <form class='form' id="select_industry" method="post">
                    <p>Selecciona la industria a la cual perteneces:</p>
                    <select class="form-control" name="opciones">
                        <?php
                        echo $industrias;
                        ?>
                    </select><br><br>
                    <input type="text" hidden name="action" value="indsutry">
                    <button class='btn btn-default' type="submit" id="send">Almacen</button>
                </form><br>
            </div>
            <div class="col-lg-12 col-sm-12 card">
                <h2>Industrias</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Empresa</th>
                            <th scope="col">Industria</th>
                            <th scope="col">Mercado</th>
                        </tr>
                    </thead>
                    <tbody id="table_data">

                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12 col-sm-12 card">
                <h2>Proveedores</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Costo unitario</th>
                        </tr>
                    </thead>
                    <tbody id="table_data_prov">

                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</div>
<?php
include_once 'footer.php';
?>