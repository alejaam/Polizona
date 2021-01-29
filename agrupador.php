<?php
include_once 'header.php';

$queryTables = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'polizona_125';";
$tables = mysqli_query($conexion, $queryTables);
$tablas = array();
while ($row = mysqli_fetch_assoc($tables)) {
    array_push($tablas, $row['table_name']);
}

?>

<div class='big-container'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Superqueries</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-12 card">
                <h2>Elige una tabla</h2>
                <form>
                    <div class="form-group">
                        <select class="form-control" name="table" id="table">
                            <option value="0">Seleccione una tabla</option>
                            <?php
                            foreach ($tablas as $tabla) {
                                echo '<option value="' . $tabla . '">' . $tabla . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Campo 1</h4>
                        <select class="form-control" name="campo1" id="campo1"></select>
                    </div>
                    <div class="form-group">
                        <h4>Campo 2</h4>
                        <select class="form-control" name="campo2" id="campo2"></select>
                    </div>
                    <div class="form-group">
                        <button id="superqueries" type="button" class="btn btn-success form-control" disabled>Generar queries</button>
                    </div>
                    <div class="form-group">
                        <button id="consultar" type="button" class="btn btn-success form-control" disabled>Consultar</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-sm-12 card">
                <textarea class="form-control" name="query1" id="query1" cols="15" rows="7" readonly="true">
                </textarea>
                <br>
                <textarea class="form-control" name="query2" id="query2" cols="15" rows="7" readonly="true">
                </textarea>
            </div>
        </div>
        <div class="row" id="probabilidades" style="display: none">
            <div class="col-lg-5 col-sm-12 card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" id="col1"></th>
                            <th scope="col" i>Probabilidad</th>
                        </tr>
                    </thead>
                    <tbody id="table_proba1">

                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-sm-12 card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" id="col2"></th>
                            <th scope="col" id="col3"></th>
                            <th scope="col">Probabilidad</th>
                        </tr>
                    </thead>
                    <tbody id="table_proba2">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>