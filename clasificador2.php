<?php
include_once 'header.php';

$query = "SELECT * FROM empresa ep INNER JOIN industria ind ON ep.idindustria = ind.idindustria WHERE ep.idempresa = 125";
$resultado = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($resultado);

$query = "SELECT * FROM embarque WHERE idempresa = 125";
$embarque = mysqli_query($conexion, $query);


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
                <!-- <form class='form' action="funcion.php" method="get">
                <p>Selecciona la industria a la cual perteneces:</p>
                <select class="form-control" name="opciones">
                    <option value="A"> A</option>
                    <option value="B"> B</option>
                    <option value="C"> C</option>
                    <option value="D"> D</option>
                    <option value="E"> E</option>
                    <option value="F"> F</option>
                </select><br><br>
                <button class='btn btn-default' type="submit">Almacen</button>
                </form><br>
                <button class='btn btn-default'><a href='embarque.php'>Embarque</a></button>
                <button class='btn btn-default'><a href='request.html'>Ejercicio ISAN</a></button>
                <button class='badge badge-light' onclick="toggleTheme('dark');">Light</button>
                <button class='badge badge-dark' onclick="toggleTheme('light');">Dark Mode</button> -->
                <h2>Empresa:</h2>
                ID Empresa: <?= $row['idempresa']; ?>
                <br>
                ID Industria: <?= $row['idindustria']; ?>
                <br>
                Industria: <?= $row['nbindustria']; ?>
            </div>
            <div class="col-lg-6 col-sm-12 card">
                <h2>Almacenes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Almacén</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Costo unitario</th>
                            <th scope="col">Coeficiente</th>
                            <th scope="col">C.U. de embarque</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>the Bird</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>