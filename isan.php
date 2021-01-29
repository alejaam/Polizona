<?php
include_once 'header.php';

?>

<div class='big-container'>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="row card">
                        <textarea id="code" rows="30" cols="50" class="form-control">
                                atributo.
                                isan.
                                metodo.
                                asignacion.
                                precio.
                                299500.
                                decision.
                                precio < 283241.21.
                                    asignacion.
                                    isan.
                                    precio*0.02.
                                    fin.
                                    decision.
                                    precio < 339889.39.
                                    asignacion.
                                    isan.
                                    ((precio-283241.21)*0.05)+5664.73.
                                    fin.
                                    decision.
                                    precio < 396537.79.
                                    asignacion.
                                    isan.
                                    ((precio-339889.39)*0.1)+8497.27.
                                    fin.
                                    decision.
                                    precio < 509833.95.
                                    asignacion.
                                    isan.
                                    ((precio-396537.79)*0.15)+14162.08.
                                    fin.
                                    asignacion.
                                    isan.
                                    ((precio-509833.95)*0.17)+31156.48.
                                    fin.
                                    atributo.
                                    precio.
                                    numero.
                                    299500.
                                    atributo.
                                    marca.
                                    cadena.
                                    seat.
                                    atributo.
                                    modelo.
                                    numero.
                                    2020.
                                    fin.
                            </textarea>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="row card">
                        <textarea id="salida" rows="15" cols="25" class="form-control"></textarea>
                    </div>
                    <div class="row card">
                        <div class="col-lg-12 col-sm-12" align="center">
                            <p>Resultado:</p>
                            <p id="demo"></p>
                        </div>
                        <div class="col-lg-12 col-sm-12" align="center">
                            <button class="btn btn-default mr-2" id="run">Run</button>
                            <button class="btn btn-default" id="ejecutar">Ejecutar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
</div>
<?php
include_once 'footer.php';
?>